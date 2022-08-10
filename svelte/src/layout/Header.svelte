<script>
    import Logo from './Logo.svelte';
    import Hamburger from './Hamburger.svelte';
    import Menu from './Menu.svelte';
</script>

<header class="fixed z-50 w-full flex justify-between h-12 bg-prim text-prim p-2 items-center border-b border-prim">
    <nav class="flex">
        <Hamburger />
        <Logo />
    </nav>

    <Menu />
</header>
