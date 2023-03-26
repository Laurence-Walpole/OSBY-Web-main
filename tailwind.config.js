const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                gold: {
                    '50': '#ffcb66',
                    '100': '#efbc59',
                    '200': '#dfad4d',
                    '300': '#cf9e40',
                    '400': '#c09033',
                    '500': '#b08126',
                    '600': '#a0721a',
                    '700': '#90630d',
                    '800': '#805400',
                    '900': '#000000',
                }
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
