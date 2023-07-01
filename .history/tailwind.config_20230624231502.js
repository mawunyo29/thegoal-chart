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
            '1': '1',
            '2': '2',
            '3': '3',
            '4': '4',
            '8': '8',
       
    },

    plugins: [
        plugin(function({ matchUtilities, theme }) {
            matchUtilities(
              {
                tab: (value) => ({
                  tabSize: value
                }),
              },
              { values: theme('tabSize') }
            )
          })
    ],
};
