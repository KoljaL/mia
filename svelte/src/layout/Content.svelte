<script>
    import Router from 'svelte-spa-router';
    import routes from './../routes';
    console.log(Router);
</script>

<main class="p-4 pt-16 text-gray-300">
    <Router {routes} />
</main>

<style>
</style>
