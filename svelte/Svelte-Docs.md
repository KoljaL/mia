# Svelte-Docs
 
 
## src/util/auth.js
###  get `User`items from `localStorage`  
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
 
 
## src/App.svelte

### `toggleView()`  
load & add to resize toggleView to set the media-width  
**return** ` data-view ` in <body>  
