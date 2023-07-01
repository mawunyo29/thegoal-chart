<script setup>
import { computed, onMounted, onUnmounted, watch, ref } from 'vue';

const tabNavigation = ref(false);

const navigationAnimation = () => {
    const tabNavigator = document.querySelector('#tab-navigator');
    const tabNavigatorButton = document.querySelector('#tab-navigator-button');
    const tabNavigatorLinks = document.querySelectorAll('.tab-navigator-link');

    const closeTabNavigator = () => {
        tabNavigator.classList.remove('hidden');
        tabNavigator.classList.add('hidden');
    };

    const openTabNavigator = () => {
        tabNavigator.classList.remove('hidden');
        tabNavigator.classList.add('block');
    };

    const toggleTabNavigator = () => {
        if (tabNavigator.classList.contains('hidden')) {
            openTabNavigator();
        } else {
            closeTabNavigator();
        }
    };

    tabNavigatorButton.addEventListener('click', toggleTabNavigator);

    tabNavigatorLinks.forEach((tabNavigatorLink) => {
        tabNavigatorLink.addEventListener('click', closeTabNavigator);
    });

};

</script>
<template>
    <!-- This example requires Tailwind CSS v2.0+  tab navigator -->
    <div class="bg-white  absolute bottom-2 flex justify-start left-0 right-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    <a href="#" class="border-indigo-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm tab-navigator-link"
                        aria-current="page">
                        Dashboard
                    </a>

                    <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm tab-navigator-link">
                        Team
                    </a>

                    <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm tab-navigator-link">
                        Projects
                    </a>

                    <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm tab-navigator-link">
                        Calendar
                    </a>
                </nav>
            </div>
        </div>
    </div>

</template>