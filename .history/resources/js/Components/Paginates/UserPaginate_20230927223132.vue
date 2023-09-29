<template>
<div ref="scrollBox">

</div>
</template>
<script setup>
import { computed, onMounted, onUnmounted, watch, ref } from 'vue';
import useUserServices from "@/Services/UserServices";
import { useInfiniteScroll ,UseInfiniteScrollOptions } from '@vueuse/core';

const { users, getPaginateUsers } = useUserServices();
 const data  =ref(users.value);
 let cursor = null
 const scrollBox = ref(null);
const { isScrolling } = useInfiniteScroll({
    target: window,
    throttle: 0,
    debounce: 0,
    condition: () => {
        return !isScrolling.value;
    },
    onEnter: () => {
        getPaginateUsers(cursor);
    },
},{distance: 10});

</script>