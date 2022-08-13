<script>
    import ToggleTheme from '../components/toggleTheme.svelte';
    import { User } from './../util/auth.js';

    import Icon from 'svelte-icon';
    import logout from './../../public/img/evaicons/log-out.svg?raw';
</script>

<nav>
    <ToggleTheme />
    <div class="icon" on:click={User.logout}><Icon data={logout} size="25px" /></div>
</nav>

<style>
    nav {
        display: flex;
        gap: 1rem;
        padding-right: 1rem;
        margin: 0;
    }
</style>
