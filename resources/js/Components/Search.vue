<template>
    <div class=" sm:mx-8 rounded-sm">
        <div class="ring inline-flex  rounded-md justify-end ">
            <div class="w-full">
                <input type="text"
                    class="appearance-none px-4 w-20 md:focus:w-64 focus:w-40 transform ease-in-out duration-500 border-0 h-8"
                    v-model="searchInput" placeholder="search" role="search">
            </div>
            <div class="flex justify-center w-full items-center bg-slate-300 px-2">
                <i class="fa fa-search "></i>
            </div>
        </div>
        <!--Result-->
        <div>
            <div class="absolute z-50 bg-white w-full rounded-t-none shadow-lg mt-1 left-0 right-0 px-2"
                v-if="searchInput.length > 0">
                <div class="flex flex-col w-full bg-white rounded-md shadow-lg max-h-60 ">
                    <div class="flex flex-col w-full overflow-hidden"></div>
                    <div class="overflow-y-auto  mt-5">
                        <ResultsSearch :data="filteredData" :headers="headings" :rejectedKeys="rejectedKeys"
                            :displayStyle="displayStyle" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script  setup>

import { ref, computed, watch, onMounted } from 'vue';
import useUserServices from '@/Services/UserServices';
import ResultsSearch from './SearchResults/ResultsSearch.vue';

const { getDataTable, dataTable, complexDataTable, getComplexDataTable } = useUserServices()
const props = defineProps({
    data: {
        type: Array,
        required: false,
        default: () => [],
    },
    DataTable: {
        type: Object,
        required: false,
        default: () => { },
    },
    simpleSearch: {
        type: Boolean,
        default: false,
    },
    rejectedKeys: {
        type: Array,
        default: () => [],
    },
    complexSearch: {
        type: Boolean,
        default: false,
    },
    displayStyle: {
        type: String,
        default: 'table',
    },

});

//get the database table data
const displayStyle = computed(() => {
    return props.displayStyle;
});

const data = ref(dataTable.value.data);

//watch the data prop for changes

watch(
    () => dataTable.value.data,
    (value) => {
        data.value = value;
    }
);

//create  a dynamic search input without knowing the data type or data structure

const searchInput = ref('');

// you can reject any key you don't want to show in the table

const rejectedKeys = ['email_verified_at'];


//create a computed property to return the keys of the first object in the data array

const headings = computed(() => {
    const { data } = dataTable.value;
    
    if (data.length > 0) {
        return Object.keys(data[0]).filter(
            (key) => !rejectedKeys.includes(key) && typeof (data[0]?.[key]) !== 'object'
        );
    }
    return [];
});
//create a computed property to filter the data

const filteredData = computed(() => {
    //if the search input is empty return empty data array nothing to filter but if not empty filter the data array values and return the result
    if (searchInput.value.length > 0) {
        return data.value.filter((item) => {
            //loop through the object keys and check if the key value includes the search input
            return Object.keys(item).some((key) => {
                if (!rejectedKeys.includes(key)) {
                    return String(item[key])
                        .toLowerCase()
                        .includes(searchInput.value.toLowerCase());
                }
            });
        });
    } else {
        return [];
    }

});

//recuperer la structure la base de donnee
onMounted(async () => {

    await getDataTable('User')
    await getComplexDataTable('User', { search: 'maw', sort: 'name', relation: 'roles', relationsearch: 'Production' })
   

})
</script>