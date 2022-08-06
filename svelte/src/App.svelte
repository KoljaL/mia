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
        padding: 0;
    }
    /* Hide scrollbar for Chrome, Safari and Opera */
    :global(*)::-webkit-scrollbar {
        display: none;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    :global(*) {
        -ms-overflow-style: none; /* IE and Edge */
        scrollbar-width: none; /* Firefox */
    }
</style>
