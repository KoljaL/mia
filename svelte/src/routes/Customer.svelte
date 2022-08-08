<script>
    import { onMount } from 'svelte';
    import axios from 'axios';
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
    <div class="flex flex-wrap gap-4">
        {#each customers as customer}
            <div class="card w-80 bg-base-84 shadow-xl">
                <figure class="px-10 pt-10">
                    <img src={customer.avatar} alt="Shoes" class="rounded-xl" />
                </figure>
                <div class="card-body items-center text-center bg-primary">
                    <h2 class="card-title" on:click={getCustomerData(customer.id)}><a class="block" href="#/customer/{customer.id}">{customer.name}</a></h2>
                    <p>{@html customer.address.replace('\n', '<br />')}</p>
                    <div class="card-actions">
                        <button class="btn btn-primary">{customer.email}</button>
                    </div>
                </div>
            </div>
        {/each}
    </div>
{/if}
