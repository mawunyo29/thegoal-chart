<script setup>
import { ref, computed, watch } from 'vue';
const emit = defineEmits(['update:store']);
const props = defineProps({
    fillable: {
        type: Array,
        required: true,
    },
    action: {
        type: String,
        required: false,
    },
    method: {
        type: String,
        required: false,
    },

});

const form = ref({});
const errors = ref({});
const formFields = computed(() => {
    return Object.keys(props.fillable);
});

const store = computed({
    get() {
        return form.value;
    },
    set(val) {
        emit('update:store', val);
    },
});

</script>
<template>
    <div class="w-full card">
        <div class="flex flex-col ">
            <div class="flex flex-col ">
                <div class="flex flex-row">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Save
                    </button>
                    <button type="button"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        @click="reset">
                        Reset
                    </button>
                </div>
                <template v-for="(field, index) in formFields">
                    <div class="flex flex-col">
                        <label :for="field" class="text-sm font-bold text-gray-700 tracking-wide">{{ field }}</label>
                        <input v-model="form[field]" :id="field" :name="field" type="text"
                            class="form-input w-full text-gray-700 mt-1 focus:outline-none focus:shadow-outline"
                            placeholder="Jane Doe">
                        <p v-if="errors[field]" class="text-red-500 text-xs italic">{{ errors[field][0] }}</p>
                    </div>
                </template>
            </div>
        </div>
    </div>
</template>

