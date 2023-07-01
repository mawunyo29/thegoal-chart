<script setup >
import { ref, computed, watch, onMounted } from 'vue';

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


</script>
<template>
    <div>
        hello
    </div>
   
</template>