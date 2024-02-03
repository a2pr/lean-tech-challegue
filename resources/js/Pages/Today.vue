<script setup>
import DefaultLayout from '@/Layouts/DefaultLayout.vue';
defineProps({
    quoteDto: {
        type: Object,
    },
    imageLink: {
        type: String,
    },
    cached:{
        type: Boolean
    },
    isNew: {
        type: Boolean
    },
    authenticatedUser: {
        type: Boolean
    },
});

</script>

<template>
    <DefaultLayout>
    <div>
      <h3>{{ quoteDto.quote }} <cite v-if="cached">"cached"</cite><cite v-else>"New"</cite> </h3>
      <img :src="imageLink" alt="">
      <div class="row">
        <div class="col-6" v-if="isNew == false">
            <a class="btn btn-primary" :href="route('today.new')"> Quote of the day</a>
        </div>
        <div v-if="authenticatedUser" class="col-6">
            <a class="btn btn-primary" :href="route('favorite.add', {id: quoteDto.id})"> Add to favorite list</a>
        </div>
      </div>  
      
    </div>
    </DefaultLayout>
</template>
  