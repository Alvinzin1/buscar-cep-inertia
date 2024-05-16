<script setup>
import Card from '../Components/Card.vue';

const props = defineProps({ 
    adresses: Object
});
</script>

<template>
    <div class="container pt-5">
        <Card>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-uppercase">
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
                            <tr v-for="(address, index) in adresses" class="text-nowrap">
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
        </Card>
    </div>
</template>
