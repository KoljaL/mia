<script>
  /**
   * title Sidebar Layout
   *
   * switches between sidebar and footer navigation,
   * depending on the `matchMedia` in `util/breakpoints.js`
   *
   */
  import active from 'svelte-spa-router/active';
  import { link } from 'svelte-spa-router';

  import Icon from 'svelte-icon';
  import home from './../../public/img/zondicons/home.svg?raw';
  import people from './../../public/img/evaicons/people.svg?raw';

  function closeSidebar() {
    //TODO close sidebar only on small screens
    // window.document.body.classList.toggle('showSidebar');
  }
</script>

<aside class="sidebar">
  <nav>
    <a on:click={closeSidebar} use:link use:active href="/profile">
      <Icon data={home} />
      Profile
    </a>
    <a on:click={closeSidebar} use:link use:active href="/customer">
      <Icon data={people} size="23px" style="margin-bottom:-2px;" />
      Customer
    </a>
  </nav>
</aside>

<footer>
  <a on:click={closeSidebar} use:link use:active href="/profile">
    <Icon data={home} />
    Profile
  </a>
  <a on:click={closeSidebar} use:link use:active href="/customer">
    <Icon data={people} size="23px" style="margin-bottom:-2px;" />
    Customer
  </a>
</footer>

<style>
  footer {
    display: none;
    position: fixed;
    bottom: 0;
    width: 100vw;
    margin: 0 auto;
    max-width: 100vw;
    padding: 0;
    justify-content: space-around;
    z-index: 100;
    background: var(--bg-prim);
  }
  :global(footer a.active) {
    background-color: var(--bg-prim);
    color: var(--color);
  }

  :global([data-view='small']) footer {
    display: flex;
  }
  :global([data-view='small']) .sidebar {
    display: none;
  }
  :global([data-view='small'] main) {
    left: 0 !important;
    width: 100vw !important;
  }
  aside {
    left: -12rem;
    background-color: var(--bg-seco);
    border-right: 1px solid var(--border-prim);
    height: 100%;
    margin-top: calc(3rem + 1px);
    position: fixed;
    transition: left 0.7s ease-in-out;
    z-index: 100;
  }
  nav {
    display: block;
    font-size: 1.25rem;
    line-height: 1.75rem;
    padding-top: 3rem;
  }
  a {
    display: block;
    max-width: 100%;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    padding-left: 0.5rem;
    text-decoration: none;
    font-size: 1.25rem;
    line-height: 1.75rem;
    color: var(--text-prim);
  }
  :global(.sidebar a svg) {
    padding-right: 0.5rem;
  }

  :global(a.active) {
    background-color: var(--bg-tert);
  }

  :global(body.showSidebar) aside {
    left: 0;
    transition: left 0.7s ease-in-out;
    width: 12rem;
  }
</style>
