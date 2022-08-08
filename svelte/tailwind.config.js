const colors = require('tailwindcss/colors')

module.exports = {
    content: ['./src/**/*.{svelte,js,ts}'],
    theme: {
        textColor: {
            "primary": "var(--color-primary)",
            "secondary": "var(--color-secondary)",
            ...colors
        },
        backgroundColor: {
            "primary": "var(--color-primary)",
            "secondary": "var(--color-secondary)",
            ...colors
        },
        extend: {},
    },
    plugins: [require('daisyui')],
}