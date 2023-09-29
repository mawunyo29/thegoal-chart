<template>

</template>
<script setup>
import { computed, onMounted, onUnmounted, watch, ref } from 'vue';
import useUserServices from "@/Services/UserServices";
import { useInfiniteScroll ,UseInfiniteScrollOptions } from '@vueuse/core';

const { users, getPaginateUsers } = useUserServices();

</script>