<script>
    export let open = false;
</script>

<aside class="fixed w-60 h-full mt-12 text-prim bg-seco border-r border-prim" class:open>
    <nav class="p-12 text-xl">
        <a
            on:click={() => {
                open = false;
            }}
            class="block"
            href="#/">Home</a
        >
        <a
            on:click={() => {
                open = false;
            }}
            class="block"
            href="#/customer">Customer</a
        >
    </nav>
</aside>

<style>
    aside {
        left: -15rem;
        transition: left 0.7s ease-in-out;
        z-index: 100;
    }

    :global(body.showSidebar) aside {
        left: 0;
        transition: left 0.7s ease-in-out;
        width: 15rem;
    }
</style>
