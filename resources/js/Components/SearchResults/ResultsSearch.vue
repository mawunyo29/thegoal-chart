<script setup >
import { ref, computed , watch} from 'vue';
import Tables from '@/Components/Tables/Tables.vue';
import TableDataSet from '@/Components/Tables/TableDataSet.vue';
import TableHead from '@/Components/Tables/TableHead.vue';
import LiList from '@/Components/ListsData/LiList.vue';
import UlList from '@/Components/ListsData/UlList.vue';
import Dropdown from '@/Components/Dropdown.vue';

//avriable
const isOpen = ref(false);
const isListOpen = ref(false);
const emit = defineEmits(['update:rejectedKeys']);
//props
const props = defineProps({
    data: {
        type: Array,
        required: true,
    },
    displayStyle: {
        type: String,
        default: 'table',
    },
    headers: {
        type: Array,
        required: false,
        default: () => [],
    },
    rejectedKeys: {
        type: Array,
        required: false,
        default: () => [],
    },
});
const rejectedKeys = ref(props.rejectedKeys);

const data = computed(() => {
    return props.data;
});
const displayStyle = computed(() => {
    return props.displayStyle;
})
const headers = computed(() => {
    return props.headers;
})
const proxyRejectedKeys = computed({
    get() {
        return rejectedKeys.value;
    },
    set(val) {
        emit('update:rejectedKeys', val);
    },
});

const sort = (key) => {
    if (rejectedKeys.value.includes(key)) {
        rejectedKeys.value = rejectedKeys.value.filter((item) => {
            return item !== key;
        });
    } else {
        rejectedKeys.value.push(key);
    }
    console.log(proxyRejectedKeys.value , 'updated');
};

const reset = () => {
     rejectedKeys.value = [];
     rejectedKeys.value = props.rejectedKeys;
     console.log(proxyRejectedKeys.value , 'updated2');
};


</script>
<template>
    <div>
        <template v-if="displayStyle === 'table'">
            <div class=" flex justify-end p-2">
                <!--setting icon-->
                
                <!--dropdown-->
                <Dropdown >
                    <template #trigger>
                        <div class="text-xl top-0 sticky cursor-pointer"  >
                            <i class="fa-solid fa-gear text-red-600 "></i>
                        </div>
                    </template>
                    <template #content>
                        <div class="w-64">
                            <div class="flex flex-col p-2">
                                <div class="flex flex-col columns-3">
                                    <div class="text-sm font-medium text-gray-500 uppercase">Select Columns</div>
                                    <div class="text-sm font-medium text-gray-500 uppercase cursor-pointer" @click="reset()">Reset</div>
                                </div>
                                <div class="flex flex-col">
                                    <template v-for="(head, index) in headers">
                                        <div class="flex justify-between">
                                            <div class="text-sm font-medium text-gray-500 uppercase">
                                                <input type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" @click="sort(head)" :checked="!rejectedKeys.includes(head)"/>
                                                {{ head }}
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </template>

                </Dropdown>
               
            </div>
            <Tables>
                <template #tableheader>
                    <template v-for="(head, index) in headers">
                        <TableHead class="px-4 py-3 text-sm font-medium text-gray-500 uppercase"  v-if="!rejectedKeys.includes(head) "> 
                            {{ head }}
                        </TableHead>
                    </template>
                </template>
                <template #body>
                    <TableDataSet  v-for="item in data" :key="item.id">
                            <template v-for="(value, key) in item">
                                <td class="px-4 py-1 text-sm font-medium text-gray-500"
                                    v-if="!rejectedKeys.includes(key) && (typeof (value) !== 'object')">{{ value }}
                                </td>
                            </template>      
                    </TableDataSet>
                </template>
            </Tables>
        </template>
        <template v-else-if="displayStyle === 'list'">
            <UlList>
                <LiList v-for="item in data" :key="item.id" :data="item">
                    <template v-for="(value, key) in item">
                        <div class="px-2 py-3 text-xs font-medium text-gray-500 grid grid-cols-3 gap-4 break-words "
                            v-if="!rejectedKeys.includes(key) && (typeof (value) !== 'object')">
                            <div class="">
                                {{ key }}:
                            </div> 
                            <div class="col-span-2 tracking-wide ">
                                <div class="px-2 text-start">{{ value }}</div>    
                            </div>
                             
                        </div>

                    </template>
                </LiList>
            </UlList>
        </template>
    </div>
</template>