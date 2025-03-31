import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            // --- ADD YOUR COLORS HERE ---
            colors: {
                'primary': { // Teal shades
                    DEFAULT: '#14B8A6', // Teal-500
                    '50': '#F0FDFA',
                    '100': '#CCFBF1',
                    '200': '#99F6E4',
                    '300': '#5EEAD4',
                    '400': '#2DD4BF',
                    '500': '#14B8A6',
                    '600': '#0D9488',
                    '700': '#0F766E',
                    '800': '#115E59',
                    '900': '#134E4A',
                    '950': '#042f2e',
                },
                'secondary': { // Orange shades
                    DEFAULT: '#F97316', // Orange-500
                    '50': '#FFF7ED',
                    '100': '#FFEDD5',
                    '200': '#FED7AA',
                    '300': '#FDBA74',
                    '400': '#FB923C',
                    '500': '#F97316',
                    '600': '#EA580C',
                    '700': '#C2410C',
                    '800': '#9A3412',
                    '900': '#7C2D12',
                    '950': '#431407',
                },
                // Optional: Add neutral or accent colors if needed
                'neutral-light': '#F8FAFC', // Example: Slate-50
                'neutral-dark': '#1E293B',  // Example: Slate-800
            }
            // --- END OF CUSTOM COLORS ---
        },
    },

    plugins: [forms],
};
