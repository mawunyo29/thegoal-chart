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
            default: ' flex justify-center items-center rounded-full  hover:bg-gray-300',
        },
        
    });

    const classes = computed(() => {
        //change the classes here if you want to change the button style
        // if btnClasses is not passed and have  class w an h, the default classes will be used

        //check if the btnClasses is passed
        if (props.btnClasses) {
            return [
                props.btnClasses,
            ];
        }
        //if not passed, use the default classes
        return [
            'w-10 h-10',
            'bg-gray-200',
            'text-gray-600',
            'hover:bg-gray-300',
            'ring',
            'focus:outline-none',
            'focus:ring-2',
            'focus:ring-offset-2',
            'focus:ring-gray-500',
        ];

        
    });
</script>
