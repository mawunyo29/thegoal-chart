<template>
    <div class=" sm:mx-8 ">
        <div class="ring inline-flex  rounded-md justify-end w-full">
            <div class="w-full">
                <input type="text"
                    class="appearance-none px-2 w-20  focus:w-full transform ease-in-out duration-500 border-0 h-8"
                    v-model="searchInput" placeholder="search" role="search">
            </div>

            <div class="flex justify-center w-full items-center bg-slate-300 px-2">
                <i class="fa fa-search "></i>
            </div>    
        </div>
           <!--Result-->
           <div class="relative w-full">
               <div class="absolute z-50 bg-white w-full rounded-t-none shadow-lg mt-1" v-if="searchInput.length > 0">
                <div class="flex flex-col w-full bg-white rounded-md shadow-lg max-h-60 ">
                    <div class="flex flex-col w-full overflow-hidden"></div>
                    <div class="overflow-y-auto h-60">
                        <table class="w-full">
                            <thead>
                                <tr class="text-left border-b-2 border-gray-300">
                                    <th class="px-4 py-3 text-sm font-medium text-gray-500">Name</th>
                                    <th class="px-4 py-3 text-sm font-medium text-gray-500">Email</th>
                                    <th class="px-4 py-3 text-sm font-medium text-gray-500">Role</th>
                                    <th class="px-4 py-3 text-sm font-medium text-gray-500">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-gray-200 hover:bg-gray-100" v-for="user in filteredData"
                                    :key="user.id">
                                    <td class="px-4 py-3 text-sm font-medium text-gray-500">{{ user.name }}</td>
                                    <td class="px-4 py-3 text-sm font-medium text-gray-500">{{ user.email }}</td>
                                    <td class="px-4 py-3 text-sm font-medium text-gray-500">{{ user.role }}</td>
                                    <td class="px-4 py-3 text-sm font-medium text-gray-500">{{ user.status }}</td>
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
    if (searchInput.value.length > 0) {
        return users.value.data.filter((item) => {
            return Object.values(item)
                .join('')
                .toLowerCase()
                .includes(searchInput.value.toLowerCase());
        });
    }
    return [];
});

//create a computed property to return the keys of the first object in the data array

const headings = computed(() => {
    if (data.value.length > 0) {
        return Object.keys(data.value[0]);
    }
    return [];
});

//create a computed property to return the keys of the first object in the data array

const tableData = computed(() => {
    if (data.value.length > 0) {
        return Object.values(data.value[0]);
    }
    return [];
});

onMounted(async () => {
    await getUsers()
    console.log(users.value)
})
</script>