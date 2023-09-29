<template>
<div ref="scrollBox" class="max-h-[200px] p-8 overflow-auto">
 <ul ref="scrollItems" class="h-full">
    <li v-for="(user, index) in data" :key="index" >
     {{ user.name }}
    </li>
   
 </ul>
{{ data.length }}
{{ cursor }}
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
//  useInfiniteScroll(
//     scrollItems,
//   () => {
//     // load more
//     getPaginateUsers(cursor.value).then((response) => {
//             data.value.push(...response.data.users);
//             cursor.value = response.data.nextCursor;
//             console.log(data.value[0]);
//         });
//   },
//   { distance:10 }
// )


let currentPage = ref(1);
let totalPages = ref(1);

const loadMore = async () => {
   
        getPaginateUsers(cursor.value).then((response) => {
            let datas = users.value.users.data;
            console.log(users.value);
            if (response.data.success) {
                data.value.push(...datas);
                cursor.value = users.value.users.next_cursor;
                currentPage.value++;
                totalPages.value = response.data.count ; // Mettez à jour le nombre total de pages
            }
        });
    
}

// watchEffect(async() => {
//     console.log(data.value);
//     await loadMore();
// });

onMounted(async () => {
    await loadMore().then(() => {
        console.log(users.value);
    });
   
    scrollBox.value.addEventListener('scroll', async function() {
        
        if (scrollBox.value.scrollTop + scrollBox.value.clientHeight >= scrollBox.value.scrollHeight) {
            if(cursor.value ){
                console.log('scrolling');
                await loadMore();
            }
          
        }
    });
});

</script>