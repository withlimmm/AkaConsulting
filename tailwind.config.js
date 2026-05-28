import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],

    theme: {
        extend: {
            spacing: {
                'margin-mobile': '1rem',
                'margin-desktop': '5rem',
                'section-padding': '7.5rem',
            },
            colors: {
                primary: '#8d6408',
                secondary: '#b8820f',
                'primary-container': '#d9a11a',
                background: '#fbf7ef',
                'on-background': '#20160f',
                surface: '#fffaf0',
                'surface-variant': '#e9dcc4',
                'surface-container-low': '#f6efdf',
                'surface-container-high': '#e9dbc2',
                'surface-container-lowest': '#ffffff',
                'on-surface': '#20160f',
                'on-surface-variant': '#5c4a34',
                success: '#0f8f5f',
                error: '#b42318',
                'outline-variant': '#d8c8ab',
                'glass-fill': 'rgba(255, 250, 240, 0.78)',
                'glass-border': 'rgba(217, 161, 26, 0.16)',
            },
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                headline: ['Plus Jakarta Sans', ...defaultTheme.fontFamily.sans],
                display: ['Montserrat', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
