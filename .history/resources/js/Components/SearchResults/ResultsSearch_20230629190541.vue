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
    rejectColumns: {
        type: Array,
        required: false,
        default: () => [],
    },
});
</script>
<template>
    <div>
        <template v-if="displayStyle === 'table'">
            <Tables>
                <template #tableheader>
                    <TableHead>
                        <template #head>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </template>
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