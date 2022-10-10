const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
      extend: {
        colors: {
          primary:'#7CA4AE'
        }
      },
        fontFamily: {
        'ubuntu': ['Ubuntu', 'sans'],
      }, 
       screens: {
        'hp': '390px',
        'sm': '640px',
        'md': '768px',
        'lg': '1024px',
        'xl': '1280px',
      },

    },
    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};