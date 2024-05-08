<script setup>
import { useForm } from '@inertiajs/vue3'

defineProps({ 
    errors: Object,
    cepData: Object,
    adresses: Object
});

const searchForm = useForm({
  cep: null
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
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-lg bg-body-tertiary rounded w-100 my-5">
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
                                <input type="text" class="form-control" id="cep" placeholder="99999-99" maxlength="8" v-model="searchForm.cep" required>
                                <label for="cep">CEP</label>
                            </div>
                            <button type="submit" class="btn btn-success btn-sm" :disabled="searchForm.processing">Pesquisar</button>
                        </form>
                    </div>
                </div>
                <div v-if="cepData" class="card shadow-lg bg-body-tertiary rounded w-100">
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
                                <input type="number" class="form-control" id="numero" v-model="addressForm.numero">
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
                <div v-if="Object.keys(errors).length > 0" class="alert alert-danger" role="alert">
                    <ul>
                        <li v-for="error in errors">{{ error }}</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow-lg bg-body-tertiary rounded w-100 mx-auto my-5 p-3">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">cep</th>
                                <th scope="col">logradouro</th>
                                <th scope="col">numero</th>
                                <th scope="col">bairro</th>
                                <th scope="col">localidade</th>
                                <th scope="col">uf</th>
                                <th scope="col">ddd</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(address, index) in adresses">
                                <th scope="row">{{ index + 1 }}</th>
                                <th scope="row">{{ address.cep }}</th>
                                <th scope="row">{{ address.logradouro }}</th>
                                <th scope="row">{{ address.numero }}</th>
                                <th scope="row">{{ address.bairro }}</th>
                                <th scope="row">{{ address.localidade }}</th>
                                <th scope="row">{{ address.uf }}</th>
                                <th scope="row">{{ address.ddd }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
