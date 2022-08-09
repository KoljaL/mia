const colors = require('tailwindcss/colors')

module.exports = {
    content: ['./src/**/*.{svelte,js,ts}'],
    theme: {
        textColor: {
            "text-prim": "var(--text-prim)",
            "text-secu": "var(--text-secu)",
            "text-tert": "var(--text-tert)",
            "bg-prim": "var(--bg-prim)",
            "bg-secu": "var(--bg-secu)",
            "bg-tert": "var(--bg-tert)",
            "border-prim": "var(--border-prim)",
            "border-secu": "var(--border-secu)",
            "border-tert": "var(--border-tert)",
            "success": "var(--success)",
            "info": "var(--info)",
            "warn": "var(--warn)",
            "error": "var(--error)",
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