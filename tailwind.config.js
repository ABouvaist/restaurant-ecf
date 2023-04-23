const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                'platinum': '#d8dbe2ff',
                'powder-blue': '#a9bcd0ff',
                'moonstone': '#58a4b0ff',
                'charcoal': '#373f51ff',
                'melon': '#daa49aff',
            }
        }
    }
};
