<template>
<div ref="scrollBox" class="max-h-[200px] p-8 overflow-auto">
 <ul ref="scrollItems">
    <li v-for="(user, index) in data[0]" :key="index" >
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
 let cursor = ref(null);
 const  scrollItems = ref<HTMLElement>(null);
 const scrollBox= ref(null);
 useInfiniteScroll(
    scrollItems,
  () => {
    // load more
    getPaginateUsers(cursor.value).then((response) => {
            data.value.push(response.data.users);
            cursor.value = response.data.nextCursor;
            console.log(data.value[0]);
        });
  },
  { distance: 10 }
)

onMounted(async () => {
    await getPaginateUsers(cursor.value).then((response) => {
            data.value.push(response.data.users);
            cursor = response.data.nextCursor;
            console.log(data.value[0]);
        });
    console.log(scrollBox.value);
    scrollBox.value.addEventListener('scroll', function() {
        if (scrollBox.value.scrollTop + scrollBox.value.clientHeight >= scrollBox.value.scrollHeight) {
           
            console.log('scrolling');
        }
    });
});

</script>