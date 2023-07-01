<template>
    <div class="ring inline-flex  rounded-md  ">
        <div class="grid grid-cols-2">
            <input type="text" class="appearance-none px-4 w-10 focus:w-40  border-0" v-model="searchInput"
                placeholder="search" role="search" >
        </div>

        <div class="flex justify-center w-full items-center bg-slate-300 px-2">
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