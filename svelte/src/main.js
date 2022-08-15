/**
 * name main.js
 * 
 * imports `App.svelte` & `app.css` 
 * called by `index.html`
 * 
 */

import App from './App.svelte';
import './app.css';

const app = new App({
    target: document.body,
});

export default app;