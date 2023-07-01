<script setup>
import { computed, onMounted, onUnmounted, watch, ref } from 'vue';

const tabNavigation = ref(false);

const navigationAnimation = () => {

    const tabNavigatorLinks = document.querySelectorAll('.tab-navigator-link');
    tabNavigatorLinks.forEach((tabNavigatorLink) => {
        tabNavigatorLink.addEventListener('click', (e) => {
            e.preventDefault();
            if (e.target.classList.contains('border-indigo-500')) {
                return;
            } else {
                //remove active class and aria-current from all links and add it to the clicked link 
                e.target.parentElement.querySelectorAll('.tab-navigator-link').forEach((link) => {
                    link.classList.remove('border-indigo-500');
                    link.classList.add('border-transparent');
                    link.setAttribute('aria-current', 'false');
                });
                e.target.classList.remove('border-transparent');
                //add active class and aria-current to the clicked link
                e.target.classList.add('border-indigo-500');
                //set aria-current to page
                e.target.setAttribute('aria-current', 'page');
                //add animation  transform transition-all sm:w-full sm:mx-auto to tab navigator
                e.target.classList.add('animate-tab-navigator');

                //remove animation after 300ms
                setTimeout(() => {
                    e.target.parentElement.classList.remove('animate-tab-navigator');
                }, 300);


            }
        });
    }
    );

};

onMounted(() => {
    navigationAnimation();
});
</script>
<template>
    <!-- This example requires Tailwind CSS v2.0+  tab navigator -->
    <div class="bg-white  absolute bottom-2 flex justify-start left-0 right-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="border-b border-gray-200" id="tab-navigator">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    <a href="#"
                        class="border-indigo-500  text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm tab-navigator-link"
                        aria-current="page">
                        Home
                    </a>

                    <a href="#"
                        class="border-transparent text-gray-500 hover:text-gray-700  whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm tab-navigator-link">
                        Team
                    </a>

                    <a href="#"
                        class="border-transparent text-gray-500 hover:text-gray-700  whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm tab-navigator-link">
                        Projects
                    </a>

                    <a href="#"
                        class="border-transparent text-gray-500 hover:text-gray-700  whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm tab-navigator-link">
                        Calendar
                    </a>
                </nav>
            </div>
        </div>
    </div>
</template>