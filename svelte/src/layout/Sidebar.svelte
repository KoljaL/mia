<script>
    export let open = false;
</script>

<aside class="fixed w-60 h-full mt-12 bg-gray-200 border-r-2 shadow-lg" class:open>
    <nav class="p-12 text-xl">
        <a class="block" href="#/">Home</a>
        <a class="block" href="#/customer">Customer</a>
    </nav>
</aside>

<style>
    aside {
        left: -100%;
        transition: left 0.3s ease-in-out;
        z-index: 100;
    }

    .open {
        left: 0;
        width: 15rem;
    }
</style>
