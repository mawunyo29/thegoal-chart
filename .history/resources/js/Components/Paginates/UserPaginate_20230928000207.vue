<template>
<div >
 <ul ref="scrollBox" class="max-h-[200px] p-8 overflow-auto">
    <li v-for="(user, index) in data[0]" :key="index" ref="scrollItems">
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
 const data  =ref([]);
 let cursor = null
 const scrollBox =  ref<HTMLElement>(null);
 const scrollItems = ref(null);
 useInfiniteScroll(
    scrollBox,
  () => {
    // load more
    getPaginateUsers(cursor).then((response) => {
            data.value.push(response.data.users);
            cursor = response.data.nextCursor;
            console.log(data.value[0]);
        });
  },
  { distance: 10 }
)

onMounted(async () => {
    await getPaginateUsers(cursor).then((response) => {
            data.value.push(response.data.users);
            cursor = response.data.nextCursor;
            console.log(data.value[0]);
        });
    console.log(scrollBox.value);
    scrollBox.addEventListener('scroll', function() {
        if (scrollBox.scrollTop + scrollBox.value.clientHeight >= scrollBox.scrollHeight) {
           
            console.log('scrolling');
        }
    });
});

</script>