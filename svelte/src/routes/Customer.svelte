<script>
  import { onMount } from 'svelte';
  import axios from 'axios';
  import { fade, scale } from 'svelte/transition';
  import { writable } from 'svelte/store';
  import { User, Token } from './../util/auth.js';
  import { push } from 'svelte-spa-router';
  import Icon from 'svelte-icon';
  import close from './../../public/img/evaicons/close.svg?raw';
  import phone from './../../public/img/evaicons/phone.svg?raw';
  import CustomerSingle from './CustomerSingle.svelte';
  if ($User === false) {
    push('/');
  }

  // define vars for the functions
  const API = import.meta.env.VITE_API_PATH;
  let component;
  let props;
  let customerID;
  let showCustomerSingle = null;
  let customers = [];
  let error = null;
  let auth = {
    headers: { Authorization: `Bearer ` + $Token }
  };

  //
  // load on mount
  //
  onMount(async () => {
    getAllCustomer();
  });

  //
  // load all customer data
  //
  async function getAllCustomer() {
    try {
      const res = await axios.get(API + 'customer', auth);
      customers = res.data.data;
      // console.log(customers);
    } catch (e) {
      error = e;
    }
  }

  //
  // load singeCustomer overlay
  //
  async function loadCustomerSingle(customerID) {
    component = CustomerSingle;
    props = { customerID: customerID };
    showCustomerSingle = true;
  }

  //
  //close singleCustomer overlay
  //
  function closeOverlay() {
    console.log('tt');
    showCustomerSingle = null;
  }
</script>

<div class="customerWrapper">
  {#if error !== null}
    <p style="color: red">{error.message}</p>
  {:else}
    <h2>Customer</h2>
    <div transition:fade={{ delay: 0, duration: 0 }} class="cardWrapper ">
      {#each customers as customer}
        <section id={customer.id}>
          <aside>
            <div class="cardContent" on:click={loadCustomerSingle(customer.id)}>
              <img alt="HTML only" src={customer.avatar} height="100" />
              <div class="cardText">
                <h3 class="cardTitle" href="#/customer/{customer.id}">{customer.name}</h3>
                <p>{@html customer.address.replace('\n', '<br />')}</p>
              </div>
            </div>

            <div class="cardContacts">
              <a href="mailto:{customer.email}"
                ><em><span class="cardEmail">{customer.email}</span></em></a>
              <a href="call:{customer.email}"
                ><em class="cardPhone"><Icon data={phone} size="25px" /> </em></a>
            </div>
          </aside>
        </section>
      {/each}
    </div>
    {#if showCustomerSingle !== null}
      <div class="overlayBackground" transition:fade>
        <div class="overlayContent" transition:scale>
          <span class="closeOverlay" on:click={closeOverlay}>
            <Icon data={close} size="35px" />
          </span>
          <div class="customerSingle">
            <svelte:component this={component} {...props} />
          </div>
        </div>
      </div>
    {/if}
  {/if}
</div>

<style>
  .overlayBackground {
    position: fixed;
    z-index: 1000;
    top: 0;
    left: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 100vw;
    height: 100vh;
    background: rgba(0, 0, 0, 0.96);
  }
  .overlayContent {
    position: relative;
    width: 90vw;
    height: 90vh;
    background: var(--bg-seco);
    border: 1px solid var(--color-bg-secondary);
    border-radius: 1em;
    box-shadow: var(--box-shadow) var(--color-bg-secondary);
  }
  .closeOverlay {
    position: absolute;
    top: 1em;
    right: 1em;
    cursor: pointer;
    display: block;
    width: 40px;
    height: 40px;
    z-index: 200;
  }
  .closeOverlay:hover {
    filter: brightness(var(--hover-brightness));
  }

  .customerWrapper {
    position: relative;
  }
  h2 {
    text-align: center;
    position: sticky;
    top: -3.5rem;
    z-index: 100;
    margin-top: 0.5rem;
  }
  section aside {
    min-width: 300px;
    max-width: 450px;
    transition: width 0.5s;
  }
  section {
    /* flex: 1; */
    min-width: 0;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    justify-content: center;
    transition: transform 0.2s, flex 0.7s cubic-bezier(0.61, -0.19, 0.7, -0.11), background 0.2s;
  }
  :global(.fullWidth) {
    flex-basis: 100%;
    max-width: 90% !important;
    width: 90% !important;
    transition: width 0.5s;
  }
  .cardWrapper {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    position: relative;
  }
  .cardContent {
    position: relative;
    display: flex;
    cursor: pointer;
  }
  img {
    min-height: 100px;
    min-width: 100px;
  }
  .cardText {
    padding-left: 1rem;
    margin-top: -1rem;
  }
  .cardContacts {
    display: flex;
    justify-content: space-between;
    gap: 0.5rem;
  }
  .cardContacts a {
    min-width: 25px;
    /* max-width: max-content; */
  }

  .cardContacts em {
    max-width: calc(100% - 30px);
    overflow: hidden;
    padding-right: 0.75rem;
    white-space: nowrap;
    /* max-width: max-content; */
  }

  .cardEmail {
    padding-right: 0.5rem;

    /* display: inline-block; */
    /* overflow: hidden; */
  }
  .cardPhone {
    width: 26px;
    height: 24px;
  }
  :global(.cardWrapper a svg) {
    margin-bottom: -5px;
  }
</style>
