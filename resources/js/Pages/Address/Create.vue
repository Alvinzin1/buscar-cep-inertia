<script setup>
import { Head, useForm } from '@inertiajs/vue3'
import TextInput from '../../Components/TextInput.vue';
import Card from '../../Components/Card.vue';

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
    <Head title="Endereço"></Head>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <Card>
                    <div class="card-body">
                        <form @submit.prevent="searchForm.post('/search', {
                            onSuccess: () => {
                                addressForm.cep = $page.props.response.cepData.cep;
                                addressForm.ddd = $page.props.response.cepData.ddd;
                                addressForm.logradouro = $page.props.response.cepData.logradouro;
                                addressForm.bairro = $page.props.response.cepData.bairro;
                                addressForm.localidade = $page.props.response.cepData.localidade;
                                addressForm.uf = $page.props.response.cepData.uf;
                            },
                        })">
                            <TextInput :error="searchForm.errors.cepApi" type="text" label="CEP" placeholder="Apenas números..." field="cepApi" v-model="searchForm.cepApi" :required="true" :maxlength="8" :minlength="8"></TextInput>
                            <button type="submit" class="btn btn-secondary btn-sm mt-2" :disabled="searchForm.processing">Pesquisar</button>
                        </form>
                    </div>
                </Card>
            </div>
            <div class="col-md-7">
                <Card v-if="addressForm.cep">
                    <div class="card-body">
                        <form class="row g-3" @submit.prevent="addressForm.post('/save', { 
                            preserveState: true 
                        })">
                            <div class="col-md-5">
                                <TextInput :error="addressForm.errors.ddd" type="text" label="DDD" field="ddd" v-model="addressForm.ddd" :required="true" :maxlength="2" :minlength="2"></TextInput>
                            </div>
                            <div class="col-md-7">
                                <TextInput :error="addressForm.errors.cep" type="text" label="CEP" field="cep" v-model="addressForm.cep" :required="true" :maxlength="8" :minlength="8"></TextInput>
                            </div>
                            <div class="col-md-7">
                                <TextInput :error="addressForm.errors.logradouro" type="text" label="Logradouro" field="logradouro" v-model="addressForm.logradouro" :required="true" :maxlength="50"></TextInput>
                            </div>
                            <div class="col-md-5">
                                <TextInput :error="addressForm.errors.numero" type="text" label="Numero"  field="numero" v-model="addressForm.numero" :required="true" :maxlength="8"></TextInput>
                            </div>
                            <div class="col-md-4">
                                <TextInput :error="addressForm.errors.bairro" type="text" label="Bairro"  field="bairro" v-model="addressForm.bairro" :required="true" :maxlength="50"></TextInput>
                            </div>
                            <div class="col-md-4">
                                <TextInput :error="addressForm.errors.localidade" type="text" label="Localidade" field="localidade" v-model="addressForm.localidade" :required="true" :maxlength="50"></TextInput>
                            </div>
                            <div class="col-md-4">
                                <TextInput :error="addressForm.errors.uf" type="text" label="UF" field="uf" v-model="addressForm.uf" :required="true" :maxlength="2"></TextInput>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-secondary" :disabled="addressForm.processing">Salvar</button>
                            </div>
                        </form>
                    </div>
                </Card>
            </div>
        </div>
    </div>
</template>
