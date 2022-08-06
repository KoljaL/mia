<script>
    import { onMount } from 'svelte';
    import axios from 'axios';

    let data;
    let customer = [];
    let error = null;
    let promise = Promise.resolve([]);

    async function fetchUsers() {
        const response = await axios.get('http://localhost:9090/mia/customer');

        if (response.data) {
            console.log(response);
            return response.data;
        } else {
            throw new Error(data);
        }
    }

    function handleClick() {
        // Now set it to the real fetch promise
        promise = fetchUsers();
        console.log(promise);
    }

    onMount(async () => {
        try {
            const res = await axios.get('http://localhost:9090/mia/customer');
            console.log(res);
            data = res.data;
            customer = res.data.data;
        } catch (e) {
            error = e;
        }
    });
</script>

<button on:click={handleClick}> Load Users </button>

{#await promise}
    <p>...waiting</p>
{:then data}
    {JSON.stringify(data, null, 2)}
{:catch error}
    <p style="color: red">{error.message}</p>
{/await}

{#if error !== null}
    {error}
{:else}
    <pre>
	{JSON.stringify(data, null, 2)}
</pre>
    <ul>
        {#each customer as cus}
            <li>
                {cus.name}
            </li>
        {/each}
    </ul>
{/if}
