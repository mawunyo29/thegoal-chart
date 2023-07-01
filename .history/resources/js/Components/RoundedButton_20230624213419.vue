<template >
    
        <button  class="text-xs w-8 h-8"  :class="{classes}">
            <slot />
        </button>
   
</template>

<script setup>
import { ref, computed} from 'vue';
    const props =
     defineProps({
        btnClasses: {
            type: String,
            default: ' flex justify-center items-center rounded-full  hover:bg-gray-300',
        },
        
    });

    const classes = computed(() => {
        return [
            props.btnClasses,
        ];
    });
</script>
