<template >
    <div>
        <button  class="text-xs"  :class="classes">
            <slot />
        </button>
    </div>
</template>
<script>
import { ref } from 'vue';
const props = defineProps({
    title: {
        type: String,
        default: 'Card Title',
    },
    image: {
        type: String,
        default: '',
    },
    classes: {
        type: String,
        default: '',
    },
    
});
</script>
