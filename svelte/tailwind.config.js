const colors = require('tailwindcss/colors')

module.exports = {
    content: ['./src/**/*.{svelte,js,ts}'],
    theme: {

        backgroundColor: {
            "prim": "var(--bg-prim)",
            "seco": "var(--bg-seco)",
            "tert": "var(--bg-tert)",
            "info": "var(--info)",
            "warn": "var(--warn)",
            "error": "var(--error)",
            ...colors
        },
        textColor: {
            "prim": "var(--text-prim)",
            "seco": "var(--text-seco)",
            "tert": "var(--text-tert)",
            "success": "var(--success)",
            "info": "var(--info)",
            "warn": "var(--warn)",
            "error": "var(--error)",
            ...colors
        },
        borderColor: {
            "prim": "var(--border-prim)",
            "seco": "var(--border-seco)",
            "tert": "var(--border-tert)",
            ...colors

        },
        extend: {

        },
    },
    plugins: [require('daisyui')],
}