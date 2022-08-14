<script>
    // import { writable } from 'svelte/store';
    import { User } from './util/auth.js';
    import { toggleView } from './util/breakpoints.js';

    //
    // import layout files
    //
    import Header from './layout/Header.svelte';
    import Login from './layout/Login.svelte';
    import Sidebar from './layout/Sidebar.svelte';
    import Main from './layout/Content.svelte';

    /**
     * toggleView()
     *
     * load & add to resize toggleView to set the media-width
     * @return data-view in <body>
     *
     */
    window.addEventListener('resize', toggleView);
    toggleView();

    // console.log('User', JSON.stringify($User, null, 2));
</script>

{#if $User}
    <Sidebar />
    <Header />
    <Main />
{:else}
    <Login />
{/if}
