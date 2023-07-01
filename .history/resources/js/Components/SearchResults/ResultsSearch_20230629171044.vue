<script setup>
import { ref, computed, watch, onMounted } from 'vue';
import Tables from '@/Components/Tables/Tables.vue';
import TableDataSet from '@/Components/Tables/TableDataSet.vue';
import TableHead from '@/Components/Tables/TableHead.vue';
import UlList from '@/Components/ListsData/UlList.vue';
import LiList from '@/Components/ListsData/LiList.vue';

this.props = defineProps({
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
    displayDataStyle: {
        type: String,
        default: 'table',
    },
    displayData: {
        type: Boolean,
        default: false,
    },

});

const displayStyle = computed(() => {
    //lowercase the displayDataStyle prop

    return props.displayDataStyle.toLowerCase();
});
</script>
<template>
    <template v-if="displayStyle == 'table'">
        hello i am a table
    </template>
    <template v-else-if="displayStyle == 'list'">
        hello i am a list
    </template>
</template>