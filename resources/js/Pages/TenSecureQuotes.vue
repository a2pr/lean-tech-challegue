<script setup>
defineProps({
    quotes: {
        type: Array,
    },
});

</script>

<template>
    <div>
        <ul>
            <li v-for="(value, key) in quotes" >
                {{value.quote}} <cite v-if="value.cached">"cached"</cite><cite v-else>"New"</cite> 
            </li>
        </ul>
      <img :src="imageLink" alt="">
      <div class="row">
        <div class="col-6">
            <a class="btn btn-primary" :href="route('quotes.secure_add')"> Ten more random quotes </a>
        </div>
      </div>  
      
    </div>
</template>
  