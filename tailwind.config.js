import preset from './vendor/filament/support/tailwind.config.preset'

/** @type {import('tailwindcss').Config} */
module.exports = {
    presets: [preset],
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors:{
                main: '#FFC711',
                lightYellow:'#fbad18',
                dark:'#072d44',
                ylw:'#FFC711'
            }
        },
    },
    daisyui: {
        themes: [],
      },
    plugins: [
        require('daisyui'),
    ],
}

