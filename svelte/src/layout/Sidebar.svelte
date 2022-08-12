<script>
    import active from 'svelte-spa-router/active';
    import { link } from 'svelte-spa-router';
    function closeSidebar() {
        //TODO close sidebar only on small screens
        // window.document.body.classList.toggle('showSidebar');
    }
</script>

<aside>
    <nav>
        <a on:click={closeSidebar} use:link use:active href="/">Home</a>
        <a on:click={closeSidebar} use:link use:active href="/customer">Customer</a>
    </nav>
</aside>

<style>
    aside {
        left: -15rem;
        background-color: var(--bg-seco);
        border-right: 1px solid var(--border-prim);
        height: 100%;
        margin-top: 3rem;
        position: fixed;

        transition: left 0.7s ease-in-out;
        z-index: 100;
    }
    nav {
        font-size: 1.25rem;
        line-height: 1.75rem;
        padding: 3rem;
    }
    a {
        display: block;
        text-decoration: none;
        font-size: 1.25rem;
        line-height: 1.75rem;
        color: var(--text-prim);
    }

    :global(a.active) {
        color: red;
    }

    :global(body.showSidebar) aside {
        left: 0;
        transition: left 0.7s ease-in-out;
        width: 15rem;
    }
</style>
