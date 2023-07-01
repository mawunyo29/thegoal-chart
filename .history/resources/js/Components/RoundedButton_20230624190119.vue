<template >
    <div>
        <button  class="text-xs"  :class="classes">
            <slot />
        </button>
    </div>
</template>

<script setup>
import { ref, computed} from 'vue';
    const props =
     defineProps({
        btnClasses: {
            type: String,
            default: 'w-8 h-8 flex justify-center items-center rounded-full',
        },
        
    });

    const classes = computed(() => {
        return [
            props.btnClasses,
        ];
    });
</script>
