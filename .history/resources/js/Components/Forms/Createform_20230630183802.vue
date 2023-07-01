<script setup>
import { ref, computed , watch} from 'vue';

const props = defineProps({
  fillable: {
        type: Array,
        required: true,
    },
    action : {
        type: String,
        required: true,
    },
    method : {
        type: String,
        required: true,
    },
    
});

const form = ref({});
const errors = ref({});
const formFields = computed(() => {
    return Object.keys(props.fillable);
});


</script>
<template>
    <div class="flex flex-col">
        <div class="flex flex-row justify-between ">
          <template v-for="(field, index) in formFields">
            <div class="flex flex-col">
                <label :for="field" class="text-sm font-bold text-gray-700 tracking-wide">{{field}}</label>
                <input v-model="form[field]" :id="field" :name="field" type="text" class="form-input w-full text-gray-700 mt-1 focus:outline-none focus:shadow-outline" placeholder="Jane Doe">
                <p v-if="errors[field]" class="text-red-500 text-xs italic">{{errors[field][0]}}</p>
            </div>
            </template>
        </div>
    </div>
</template>

