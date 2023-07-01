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
       

        
    });
</script>
