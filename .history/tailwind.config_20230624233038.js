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
        danger: {
            DEFAULT: '#EF4444',
            50: '#FEF2F2',
            100: '#FEE2E2',
            200: '#FECACA',
            300: '#FCA5A5',
            400: '#F87171',
            500: '#EF4444',
            600: '#DC2626',
            700: '#B91C1C',
            800: '#991B1B',
            900: '#7F1D1D',
        },
        warning: {
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
        info: {
            DEFAULT: '#3B82F6',
            50: '#EFF6FF',
            100: '#DBEAFE',
            200: '#BFDBFE',
            300: '#93C5FD',
            400: '#60A5FA',
            500: '#3B82F6',
            600: '#2563EB',
            700: '#1D4ED8',
            800: '#1E40AF',
            900: '#1E3A8A',
        },
        light: {
            DEFAULT: '#F9FAFB',
            50: '#FFFFFF',
            100: '#FFFFFF',
            200: '#FFFFFF',
            300: '#FFFFFF',
            400: '#FFFFFF',
            500: '#F9FAFB',
            600: '#F3F4F6',
            700: '#E5E7EB',
            800: '#D1D5DB',
            900: '#9CA3AF',
        },
        dark: {
            DEFAULT: '#1F2937',
            50: '#E4E4E7',
            100: '#BCBCC0',
            200: '#8D8D93',
            300: '#5F5F6E',
            400: '#3F3F46',
            500: '#1F2937',
            600: '#1A202C',
            700: '#12161D',
            800: '#0E1317',
            900: '#0A0C10',
        },
        transparent: 'transparent',
        current: 'currentColor',
        black: '#000',
        white: '#fff',
        gray: {
            DEFAULT: '#6B7280',
            50: '#F9FAFB',
            100: '#F3F4F6',
            200: '#E5E7EB',
            300: '#D1D5DB',
            400: '#9CA3AF',
            500: '#6B7280',
            600: '#4B5563',
            700: '#374151',
            800: '#1F2937',
            900: '#111827',
        },
        colors: {
            primary: '#1E40AF',
            secondary: '#F59E0B',
            success: '#10B981',
            danger: '#EF4444',
            warning: '#F59E0B',
            info: '#3B82F6',
            light: '#F9FAFB',
            dark: '#1F2937',
            transparent: 'transparent',
            current: 'currentColor',
            black: '#000',
            white: '#fff',
            gray: {
                DEFAULT: '#6B7280',
                50: '#F9FAFB',
                100: '#F3F4F6',
                200: '#E5E7EB',
                300: '#D1D5DB',
                400: '#9CA3AF',
                500: '#6B7280',
                600: '#4B5563',
                700: '#374151',
                800: '#1F2937',
                900: '#111827',
            },
            green: {
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
            red: {
                DEFAULT: '#EF4444',
                50: '#FEF2F2',
                100: '#FEE2E2',
                200: '#FECACA',
                300: '#FCA5A5',
                400: '#F87171',
                500: '#EF4444',
                600: '#DC2626',
                700: '#B91C1C',
                800: '#991B1B',
                900: '#7F1D1D',
            },
            yellow: {
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
            blue: {
                DEFAULT: '#3B82F6',
                50: '#EFF6FF',
                100: '#DBEAFE',
                200: '#BFDBFE',
                300: '#93C5FD',
                400: '#60A5FA',
                500: '#3B82F6',
                600: '#2563EB',
                700: '#1D4ED8',
                800: '#1E40AF',
                900: '#1E3A8A',
            },
            light: {
                DEFAULT: '#F9FAFB',
                50: '#FFFFFF',
                100: '#FFFFFF',
                200: '#FFFFFF',
                300: '#FFFFFF',
                400: '#FFFFFF',
                500: '#F9FAFB',
                600: '#F3F4F6',
                700: '#E5E7EB',
                800: '#D1D5DB',
                900: '#9CA3AF',
            },
            
        },


    },

    plugins: [forms],
};
