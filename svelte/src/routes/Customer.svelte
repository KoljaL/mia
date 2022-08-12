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
    // console.log($Token);

    //
    // get the customer ID from the link params
    // and add it as value after the endpoint
    //
    export let params = {};
    let customerID;
    if (null === params.id) {
        customerID = '';
    } else {
        customerID = '/' + params.id;
    }

    // define vars for the functions
    let data;
    let customers = [];
    let error = null;

    onMount(async () => {
        getCustomerData(customerID);
    });

    async function getCustomerData(customerID) {
        let auth = {
            headers: { Authorization: `Bearer ` + $Token },
        };
        try {
            // axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
            const res = await axios.get('http://localhost:8888/mia/mia/customer' + customerID, auth);
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
    <!-- <pre>	{JSON.stringify(data, null, 2)}</pre> -->
    <div transition:fade={{ delay: 50, duration: 200 }} class="cardWrapper ">
        {#each customers as customer}
            <section>
                <aside>
                    <div class="cardContent">
                        <img alt="HTML only" src={customer.avatar} height="100" />
                        <div class="cardText">
                            <h3><a class="cardTitle" on:click={getCustomerData(customer.id)} href="#/customer/{customer.id}">{customer.name}</a></h3>
                            <p>{@html customer.address.replace('\n', '<br />')}</p>
                        </div>
                    </div>
                    <div class="cardContacts">
                        <a href="mailto:{customer.email}"><em><span class="cardEmail">{customer.email}</span></em></a>
                        <a href="call:{customer.email}"><em><Icon data={phone} size="25px" /> </em></a>
                    </div>
                </aside>
            </section>
        {/each}
    </div>
{/if}

<style>
    section aside {
        min-width: 300px;
        max-width: 450px;
    }
    .cardWrapper {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }
    .cardContent {
        position: relative;
        display: flex;
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

    :global(.cardWrapper a svg) {
        margin-bottom: -5px;
    }
</style>
