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

    /* :global(body) {
        background-color: #c4c4c4;
        color: #0084f6;
        transition: background-color 0.3s;
    }
    :global(body.dark-mode) {
        background-color: #1d3040;
        color: #bfc2c7;
    } */
</style>
