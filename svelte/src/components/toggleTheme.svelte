<script>
    // TODO onMount load toggleTgeme with parameter

    // define themes
    const themes = ['theme-dark', 'theme-light'];

    // loox in localstorage for a theme & set it as body attribute
    if (localStorage.getItem('data-theme')) {
        document.body.setAttribute('data-theme', localStorage.getItem('data-theme'));
    }

    // set first theme as default theme (if no :root{})
    else {
        document.body.setAttribute('data-theme', themes[0]);
    }

    // get currentTheme from body, step to the next theme & set this in licalStorage & body
    function toggleTheme() {
        let currentTheme = document.body.getAttribute('data-theme');
        let themeIndex = themes.indexOf(currentTheme) + 1;
        if (themeIndex === themes.length) themeIndex = 0;
        localStorage.setItem('data-theme', themes[themeIndex]);
        document.body.setAttribute('data-theme', themes[themeIndex]);
    }
</script>

<div class="icon" on:click={toggleTheme}>
    <svg class="SVGicon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
        <path id="Palette_1_" d="M84.71,80.953c-0.169-4.002-6.185-15.902-6.043-20.52c0.162-5.236,3.329-11.685,9.923,0.922  c3.951,7.555,10.016,2.854,10.752-0.822c2.223-11.12-1.078-24.458-11.591-37.527C69.567,0.405,37.605-5.802,16.38,9.144  C-4.844,24.092-5.271,57.752,14.097,77.26c17.555,17.676,41.765,25.445,62.007,16.926C78.197,93.301,85.123,90.59,84.71,80.953z   M27.852,15.419c3.83-2.697,9.12-1.78,11.819,2.052c2.699,3.831,1.779,9.122-2.051,11.819c-3.833,2.699-9.122,1.78-11.821-2.051  C23.1,23.408,24.018,18.119,27.852,15.419z M11.314,49.892c-2.697-3.831-1.777-9.122,2.053-11.819  c3.828-2.697,9.122-1.782,11.819,2.049c2.699,3.832,1.777,9.124-2.051,11.821C19.305,54.641,14.012,53.727,11.314,49.892z   M52.489,27.813c-2.701-3.831-1.781-9.124,2.051-11.821c3.831-2.697,9.12-1.779,11.821,2.053c2.697,3.83,1.778,9.12-2.053,11.819  C60.477,32.562,55.187,31.645,52.489,27.813z M23.794,71.543c-2.697-3.834-1.78-9.127,2.05-11.824  c3.831-2.697,9.124-1.779,11.821,2.051c2.697,3.832,1.78,9.125-2.051,11.822C31.784,76.291,26.492,75.371,23.794,71.543z" />
    </svg>
</div>

<style>
    :global(.icon svg) {
        fill: var(--text-prim);
        color: var(--text-prim);
    }
    :global(.icon svg):hover {
        filter: brightness(150%);
        cursor: pointer;
    }
</style>
