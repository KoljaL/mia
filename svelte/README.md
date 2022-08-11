# Svelte frontend

## todo
- [ ] a lot

## Links
- https://svelte.dev/repl/d7b5f0d565a441cfac66e093ee6fe62d?version=3.19.1
- https://github.com/alexbaumhoer/svelte-jwt-decode
- https://stackoverflow.com/questions/38552003/how-to-decode-jwt-token-in-javascript-without-using-a-library


## installed libraries
- Tailwind
- DaisyUI
- Axios
- [SPA-Router](https://github.com/ItalyPaleAle/svelte-spa-router) 


## Functions & Components

### Theme Switch
In this way, it is posible to set an unlimited amount of themes & and switching them by just one button.
Therefor an attribute is set to the body tag `<body data-theme="theme-dark">` and althougt stored in localStorage. 
The theme-switch names, function & icon are defined in `./components/toggleTheme.svelte`. 
In `./app.css` are the custom variables for every theme, they get importet into tailwind inside `./tailwind.config.js`.