<script setup>
import { computed, onMounted, onUnmounted, watch } from 'vue';
import { Inertia } from '@inertiajs/vue3';

computed(() => {
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
    Inertia.on('start', () => {
        closeMenu();
    });
});
</script>

<template>
    
</template>