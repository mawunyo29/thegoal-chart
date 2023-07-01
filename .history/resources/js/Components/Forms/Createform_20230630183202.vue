<script setup>
import { ref, computed , watch} from 'vue';


const create = () => {
    return {
        isOpen: false,
        isListOpen: false,
        rejectedKeys: [],
        data: [],
        displayStyle: 'table',
        headers: [],
    }
}
</script>

<template>
    <div class="flex flex-col">
        <div class="flex flex-row justify-between ">
          <slot />
        </div>
        
    </div>
</template>

