<script setup>
import { useForm } from '@inertiajs/vue3'

defineProps({ 
    errors: Object,
    cepData: Object
});

const searchForm = useForm({
  cep: null
});

const addressForm = useForm({
    number: 0,
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
        <div class="card shadow-lg bg-body-tertiary rounded w-100 mx-auto my-5">
            <div class="card-body">
                <form @submit.prevent="searchForm.post('/search' , {
                    onSuccess: () => {
                        addressForm.cep = cepData.cep;
                        addressForm.ddd = cepData.ddd;
                        addressForm.logradouro = cepData.logradouro;
                        addressForm.bairro = cepData.bairro;
                        addressForm.localidade = cepData.localidade;
                        addressForm.uf = cepData.uf;
                    }
                })">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="cep" placeholder="99999-99" maxlength="8" size="8" v-model="searchForm.cep" required>
                        <label for="cep">CEP</label>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm" :disabled="searchForm.processing">Pesquisar</button>
                </form>
            </div>
        </div>
        <div v-if="errors.cep" class="alert alert-danger" role="alert">{{ errors.cep }}</div>
        <div v-if="cepData" class="card shadow-lg bg-body-tertiary rounded w-100 mx-auto">
            <div class="card-body" @submit.prevent="addressForm.post('/save')">
                <form class="row g-3">
                    <div class="col-md-2">
                        <label for="ddd" class="form-label">DDD</label>
                        <input type="text" class="form-control" id="ddd" v-model="addressForm.ddd">
                    </div>
                    <div class="col-md-2">
                        <label for="cep" class="form-label">Cep</label>
                        <input type="text" class="form-control" id="cep" v-model="addressForm.cep">
                    </div>
                    <div class="col-md-7">
                        <label for="logradouro" class="form-label">Logradouro</label>
                        <input type="text" class="form-control" id="logradouro" v-model="addressForm.logradouro">
                    </div>
                    <div class="col-md-1">
                        <label for="numero" class="form-label">Número</label>
                        <input type="number" class="form-control" id="numero" v-model="addressForm.number">
                    </div>
                    <div class="col-md-4">
                        <label for="bairro" class="form-label">Bairro</label>
                        <input type="text" class="form-control" id="bairro" v-model="addressForm.bairro">
                    </div>
                    <div class="col-md-4">
                        <label for="localidade" class="form-label">Localidade</label>
                        <input type="text" class="form-control" id="localidade" v-model="addressForm.localidade">
                    </div>
                    <div class="col-md-4">
                        <label for="uf" class="form-label">UF</label>
                        <input type="text" class="form-control" id="uf" v-model="addressForm.uf">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
