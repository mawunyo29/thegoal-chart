import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
function cardVariants() {
    return Object.entries(theme('colors')).flatMap(([color, values]) => {
      if (color === 'transparent' || color === 'current') {
        return []
      }
      return Object.entries(values).map(([weight, hex]) => {
        return {
          [`.card-${color}-${weight}`]: {
            '--tw-shadow': `0 25px 50px -12px ${hex}`,
            '--tw-ring-shadow': `0 25px 50px -12px ${hex}`,
          },
        }
      })
    })
  }
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
    },

    plugins: [forms],
   
};
