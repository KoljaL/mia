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

    export let params = {};
    let customerID;

    // define vars for the functions
    let data;
    let addData = null;
    let customers = [];
    let error = null;
    let auth = {
        headers: { Authorization: `Bearer ` + $Token },
    };
    onMount(async () => {
        //
        // get the customer ID from the link params
        // and add it as value after the endpoint
        //
        if (null === params.id) {
            console.log('ONMOUNT ALL');
            getAllCustomer();
        } else {
            console.log('ONMOUNT SINGLE');
            getSingleCustomer(params.id);

            // customerID = '/' + params.id;
        }
    });

    async function getAllCustomer() {
        console.log(' ALL');
        // let auth = {
        //     headers: { Authorization: `Bearer ` + $Token },
        // };
        try {
            // axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
            const res = await axios.get('http://localhost:8888/mia/mia/customer', auth);
            // console.log(res);
            data = res.data.data;
            customers = res.data.data;
            // console.log(customers);
        } catch (e) {
            error = e;
        }
    }

    async function getSingleCustomer(customerID) {
        console.log(' SINGLE');
        // let auth = {
        //     headers: { Authorization: `Bearer ` + $Token },
        // };
        try {
            // axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
            const res = await axios.get('http://localhost:8888/mia/mia/customer/' + customerID, auth);
            // console.log(res);
            data = res.data.data;
            customers = res.data.data;
        } catch (e) {
            error = e;
        }
    }

    async function getAdditionalData(customerID) {
        let section = document.getElementById(customerID);
        section.classList.add('fullWidth');
        section.children[0].classList.add('fullWidth');
        // console.log(section);

        // let auth = {
        //     headers: { Authorization: `Bearer ` + $Token },
        // };
        try {
            const res = await axios.get('http://localhost:8888/mia/mia/customer/' + customerID, auth);
            addData = res.data.data;
        } catch (e) {
            error = e;
        }
    }
    function close(customerID) {
        let section = document.getElementById(customerID);
        section.classList.remove('fullWidth');
        section.children[0].classList.remove('fullWidth');
        addData = null;
    }
</script>

{#if error !== null}
    <p style="color: red">{error.message}</p>
{:else}
    <!-- <pre>	{JSON.stringify(data, null, 2)}</pre> -->
    <h2>Customer</h2>
    <div transition:fade={{ delay: 0, duration: 0 }} class="cardWrapper ">
        {#each customers as customer}
            <section id={customer.id}>
                <aside>
                    <div class="cardContent">
                        <img alt="HTML only" src={customer.avatar} height="100" />
                        <div class="cardText">
                            <h3><a class="cardTitle" on:click={getAdditionalData(customer.id)} href="#/customer/{customer.id}">{customer.name}</a></h3>
                            <p>{@html customer.address.replace('\n', '<br />')}</p>
                        </div>
                    </div>
                    {#if addData !== null}
                        <div class="addData">
                            <button on:click={close(addData[0].id)}>X</button>
                            {addData[0].id}
                        </div>
                    {/if}
                    <div class="cardContacts">
                        <a href="mailto:{customer.email}"><em><span class="cardEmail">{customer.email}</span></em></a>
                        <a href="call:{customer.email}"><em class="cardPhone"><Icon data={phone} size="25px" /> </em></a>
                    </div>
                </aside>
            </section>
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
    section aside {
        min-width: 300px;
        max-width: 450px;
        transition: width 0.5s;
    }
    :global(.fullWidth) {
        max-width: 90% !important;
        width: 90% !important;
        transition: width 0.5s;
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
