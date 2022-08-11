<script>
    import Router from 'svelte-spa-router';
    import routes from './../routes';
</script>

<main>
    <Router {routes} />
</main>

<style>
    main {
        position: relative;
        transition: left 0.7s ease-in-out;
        left: 0;
        color: var(--text-prim);
        background: var(--bg-tert);
        overflow: auto;
        height: 100vh;
        padding: 1rem;
        padding-top: 4rem;
        max-width: 100vw;
    }
    :global(body.showSidebar) main {
        position: relative;
        left: 15rem;
        max-width: calc(100vw - 15rem);
        transition: left 0.7s ease-in-out;
    }
</style>
