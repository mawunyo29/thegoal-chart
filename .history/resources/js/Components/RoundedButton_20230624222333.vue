<template >
    
        <button  class="text-xs flex justify-center items-center rounded-full  hover:bg-gray-300"  :class="classes">
            <slot />
        </button>
   
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
        //change the classes here if you want to change the button style
        // if btnClasses is not passed and have  class w an h, the default classes will be used

        //check if the btnClasses is passed
        if (props.btnClasses) {
            return [
                props.btnClasses,
            ];
        }else if(props.btnClasses && props.btnClasses.includes('w-') && props.btnClasses.includes('h-')){
            return [
                props.btnClasses,
            ];
        }
        //if not passed, use the default classes
        return 'w-8 h-8  hover:bg-blue-700  font-bold rounded-full focus:outline-none  transition duration-300 ease-in-out drop-shadow-lg'

        
    });
</script>
