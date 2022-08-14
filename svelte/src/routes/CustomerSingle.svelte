<script>
    import { onMount } from 'svelte';
    import axios from 'axios';
    import { fade } from 'svelte/transition';
    import { writable } from 'svelte/store';
    import { User, Token } from './../util/auth.js';
    import { push } from 'svelte-spa-router';
    import Icon from 'svelte-icon';
    import home from './../../public/img/zondicons/home.svg?raw';
    import phone from './../../public/img/evaicons/phone.svg?raw';
    if ($User === false) {
        push('/');
    }

    export let params = {};
    export let customerID;
    // let customerID;

    // define vars for the functions
    let addData = null;
    let customers = [];
    let error = null;
    let auth = {
        headers: { Authorization: `Bearer ` + $Token },
    };
    onMount(async () => {
        // params.id from route, customerID from component call for overlay in Customer.svelte
        customerID = params.id || customerID;
        getSingleCustomer(customerID);
    });

    async function getSingleCustomer(customerID) {
        try {
            const res = await axios.get('http://localhost:8888/mia/mia/customer/' + customerID, auth);
            customers = res.data.data;
        } catch (e) {
            error = e;
        }
    }
</script>

{#if error !== null}
    <p style="color: red">{error.message}</p>
{:else}
    <h2>Customer</h2>
    <div transition:fade={{ delay: 0, duration: 0 }} class="cardWrapper ">
        {#each customers as customer}
            <div class="cardContent">
                <img alt="HTML only" src={customer.avatar} height="200" />
                <div class="cardText">
                    <h3><a class="cardTitle" href="#/customer/{customer.id}">{customer.name}</a></h3>
                    <p>{@html customer.address.replace('\n', '<br />')}</p>
                    <p>{customer.registrationdate}</p>
                </div>
            </div>

            <div class="cardContacts">
                <a href="mailto:{customer.email}"><em><span class="cardEmail">{customer.email}</span></em></a>
                <a href="call:{customer.email}"><em class="cardPhone"><Icon data={phone} size="25px" /> </em></a>
            </div>
        {/each}
    </div>
{/if}

<style>
    h2 {
        text-align: center;
        position: sticky;
        top: -3.5rem;
        z-index: 100;
        margin-top: 0.5rem;
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
    }
    img {
        float: right;
        min-height: 200px;
        min-width: 200px;
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
