<script setup >
import {ref , computed} from 'vue';
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
});
</script>
<template>
    <div>
        hello
    </div>
   
</template>