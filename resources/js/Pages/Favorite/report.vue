<script setup>
defineProps({
    userView: {
        type: Array,
    },
});

</script>

<template>
    <h1>Favorite list</h1>
    <br><br>
    <div>
        <div v-for="(value, key) in userView">
            <h2> <a :href="route('login', {username: value.username})">{{value.username}}</a></h2>
            <div v-if="value.quotes.length >0">
                <ul>
                <li v-for="(value, key) in value.quotes" >
                    {{value.quote}}&nbsp;&nbsp;
                    <a class="btn btn-danger" :href="route('favorite.destroy', {id: value.id})">remove</a>
                </li>
            </ul>
            </div>
            <div v-else>
                nothing here
            </div>
        </div>
    </div>
</template>
  