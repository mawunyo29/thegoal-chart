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
    <div>{{ title }}</div>

        <slot />

   </div>

</template>