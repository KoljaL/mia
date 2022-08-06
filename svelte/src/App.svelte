<script>
    import Router from 'svelte-spa-router';
    import routes from './routes';
</script>

<ul>
    <li><a href="#/">Home</a></li>
    <li><a href="#/customer">Say hi!</a></li>
</ul>

<Router {routes} />
