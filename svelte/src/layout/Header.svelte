<script>
  /**
   * title Header Layout
   *
   * Contains the `<Hamburger>`, `<Logo>` and the `<Menu>`
   *
   */
  import Logo from './Logo.svelte';
  import Hamburger from './Hamburger.svelte';
  import Menu from './Menu.svelte';
</script>

<header>
  <nav class="flex">
    <!-- <Hamburger /> -->
    <Logo />
  </nav>

  <Menu />
</header>

<style>
  header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    max-width: 100%;
    margin: 0;
    padding: 0;
    height: 3rem;
    position: fixed;
    z-index: 50;
    background-color: var(--bg-prim);
    border-bottom: 1px solid var(--border-prim);
    box-shadow: var(--shaddow-bottom);
  }
  nav {
    display: flex;
    margin: 0;
  }
</style>
