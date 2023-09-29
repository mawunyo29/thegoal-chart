<template>
<div ref="scrollBox" class="max-h-[20%]">
 <ul>
    <li v-for="(user, index) in data" :key="index" ref="scrollItems">
     {{ user.name }}
    </li>
   
 </ul>
</div>
</template>
<script setup>
import { computed, onMounted, onUnmounted, watch, ref } from 'vue';
import useUserServices from "@/Services/UserServices";
import { useInfiniteScroll } from '@vueuse/core';

const { users, getPaginateUsers } = useUserServices();
 const data  =ref(users.value);
 let cursor = null
 const scrollBox = ref(null);
 const scrollItems = ref(null);
    const isScrolling = ref(false);

onMounted(() => {
    console.log(scrollBox.value);
    scrollBox.value.addEventListener('scroll', function() {
        if (scrollBox.value.scrollTop + scrollBox.value.clientHeight >= scrollBox.value.scrollHeight) {
            isScrolling.value = true;
            console.log('scrolling');
        }
    });
});

</script>