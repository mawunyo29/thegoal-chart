<template>
    <div class=" sm:mx-8 rounded-sm">
        <div class="ring inline-flex  rounded-md justify-end ">
            <div class="w-full">
                <input type="text"
                    class="appearance-none px-4 w-20 focus:w-64 transform ease-in-out duration-500 border-0 h-8"
                    v-model="searchInput" placeholder="search" role="search">
            </div>

            <div class="flex justify-center w-full items-center bg-slate-300 px-2">
                <i class="fa fa-search "></i>
            </div>    
        </div>
           <!--Result-->
           <div >
               <div class="absolute z-50 bg-white w-full rounded-t-none shadow-lg mt-1 left-0 right-0 px-2" v-if="searchInput.length > 0">
                <div class="flex flex-col w-full bg-white rounded-md shadow-lg max-h-60 ">
                    <div class="flex flex-col w-full overflow-hidden"></div>
                    <div class="overflow-y-auto h-60">
                        <table class="w-full">
                            <thead>
                                <tr class="text-left border-b border-gray-200">
                                    <th class="px-4 py-3 text-sm font-medium text-gray-500 uppercase" v-for="head in headings">{{ head }}</th>
                                </tr>
                                
                            </thead>
                            <tbody>
                                <tr class="border-b border-gray-200 hover:bg-gray-100" v-for="(user ,index ,value) in filteredData"
                                    :key="user.id">
                                    <td class="px-4 py-3 text-sm font-medium text-gray-500">{{ value}}</td>
                                    <td class="px-4 py-3 text-sm font-medium text-gray-500">{{ user.name }}</td>
                                    <td class="px-4 py-3 text-sm font-medium text-gray-500">{{ user.email }}</td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>  
            </div>
    </div>
</template>

<script  setup>

import { ref, computed, watch, onMounted } from 'vue';
import useUserServices from '@/Services/UserServices'

const { getUsers, users } = useUserServices()
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

});

//get the database table data

const data = ref(users.value.data);

//watch the data prop for changes

watch(
    () => users.value.data,
    (value) => {
        data.value = value;
    }
);

//create  a dynamic search input without knowing the data type or data structure

const searchInput = ref('');

// you can reject any key you don't want to show in the table

const rejectedKeys = ['created_at', 'updated_at' , 'email_verified_at'];

//create a computed property to return the keys of the first object in the data array

const headings = computed(() => {
    if (users.value.data.length > 0) {
        return Object.keys(users.value.data[0]).filter(
            (key) => !rejectedKeys.includes(key)
        );
    }
    return [];
});
//create a computed property to filter the data

const filteredData = computed(() => {
    if (searchInput.value.length > 0) {
        return data.value.filter((item, value) => {
            return IDBCursorWithValue(item).some((key) => {
                return (
                    String(item[key])
                        .toLowerCase()
                        .includes(searchInput.value.toLowerCase())
                );
            });
        });
    }
    
});




onMounted(async () => {
    await getUsers()
    console.log(users.value)
})
</script>