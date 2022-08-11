<script>
    import { onMount } from 'svelte';
    import axios from 'axios';
    import { fade } from 'svelte/transition';

    export let params = {};
    let customerID;
    if (null === params.id) {
        customerID = '';
    } else {
        customerID = '/' + params.id;
    }
    let data;
    let customers = [];
    let error = null;

    onMount(async () => {
        getCustomerData(customerID);
    });

    async function getCustomerData(id = '') {
        try {
            const res = await axios.get('http://localhost:9090/mia/customer' + customerID);
            console.log(res);
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
    <div transition:fade={{ delay: 50, duration: 200 }} class="cardHolder ">
        {#each customers as customer}
            <div class="cardx">
                <figure>
                    <img src={customer.avatar} alt="Shoes" />
                </figure>
                <div class="cardBody">
                    <a class="cardTitle" on:click={getCustomerData(customer.id)} href="#/customer/{customer.id}">{customer.name}</a>
                    <p>{@html customer.address.replace('\n', '<br />')}</p>
                </div>
                <div class="cardFooter">
                    <button class="btnx">{customer.email}</button>
                    <button class="btnx">01234 - 2345</button>
                </div>
            </div>
        {/each}
    </div>
{/if}

<style>
    .cardHolder {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }
    .cardx {
        position: relative;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        border-radius: 1rem;
        background-color: var(--bg-seco);
        border: 1px solid var(--border-prim);
        width: 20rem;
        margin-bottom: 2rem;
    }
    .cardx figure {
        padding: 2.5rem;
        padding-bottom: 0;
    }
    .cardx img {
        border-radius: 0.75rem;
        width: 50px;
        height: auto;
    }
    .cardx .cardBody {
        text-align: center;
        display: flex;
        flex: 1 1 auto;
        flex-direction: column;
        padding: 2rem;
        gap: 0.5rem;
        align-items: center;
    }
    .cardx .cardTitle {
        font-size: 1.5em;
    }

    .cardFooter {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        justify-content: space-around;
        padding-bottom: 1rem;
    }
    .btnx {
        color: white;
        background-color: var(--success);
        border-radius: 5px;
        font-size: 17px;
        padding: 6px 18px;
        border: none;
        display: inline-block;
        padding: 8px 16px;
        vertical-align: middle;
        overflow: hidden;
        text-decoration: none;
        text-align: center;
        cursor: pointer;
        white-space: nowrap;
    }
</style>
