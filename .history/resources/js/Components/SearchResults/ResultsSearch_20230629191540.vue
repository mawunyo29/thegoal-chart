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
                    <TableHead v-for="(head, index) in headers">
                        {{ head }}
                    </TableHead>
                </template>
                <template #body>

                    <TableDataSet v-for="item in data" :key="item.id">
                        {{ item }}
                    </TableDataSet>
                </template>
            </Tables>
        </template>
        <template v-else-if="displayStyle === 'list'">
            <UlList>
                <LiList v-for="item in data" :key="item.id" :data="item" />
            </UlList>
        </template>
    </div>
</template>