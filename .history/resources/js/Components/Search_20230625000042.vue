<template>

<div class="pr-6 ring inline-flex space-x-2 ">
    <input type="text" v-model="searchInput">
    <i class="fa fa-search ml-2"></i>
</div>
 
</template>

<script  setup>

import{ref,computed} from 'vue';

//create  a dynamic search input without knowing the data type or data structure

const searchInput = ref('');

//create a computed property to filter the data

const filteredData = computed(() => {
    return data.value.filter((item) => {
        return item.toLowerCase().includes(searchInput.value.toLowerCase());
    });
});
    
</script>