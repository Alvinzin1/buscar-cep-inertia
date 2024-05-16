<script setup>
import { ref, watch } from 'vue';
import { useForm } from '@inertiajs/vue3';
import TextInput from '../../Components/TextInput.vue';
import Card from '../../Components/Card.vue';

const props = defineProps({ 
    errors: Object,
    cepData: Object
});

const searchForm = useForm({
    cepApi: null
});

const addressForm = useForm({
    numero: 0,
    ddd: null,
    cep: null,
    logradouro: null,
    bairro: null,
    localidade: null,
    uf: null
});
</script>

<template>
    <div class="container">
       <div class="py-5">
            <Card>
                <div class="card-body">
                    <form @submit.prevent="searchForm.post('/search' , {
                        onSuccess: () => {
                            addressForm.cep = cepData.cep;
                            addressForm.ddd = cepData.ddd;
                            addressForm.logradouro = cepData.logradouro;
                            addressForm.bairro = cepData.bairro;
                            addressForm.localidade = cepData.localidade;
                            addressForm.uf = cepData.uf;
                        },
                        onError: () => {
                            errorsReturn = errors;
                        }
                    })">
                        <TextInput :error="searchForm.errors.cepApi" type="text" label="CEP" placeholder="9999999" field="cepApi" v-model="searchForm.cepApi" :required="true"></TextInput>
                        <button type="submit" class="btn btn-secondary btn-sm mt-2" :disabled="searchForm.processing">Pesquisar</button>
                    </form>
                </div>
            </Card> 
       </div>
       <div class="py-5">
            <div v-if="cepData" class="card shadow-lg rounded w-100 mx-auto my-5 p-3 bg-light">
                <div class="card-body" @submit.prevent="addressForm.post('/save')">
                    <form class="row g-3">
                        <div class="col-md-5">
                            <TextInput :error="errorsReturn.ddd" type="text" label="DDD" field="ddd" v-model="addressForm.ddd" :required="true"></TextInput>
                        </div>
                        <div class="col-md-7">
                            <TextInput :error="errorsReturn.cep" type="text" label="CEP" field="cep" v-model="addressForm.cep" :required="true"></TextInput>
                        </div>
                        <div class="col-md-7">
                            <TextInput :error="errorsReturn.logradouro" type="text" label="Logradouro" field="logradouro" v-model="addressForm.logradouro" :required="true"></TextInput>
                        </div>
                        <div class="col-md-5">
                            <TextInput :error="errorsReturn.numero" type="text" label="Numero"  field="numero" v-model="addressForm.numero" :required="true"></TextInput>
                        </div>
                        <div class="col-md-4">
                            <TextInput :error="errorsReturn.bairro" type="text" label="Bairro"  field="bairro" v-model="addressForm.bairro" :required="true"></TextInput>
                        </div>
                        <div class="col-md-4">
                            <TextInput :error="errorsReturn.localidade" type="text" label="Localidade" field="localidade" v-model="addressForm.localidade" :required="true"></TextInput>
                        </div>
                        <div class="col-md-4">
                            <TextInput :error="errorsReturn.uf" type="text" label="UF" field="uf" v-model="addressForm.uf" :required="true"></TextInput>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-secondary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
       </div>
    </div>
</template>
