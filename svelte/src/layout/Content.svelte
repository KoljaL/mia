<script>
  /**
   * title Page Content
   *
   * The `<main>` part of the page & the part where the `<Router>` works
   * Although effected by the CSS class `.showSidebar`
   *
   */
  import Router from 'svelte-spa-router';
  import routes from './../routes';
  const prefix = '/mis/svelte/dist/';
</script>

<main>
  <!-- <Router {routes} {prefix} /> -->
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
    padding: 0;
    padding-top: 4rem;
    margin: 0;
    max-width: 100vw;
  }
  :global(body.showSidebar) main {
    position: relative;
    left: 12rem;
    width: calc(100vw - 12rem);
    transition: left 0.7s ease-in-out;
  }
</style>
