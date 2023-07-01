<template >
    
        <button  class="text-xs"  :class="classes">
            <slot />
        </button>
   
</template>

<script setup>
import { ref, computed} from 'vue';
    const props =
     defineProps({
        btnClasses: {
            type: String,
            default: 'w-8 h-8 flex justify-center items-center rounded-full bg-gray-200 hover:bg-gray-300',
        },
        
    });

    const classes = computed(() => {
        return [
            props.btnClasses,
        ];
    });
</script>
