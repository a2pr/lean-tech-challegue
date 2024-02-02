<script setup>
defineProps({
    quotes: {
        type: Array,
    },
});

</script>

<template>
    <h1>Favorite list</h1>
    <div>
        <div v-if="quotes.length > 0">
            <ul >
                <li v-for="(value, key) in quotes" >
                    {{value.quote}}&nbsp;&nbsp;
                    <a class="btn btn-danger" :href="route('favorite.add', {id: value.id})">remove</a>
                </li>
            </ul>
        </div>
        <div v-else>
            <span> Nothing here, try to add more quotes to inspire you </span>
            <br>
            <a class="btn btn-primary" :href="route('quotes.index')"> Get quotes here</a>
        </div>
    </div>
</template>
  