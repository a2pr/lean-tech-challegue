<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <ul>
                            <li><a :href="route('today.index')">Today Quotes</a></li>
                            <li><a :href="route('favorite.index')">Favorites quotes</a></li>
                            <li><a :href="route('quotes.index')">Five Random Quotes</a></li>
                            <li><a :href="route('quotes.secure')">Secure Quotes</a></li>
                            <li><a :href="route('favorite.report')">Report Quotes</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
