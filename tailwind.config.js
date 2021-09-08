const colors = require('tailwindcss/colors')

module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        colors: {
            emerald: colors.emerald,
            gray: colors.gray,
            yellow: colors.yellow,
            blue: {
                '100': '#e0dfff',
                '500': '#3a4354',
                '600': '#3a3a54'
            },
            lightBlue: {
                '500': '#11baba',
            }
        },
        fontFamily: {
            'display': ['Montserrat'],
            'body' : ['"Josefin Sans"'],
        },
        extend: {
            backgroundImage: theme => ({
                'main-option': "url('/imgs/home.jpg')",
                'main': "url('/imgs/main.png')",
                'main-option-2': "url('/imgs/main-option-2.png')",
                'perfil2': "url('/imgs/perfil2.jpg')",
                'acercasvg': "url('/svg_bg/acerca.svg')",
                'acuario': "url('/imgs/acuario.png')",
                'aries': "url('/imgs/aries.png')",
                'cancer': "url('/imgs/cancer.png')",
                'capricornio': "url('/imgs/capricornio.png')",
                'escorpio': "url('/imgs/escorpio.png')",
                'geminis': "url('/imgs/geminis.png')",
                'leo': "url('/imgs/leo.png')",
                'libra': "url('/imgs/libra.png')",
                'piscis': "url('/imgs/piscis.png')",
                'sagitario': "url('/imgs/sagitario.png')",
                'tauro': "url('/imgs/tauro.png')",
                'virgo': "url('/imgs/virgo.png')",
            })
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
