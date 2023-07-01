<template>
    <div class=" sm:mx-8">
        <div class="ring inline-flex  rounded-md justify-end ">
            <div class="">
                <input type="text" class="appearance-none px-4 w-10 focus:w-40 transform ease-in-out duration-500 border-0 h-8" v-model="searchInput"
                    placeholder="search" role="search">
            </div>

            <div class="flex justify-center w-full items-center bg-slate-300 px-2">
                <i class="fa fa-search "></i>
            </div>
        </div>
    </div>
</template>

<script  setup>

import { ref, computed, watch ,onMounted } from 'vue';
import useUserServices from '@/services/userServices.js';

const { getTableData } = useUserServices();
const props = defineProps({
    data: {
        type: Array,
        required: false,
        default: () => [],
    },
    DataTable: {
        type: Object,
        required: false,
        default: () => {},
    },
    
});

//get the database table data

const data = ref(props.data);

//watch the data prop for changes

watch(
    () => props.data,
    (value) => {
        data.value = value;
    }
);

//create  a dynamic search input without knowing the data type or data structure

const searchInput = ref('');

//create a computed property to filter the data

const filteredData = computed(() => {
    return data.value.filter((item) => {
        return item.toLowerCase().includes(searchInput.value.toLowerCase());
    });
});

</script>