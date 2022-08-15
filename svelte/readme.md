# Svelte frontend

## todo
- [ ] a lot......

## Links
- https://svelte.dev/repl/d7b5f0d565a441cfac66e093ee6fe62d?version=3.19.1
- https://github.com/alexbaumhoer/svelte-jwt-decode
- https://stackoverflow.com/questions/38552003/how-to-decode-jwt-token-in-javascript-without-using-a-library
- https://stackoverflow.com/questions/65724373/svelte-unable-to-get-imported-unused-css-purged
- https://vitejs.dev/guide/env-and-mode.html
- https://medium.com/dev-cafe/how-to-setup-env-variables-to-your-svelte-js-app-c1579430f032
- https://www.donielsmith.com/blog/2020-05-11-how-to-use-dotenv-with-svelte-3/
- https://stackoverflow.com/questions/69762299/how-to-define-environment-variables-in-svelte
- https://github.com/svelte-brasil/svelte-routify-dotenv-sass-prettier-test


## installed libraries
- Axios
- [SPA-Router](https://github.com/ItalyPaleAle/svelte-spa-router) 
- [Svelte-Icons](https://github.com/cristovao-trevisan/svelte-icon)
- [Zondi-Icons](https://www.zondicons.com/)
- [Eva-Icons](https://github.com/akveo/eva-icons)


## Functions & Components

### Theme Switch
In this way, it is posible to set an unlimited amount of themes & and switching them by just one button.
Therefor an attribute is set to the body tag `<body data-theme="theme-dark">` and althougt stored in localStorage. 
The theme-switch names, function & icon are defined in `./components/toggleTheme.svelte`. 
In `./app.css` are the custom variables for every theme, they get importet into tailwind inside `./tailwind.config.js`.

## Backend directory

´´´
mia/
┣ db/
┃ ┗ database.sqlite
┣ endpoints/
┃ ┣ customer.php
┃ ┣ initDB.php
┃ ┣ login.php
┃ ┗ profile.php
┣ php/
┃ ┣ config.php
┃ ┣ functions.php
┃ ┣ functionsDB.php
┃ ┣ makeDocs.php
┃ ┗ pprint.php
┣ .htaccess
┣ API-Docs.md
┣ composer.json
┣ composer.lock
┣ error.log
┣ favicon.ico
┣ index.php
┣ readme.md
┗ shema.md
´´´

## Frontend directory
```bash
svelte/
┣ src/
┃ ┣ components/
┃ ┃ ┗ toggleTheme.svelte
┃ ┣ layout/
┃ ┃ ┣ Content.svelte
┃ ┃ ┣ Hamburger.svelte
┃ ┃ ┣ Header.svelte
┃ ┃ ┣ Login.svelte
┃ ┃ ┣ Logo.svelte
┃ ┃ ┣ Menu.svelte
┃ ┃ ┗ Sidebar.svelte
┃ ┣ routes/
┃ ┃ ┣ Customer.svelte
┃ ┃ ┣ CustomerSingle.svelte
┃ ┃ ┣ Home.svelte
┃ ┃ ┣ NotFound.svelte
┃ ┃ ┗ Profile.svelte
┃ ┣ util/
┃ ┃ ┣ auth.js
┃ ┃ ┣ breakpoints.js
┃ ┃ ┗ showJSON.js
┃ ┣ App.svelte
┃ ┣ app.css
┃ ┣ main.js
┃ ┗ routes.js
┣ Svelte-Docs.md
┣ favicon.ico
┣ index.html
┣ package-lock.json
┣ package.json
┣ postcss.config.js
┣ readme.md
┗ vite.config.js
 ```
