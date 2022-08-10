<script>
    import Navbar from './layout/Header.svelte';
    import Sidebar from './layout/Sidebar.svelte';
    import Main from './layout/Content.svelte';

    let open = false;
</script>

<Sidebar bind:open />

<Navbar bind:sidebar={open} />

<Main />

<style>
    :global(body) {
        /* color: var(--text-prim);
        background: var(--bg-prim);
        transition: background-color 0.3s;
        transition: color 0.3s; */
        padding: 0;
    }

    /* Hide scrollbar for Chrome, Safari and Opera, IE, Edge and Firefox */
    :global(*)::-webkit-scrollbar {
        display: none;
    }
    :global(*) {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
