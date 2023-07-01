import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
        tabSize: {
            0: '0',
            1: '1rem',
            2: '2rem',
            3: '3rem',
            4: '4rem',
            5: '5rem',
            6: '6rem',
            7: '7rem',
        },
    },

    plugins: [forms],
};
