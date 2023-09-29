<template>
<div ref="scrollBox" class="max-h-[20%]">
 <u>
    <li v-for="(user, index) in data" :key="index">
     {{ user.name }}
    </li>
    <li v-if="isScrolling.value">Loading...</li>
 </u>
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
    onEnter: async() => {
       await getPaginateUsers(cursor).then((response) => {
            data.value = [...data.value, ...response.data.data];
            cursor = response.nextCursor;
        });
    },
},{distance: 10});

</script>