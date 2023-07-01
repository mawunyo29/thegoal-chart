<template >
    <div>
        <button  class="text-xs"  :class="btnClasses">
            <slot />
        </button>
    </div>
</template>
<script>
import { ref } from 'vue';
     defineProps({
        btnClasses: {
            type: String,
            default: 'w-8 h-8 flex justify-center items-center rounded-full bg-green-500 text-white',
        },
        
    });
</script>
