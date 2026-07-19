import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import { designTokens } from './resources/js/shared/theme/tokens.js';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['ui-sans-serif', 'system-ui', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', ...defaultTheme.fontFamily.sans],
            },
            colors: designTokens.colors,
            borderRadius: designTokens.radius,
            boxShadow: designTokens.shadow,
        },
    },

    plugins: [forms],
};
