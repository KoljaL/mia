<script>
  import { onMount } from 'svelte';
  import axios from 'axios';
  import { fade } from 'svelte/transition';
  import { writable } from 'svelte/store';
  import { User, Token } from './../util/auth.js';
  import { showJSON } from './../util/showJSON.js';
  import { push } from 'svelte-spa-router';
  import Icon from 'svelte-icon';
  import home from './../../public/img/zondicons/home.svg?raw';
  import phone from './../../public/img/evaicons/phone.svg?raw';

  if ($User === false) {
    push('/');
  }
  // console.log($Token);

  //
  // get the customer ID from the link params
  // and add it as value after the endpoint
  //
  export let params = {};
  let staff_id;
  if (null === params.id) {
    staff_id = '';
  } else {
    staff_id = '/' + params.id;
  }

  // define vars for the functions
  const API = import.meta.env.VITE_API_PATH;
  let data;
  let customers = [];
  let error = null;

  onMount(async () => {
    getProfileData(staff_id);
  });

  async function getProfileData(staff_id) {
    let auth = {
      headers: { Authorization: `Bearer ` + $Token }
    };
    try {
      // axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
      const res = await axios.get(API + 'profile' + staff_id, auth);
      // console.log(res);
      data = res.data.data;
      customers = res.data.data;
    } catch (e) {
      error = e;
    }
  }
</script>

{#if error !== null}
  <p style="color: red">{error.message}</p>
{:else}
  <div transition:fade={{ delay: 0, duration: 0 }} class="cardWrapper ">
    <h2>Profile</h2>
    {@html showJSON(data)}
  </div>
{/if}

<style>
  h2 {
    text-align: center;
    position: sticky;
    top: -4rem;
    margin-top: 0.5rem;
    z-index: 100;
  }
</style>
