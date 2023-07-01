<script setup >
import { ref, computed } from 'vue';
import Tables from '@/Components/Tables/Tables.vue';
import TableDataSet from '@/Components/Tables/TableDataSet.vue';
import TableHead from '@/Components/Tables/TableHead.vue';
import LiList from '@/Components/ListsData/LiList.vue';
import UlList from '@/Components/ListsData/UlList.vue';

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
const data = ref(props.data);
const displayStyle = ref(props.displayStyle);
const headers = ref(props.headers);
const filteredData = computed(() => {
    return data.value.filter((item) => {
        return !rejectedKeys.value.includes(item);
    });
});

</script>
<template>
    <div>
        <template v-if="displayStyle === 'table'">
            <Tables>
                <template #tableheader>
                    <th class="px-4 py-3 text-sm font-medium text-gray-500 uppercase">
                        <TableHead v-for="(head, index) in headers">
                        {{ head }}
                    </TableHead>
                    </th>
                    
                </template>
                <template #body>
                    <tr class="border-b border-slate-100 hover:bg-gray-100 group odd:bg-slate-200" v-for="item in data" :key="item.id">
                        <TableDataSet>
                            <template v-for="(value, key) in item">
                                <td class="px-4 py-3 text-sm font-medium text-gray-500"
                                    v-if="!rejectedKeys.includes(key) && (typeof (value) !== 'object')">{{ value }}
                                </td>

                            </template>
                        </TableDataSet>
                    </tr>

                </template>
            </Tables>
        </template>
        <template v-else-if="displayStyle === 'list'">
            <UlList>
                <LiList v-for="item in data" :key="item.id" :data="item">
                    <template v-for="(value, key) in item">
                        <td class="px-4 py-3 text-sm font-medium text-gray-500"
                            v-if="!rejectedKeys.includes(key) && (typeof (value) !== 'object')">{{ value }}
                        </td>

                    </template>
                </LiList>
            </UlList>
        </template>
    </div>
</template>