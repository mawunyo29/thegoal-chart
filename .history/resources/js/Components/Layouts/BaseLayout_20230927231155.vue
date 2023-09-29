<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Header from '@/Components/Header.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});


</script>
<template>
    <Head title="Welcome" />
   
    <div>
        <main class="flex flex-col space-y-8 ">
           <slot></slot>
        </main>
    </div>
</template>