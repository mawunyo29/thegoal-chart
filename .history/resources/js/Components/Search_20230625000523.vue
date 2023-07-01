<template>
    <div class="pr-6 ring inline-flex space-x-2 rounded-md ">
        <input type="text" class="appearance-none px-4 py-2 border-0" v-model="searchInput">
        <div class="flex justify-center w-full items-center bg-slate-300">
            <i class="fa fa-search "></i>
        </div>
    </div>
</template>

<script  setup>

import { ref, computed } from 'vue';

//create  a dynamic search input without knowing the data type or data structure

const searchInput = ref('');

//create a computed property to filter the data

const filteredData = computed(() => {
    return data.value.filter((item) => {
        return item.toLowerCase().includes(searchInput.value.toLowerCase());
    });
});

</script>