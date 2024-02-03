<script setup>
import { ref } from 'vue';


</script>
<template>
<ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" :href="route('today.index')">Today Quotes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" :href="route('favorite.index')">Favorites quotes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" :href="route('quotes.index')">Five Random Quotes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" :href="route('quotes.secure')">Secure Quotes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" :href="route('favorite.report')">Report Quotes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" :href="route('dashboard')">Dashboard</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" :href="route('login')">Login</a>
  </li>
</ul>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">  
                    <main>
                        <slot />
                    </main>
                </div>
            </div>
        </div>
    </div>
</template>