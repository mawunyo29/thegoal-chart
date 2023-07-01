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
            default: '',
        },
        
    });

    const classes = computed(() => {
        return [
            props.btnClasses,
        ];
    });
</script>
