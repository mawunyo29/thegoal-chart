<script setup>
import { computed, onMounted, onUnmounted, watch } from 'vue';
</script>
<template>
    <div class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50" scroll-region>
        <div class="absolute inset-0 bg-gray-500 opacity-75" />
    </div>
    <div class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto">
        <slot />
    </div>

</template>