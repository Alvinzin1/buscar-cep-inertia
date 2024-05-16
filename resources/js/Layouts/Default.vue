<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
    <main class="bg-dark bg-gradient min-vh-100">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <span class="navbar-brand">BuscaCep</span>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Navegação">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="main-navbar">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <Link href="/" class="nav-link" :class="{ 'active': $page.url === '/' }">Inicio</Link>
                            </li>
                            <li class="nav-item">
                                <Link href="/create" class="nav-link" :class="{ 'active': $page.url === '/create' }">Endereço</Link>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="pt-5">
            <slot></slot>
        </div>
    </main>
</template>