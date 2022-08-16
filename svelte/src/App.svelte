<script>
  // window.process = {
  //   ...window.process
  // };
  /**
   * title The first Svelte file
   *
   * imports the `util/breakpoints.js` and handles `toggleView`
   * switch for `$User` to App or to `<Login>` page
   * imports all `layout/` files
   *
   */
  // import { writable } from 'svelte/store';
  import { User } from './util/auth.js';
  import { toggleView } from './util/breakpoints.js';

  //
  // import layout files
  //
  import Header from './layout/Header.svelte';
  import Sidebar from './layout/Sidebar.svelte';
  import Main from './layout/Content.svelte';
  import Login from './layout/Login.svelte';

  // const isProd = env.isProd;
  // const apiUrl = __myapp.env.API_URL;
  // console.log(isProd);
  // console.log(process);
  // console.log(window);

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
  // console.log(process.env.MY_ENV_VAR)
</script>

{#if $User}
  <Sidebar />
  <Header />
  <Main />
{:else}
  <Login />
{/if}
