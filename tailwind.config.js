const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],

    theme: {
        fontSize: {
            'base': '1rem',
            'md': '1.125rem',
            'lg': '1.25rem',
            'xl': '1.5rem',
            '2xl': '1.75rem',
            '3xl': '2rem',
            '4xl': '2.5rem',
        },
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            screens: {
                'xxs': '432px',
                'xs': '576px',
                'sm': '768px',
                'md': '820px',
                'lg': '1024px',
                'xl': '1280px',
                '2xl': '1536px',
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
