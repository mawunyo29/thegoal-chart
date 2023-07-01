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
  
        <slot />

   </div>

</template>