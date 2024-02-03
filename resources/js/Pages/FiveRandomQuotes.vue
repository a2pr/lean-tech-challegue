<script setup>
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
defineProps({
    quotes: {
        type: Array,
    },
});

</script>

<template>
    <DefaultLayout>
    <div>
        <ul>
            <li v-for="(value, key) in quotes" >
                {{value.quote}} <cite v-if="value.cached">"cached"</cite><cite v-else>"New"</cite> 
            </li>
        </ul>
      <img :src="imageLink" alt="">
      <div class="row">
        <div class="col-6">
            <a class="btn btn-primary" :href="route('quotes.new')"> Five more random quotes </a>
        </div>
      </div>  
      
    </div>
</DefaultLayout>
</template>
  