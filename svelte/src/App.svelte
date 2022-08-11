<script>
    import Navbar from './layout/Header.svelte';
    import Sidebar from './layout/Sidebar.svelte';
    import Main from './layout/Content.svelte';

    let open = false;
</script>

<Sidebar bind:open />

<Navbar bind:sidebar={open} />

<Main />
