# Svelte-Docs
 
 
## index.html
###  Index file  
almost no `<body>` content  
importatnt for `<meta>` tags in `<head>`  
  
 
 
## src/util/auth.js
###  Authentication file  
handles `page reload` without logout, login & logout  
the `store` variable `$User` is `true` if the user is logged in  
###  get `User`items from `localStorage`  
read all items, store them & set `User` -> `true`  
so we can reload the page without to logout  

### `User.login(payload, token)`  
sets `ID`, `Role`, `Permission`, `Token` & `Avatar` to `localStorage` and `store`  
sets the `store-Item` `User` -> `true`  
called by `authUser()`  
**param** ` array ` & string  
**return** ` redirect ` to `/profile`  

### `User.logout()`  
removes all items from `localStorage` & empties all stores  
called in `layout/Menue.svelte`  
**return** ` redirect ` to login form  

### `authUser(token)`  
parse JWT to array and calles `User.login()`  
**param** ` JWT ` from API  
**return** ` array ` with payload for `User.login()`  
 
 
## src/util/showJSON.js

### `showJSON(JSON)`  
just a little helper to display a JSON object as formatted HTML  
**param** ` object `  JSON  
**return** ` HTML ` element `<pre>...</pre>`  
 
 
## src/util/breakpoints.js

### `Set breakpoints by using matchMedia()`  
Depending of the page-width a `data-view` attribute is set to `<body>`  
max 36em -> `small`  
max 60em -> `medium`  
max 120em -> `large`  
usage in CSS: `:global([data-view='small'] .classname) {}`  
 
 
## src/layout/Logo.svelte
###  File for the Logo inside the `Header.svelte`  
 
 
## src/layout/Login.svelte
###  Login Page  
sends email and passwort to `API` and get the `JWT` back  
calles `authUser` in `util/auth.js` to do the login  
imports the `<ToggleTheme>` component for CSS support  
 
 
## src/layout/Header.svelte
###  Header Layout  
Contains the `<Hamburger>`, `<Logo>` and the `<Menu>`  
 
 
## src/layout/Content.svelte
###  Page Content  
The `<main>` part of the page & the part where the `<Router>` works  
Although effected by the CSS class `.showSidebar`  
 
 
## src/layout/Menu.svelte
###  Menu Bar in Header  
imports the `<toggleTheme>`  
calles `User.logout` in `util/auth.js`  
 
 
## src/layout/Hamburger.svelte
###  Hamburger Button  
animated SVG  
toggles the `<body>` class `.showSidebar`  
 
 
## src/layout/Sidebar.svelte
###  Sidebar Layout  
switches between sidebar and footer navigation,  
depending on the `matchMedia` in `util/breakpoints.js`  
 
 
## src/App.svelte
###  The first Svelte file  
imports the `util/breakpoints.js` and handles `toggleView`  
switch for `$User` to App or to `<Login>` page  
imports all `layout/` files  

### `toggleView()`  
load & add to resize toggleView to set the media-width  
**return** ` data-view ` in <body>  
 
 
## src/main.js
name main.js  
imports `App.svelte` & `app.css`  
called by `index.html`  
 
 
## src/routes.js
###  Routing file  
loads dynamically the routes  
