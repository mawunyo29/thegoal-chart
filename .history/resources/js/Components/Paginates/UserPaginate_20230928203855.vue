<template>
<div ref="scrollBox" class="max-h-[200px] p-8 overflow-auto">
 <ul ref="scrollItems" class="h-full">
    <li v-for="(user, index) in data" :key="index" >
     {{ user.name }}
    </li>
   
 </ul>
</div>
</template>
<script setup>
import { computed, onMounted, onUnmounted, watch, ref, watchEffect} from 'vue';
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
  { distance:10 }
)

watch(cursor, (value ,oldValue) => {
    console.log(value);
    cursor.value = value;
});


const loadMore = async () => {
    getPaginateUsers(cursor.value).then((response) => {
        let datas = response.data.users;

        if( response.data.nextCursor != null) {
            data.value.push(data);
            cursor.value = response.data.nextCursor;
        }
            console.log(response.data);
        });
}
watchEffect(async() => {
    console.log(data.value);
    await loadMore();
});

onMounted(async () => {
    
    console.log(scrollBox.value);
    scrollBox.value.addEventListener('scroll', async function() {
        
        if (scrollBox.value.scrollTop + scrollBox.value.clientHeight >= scrollBox.value.scrollHeight) {
            if(cursor.value != null){
                console.log('scrolling');
                await loadMore();
            }
          
        }
    });
});

</script>