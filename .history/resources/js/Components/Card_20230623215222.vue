<script setup>
import { computed, onMounted, onUnmounted, watch } from 'vue';
const props = defineProps({
   title: {
      type: String,
      default: 'Card Title',
   },
});
</script>
<template>
   <div class="card">

   </div>

</template>