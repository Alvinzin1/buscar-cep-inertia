<script setup>
import { useForm } from '@inertiajs/vue3'

defineProps({ 
    errors: Object,
    cepData: Object
});

const form = useForm({
  cep: null
});
</script>

<template>
    <div class="container">
        <div class="card shadow-lg bg-body-tertiary rounded w-100 mx-auto my-5">
            <div class="card-body">
                <form @submit.prevent="form.post('/search')">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="cep" placeholder="99999-99" maxlength="8" size="8" v-model="form.cep" required>
                        <label for="cep">CEP</label>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm" :disabled="form.processing">Pesquisar</button>
                </form>
            </div>
        </div>
        <div v-if="errors.cep" class="alert alert-danger" role="alert">{{ errors.cep }}</div>
        <div v-if="cepData" class="card shadow-lg bg-body-tertiary rounded w-100 mx-auto">
            <div class="card-body">
                <ul class="list-group list-group-flush rounded">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        CEP:
                        <span>{{ cepData.cep }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Logradouro:
                        <span>{{ cepData.logradouro }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Bairro:
                        <span>{{ cepData.bairro }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Localidade:
                        <span>{{ cepData.localidade }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        UF:
                        <span>{{ cepData.uf }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        DDD:
                        <span>{{ cepData.ddd }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
