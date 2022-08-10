<script>
    import Router from 'svelte-spa-router';
    import routes from './../routes';
</script>

<main class="p-4 pt-16 text-prim bg-tert h-screen overflow-auto">
    <Router {routes} />
</main>

<style>
    main {
        position: relative;
        transition: left 0.7s ease-in-out;
        left: 0;
        max-width: 100vw;
        /* border: 1px solid red; */
    }
    :global(body.showSidebar) main {
        position: relative;
        left: 15rem;
        max-width: calc(100vw - 15rem);
        transition: left 0.7s ease-in-out;
    }
</style>
