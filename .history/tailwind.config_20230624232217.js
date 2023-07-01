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
        primary: {
            DEFAULT: '#1E40AF',
            50: '#E0E8FF',
            100: '#BED0FF',
            200: '#98AEEB',
            300: '#7B93DB',
            400: '#647ACB',
            500: '#4C63B6',
            600: '#4055A8',
            700: '#35469C',
            800: '#2D3A8C',
            900: '#19216C',
        },
        secondary: {
            DEFAULT: '#F59E0B',
            50: '#FFFBEB',
            100: '#FEF3C7',
            200: '#FDE68A',
            300: '#FCD34D',
            400: '#FBBF24',
            500: '#F59E0B',
            600: '#D97706',
            700: '#B45309',
            800: '#92400E',
            900: '#78350F',
        },
        success: {
            DEFAULT: '#10B981',
            50: '#ECFDF5',
            100: '#D1FAE5',
            200: '#A7F3D0',
            300: '#6EE7B7',
            400: '#34D399',
            500: '#10B981',
            600: '#059669',
            700: '#047857',
            800: '#065F46',
            900: '#064E3B',
        },
    },

    plugins: [forms],
};
