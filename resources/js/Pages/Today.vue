<script setup>
defineProps({
    quote: {
        type: String,
    },
    imageLink: {
        type: String,
    },
    cached:{
        type: Boolean
    }
});

</script>

<template>
    <div>
      <h3>{{ quote }} <cite v-if="cached">"cached"</cite></h3>
      <img :src="imageLink" alt="">
    </div>
</template>
  