import laravel from 'laravel-vite-plugin';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                laravel: "#EF3B2D"
            },
        },
    },
    plugins: [],
};

