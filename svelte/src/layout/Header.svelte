<script>
    import Logo from './Logo.svelte';
    import Hamburger from './Hamburger.svelte';
    import Menu from './Menu.svelte';
    export let sidebar = true;
</script>

<header class="fixed z-50 flex justify-between h-14 bg-gray-200 p-2 items-center text-gray-600 border-b-2">
    <nav class="flex">
        <Hamburger bind:open={sidebar} />
        <Logo />
    </nav>

    <Menu />
</header>
