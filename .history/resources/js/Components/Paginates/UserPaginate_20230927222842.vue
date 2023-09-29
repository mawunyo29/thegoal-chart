<template>

</template>
<script setup>
import { computed, onMounted, onUnmounted, watch, ref } from 'vue';
import useUserServices from "@/Services/UserServices";
import { useInfiniteScroll ,UseInfiniteScrollOptions } from '@vueuse/core';

const { users, getPaginateUsers } = useUserServices();
 const data  =ref(users.value);
 
const { isScrolling } = useInfiniteScroll({
    target: window,
    throttle: 0,
    debounce: 0,
    condition: () => {
        return !isScrolling.value;
    },
    onEnter: () => {
        getPaginateUsers();
    },
});

</script>