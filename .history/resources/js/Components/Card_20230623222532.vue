<script setup>
import { computed, onMounted, onUnmounted, watch } from 'vue';
const props = defineProps({
   title: {
      type: String,
      default: 'Card Title',
   },
   image: {
      type: String,
      default: '',
   },
});
</script>
<template>
   <div class="card"  :title="title" :image="image">
    <!---the card header--->
    <div class="card-header">
        {{ title }}
        <hr class=" border-b border-b-slate-400">
    </div>
    <!---the card image image from unsplash --->
    <div class="card-image">
        <img src="https://www.istockphoto.com/fr/collaboration/boards/I6LYCKOFSEC7N4z_-UU7tw" alt="unsplash image" />
    </div>
    <!---the card body--->
    <div class="card-body">
        <slot />
    </div>
 
      

   </div>

</template>