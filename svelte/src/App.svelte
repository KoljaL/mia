<script>
    import { writable } from 'svelte/store';

    import { User } from './util/auth.js';

    //
    // import layout files
    //
    import Header from './layout/Header.svelte';
    import Login from './layout/Login.svelte';
    import Sidebar from './layout/Sidebar.svelte';
    import Main from './layout/Content.svelte';

    console.log('User', JSON.stringify($User, null, 2));
</script>

{#if $User}
    <Sidebar />
    <Header />
    <Main />
{:else}
    <Login />
{/if}
