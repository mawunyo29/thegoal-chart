<template >
    <div>
        <button  :class="classes">
            <slot />
        </button>
    </div>
</template>
<script>
    const props = defineProps({
       
        classes: {
            type: String,
            default: '',
        },
        
    });
</script>
