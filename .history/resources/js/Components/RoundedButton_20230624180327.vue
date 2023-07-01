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
            default: 'w-8 h-8 flex justify-center items-center rounded-full bg-green-500 text-white',
        },
        
    });
</script>
