<script setup>
import { computed, onMounted, onUnmounted, watch } from 'vue';

const menuOpen = ref(false);
const open = () => {
    const menu = document.querySelector('#menu');
    const menuButton = document.querySelector('#menu-button');
    const menuLinks = document.querySelectorAll('.menu-link');

    const closeMenu = () => {
        menu.classList.remove('hidden');
        menu.classList.add('hidden');
    };

    const openMenu = () => {
        menu.classList.remove('hidden');
        menu.classList.add('block');
    };

    const toggleMenu = () => {
        if (menu.classList.contains('hidden')) {
            openMenu();
        } else {
            closeMenu();
        }
    };

    menuButton.addEventListener('click', toggleMenu);

    menuLinks.forEach((menuLink) => {
        menuLink.addEventListener('click', closeMenu);
    });
    
};

</script>

<template>
    <div id="menu">
        <div class="flex justify-between items-center py-4 px-6 bg-white border-b-4 border-indigo-600">
            <div class="flex items-center">
                <button id="menu-button" class="text-gray-500 focus:outline-none lg:hidden">
                    <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                        <path v-if="menuOpen" fill-rule="evenodd" clip-rule="evenodd"
                            d="M4 6h16v2H4V6zm0 5h16v2H4v-2zm0 5h16v2H4v-2z" />
                        <path v-else d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z" />
                    </svg>
                </button>
                <div class="hidden lg:flex items-center ml-6">
                    <a href="#"
                        class="text-gray-500 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium menu-link">Home</a>
                    <a href="#"
                        class="text-gray-500 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium menu-link">About</a>
                    <a href="#"
                        class="text-gray-500 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium menu-link">Contact</a>
                </div>
            </div>
            <div class="hidden lg:flex items-center">
                <button
                    class="flex-shrink-0 text-indigo-600 hover:text-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 rounded-md py-2 px-4">
                    Login
                </button>
                <button
                    class="flex-shrink-0 bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 rounded-md py-2 px-4 ml-4">
                    Sign Up
                </button>
            </div>
        </div>
        <div id="menu" class="hidden lg:hidden">
            <a href="#"
                class="block text-gray-500 hover:text-indigo-500 px-4 py-2 rounded-md text-base font-medium">Home</a>
            <a href="#"
                class="block text-gray-500 hover:text-indigo-500 px-4 py-2 rounded-md text-base font-medium">About</a>
            <a href="#"
                class="block text-gray-500 hover:text-indigo-500 px-4 py-2 rounded-md text-base font-medium">Contact</a>

            <div class="pt-4 pb-3 border-t border-gray-700"> </div>
        </div>
    </div>
</template>