<template>
  <div class="pagination w-full gap-2 ">
    <div class=" flex flex-row justify-between gap-3">
      <p>from {{links.from}}</p>
      <p class="">to {{links.to}} of {{links.total}}</p>
    </div>
    <ul class=" flex-grow ">
      <li v-for="link in links.links" :key="link.label" >
        <a :href="link.url" :class="{ active: link.active }" @click="(event)=>mouvePage(event, link.label)" v-html="link.label" />
      </li>
    </ul>
  </div>
</template>
  
<script setup>

//app.config.compilerOptions.isCustomElement = tag => tag.startsWith('x-')
//app.config.compilerOptions.isCustomElement = tag => tag.startsWith('x-')

import { onMounted, nextTick, ref, computed ,watchEffect } from 'vue';

const emit = defineEmits(['update:pages']);
const props = defineProps(['links'])
const current_page = ref(1);
//eviter le rechargement de la page
const mouvePage = (e, label) => {
  e.preventDefault();
  
 nextTick(() => {
    if (label === '&laquo; Previous') {
      previrous();
    } else if (label === 'Next &raquo;') {
      next();
    } else {
      current_page.value = label;
      emit('update:pages', current_page.value);
    }
  });
 //update the url
  history.pushState(null, null, e.target.href);
 
};

const previrous = () => {
 
  if (current_page.value > 1) {
    current_page.value--;
    emit('update:pages', current_page.value);
  }
};

const next = () => {
  if (current_page.value < props.links.last_page) {
    current_page.value++;
    emit('update:pages', current_page.value);
  }
};


</script>
  
<style>
.pagination {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 1rem;
}
.pagination ul {
  display: flex;
  list-style: none;
  padding: 0;
}

.pagination li {
  margin: 0 5px;
}

.pagination a {
  color: #333;
  text-decoration: none;
  padding: 5px 10px;
  border-radius: 3px;
  border: 1px solid #ccc;
}

.pagination a.active {
  background-color: #333;
  color: #fff;
  border-color: #333;
}
</style>
  