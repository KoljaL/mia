<script>
    import ToggleTheme from '../components/toggleTheme.svelte';
    import { User } from './../util/auth.js';
</script>

<nav>
    <button on:click={User.logout}>Logout</button>
    <ToggleTheme />
</nav>

<style>
    nav {
        display: flex;
        margin: 0;
    }
</style>
