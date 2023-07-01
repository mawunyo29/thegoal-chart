<script setup>
import { computed, onMounted, onUnmounted, watch, ref } from 'vue';

const tabNavigation = ref(false);


</script>
<template>
    <!-- This example requires Tailwind CSS v2.0+  tab navigator -->
    <div class="bg-white  absolute bottom-2 flex">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    <a href="#" class="border-indigo-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                        aria-current="page">
                        Dashboard
                    </a>

                    <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        Team
                    </a>

                    <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        Projects
                    </a>

                    <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        Calendar
                    </a>
                </nav>
            </div>
        </div>
    </div>

</template>