<script>
    // import { store } from './auth.js'
    import ToggleTheme from '../components/toggleTheme.svelte';
    import axios from 'axios';
    import { push, pop, replace } from 'svelte-spa-router';
    import { writable } from 'svelte/store';
    import { User } from './../util/auth.js';
    // let User = '';
    let password = 'admin';
    let email = 'mail@example.com';

    async function login() {
        axios
            .post('http://localhost:9090/mia/login', {
                email: email,
                password: password,
            })
            .then((resp) => {
                if (resp.data.status === 200) {
                    // console.dir(resp.data);

                    let payload = parseJwt(resp.data.data);
                    // console.log(payload);
                    push('/customer');
                    // User = writable(true);
                    $User = true;
                } else {
                    return false;
                }
            })
            .catch((err) => {
                console.error(err);
            });
    }

    function parseJwt(token) {
        var base64Url = token.split('.')[1];
        var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
        var jsonPayload = decodeURIComponent(
            window
                .atob(base64)
                .split('')
                .map(function (c) {
                    return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
                })
                .join('')
        );

        return JSON.parse(jsonPayload);
    }
</script>

<nav>
    <ToggleTheme />
</nav>
<div class="center">
    <form class="form" on:submit|preventDefault={login}>
        <span class="title"> Login </span>
        <div class="input-container">
            <input id="email" class="input" bind:value={email} type="text" placeholder=" " />
            <label for="email" class="label">Email</label>
        </div>
        <div class="input-container">
            <input id="password" class="input" bind:value={password} type="password" placeholder=" " />
            <label for="password" class="label">Password</label>
        </div>
        <button type="text" class="submit">submit</button>
    </form>
</div>

<style>
    nav {
        background-color: transparent;
        position: absolute;
        right: 0;
    }
    .center {
        align-items: center;
        background-color: var(--bg-prim);
        display: flex;
        justify-content: center;
        height: 100vh;
    }

    .form {
        background-color: var(--bg-tert);
        border-radius: 20px;
        box-sizing: border-box;
        padding: 20px;
        width: 320px;
    }
    .title {
        color: var(--text-prim);
        font-size: 1.4rem;
        display: flex;
        justify-content: space-around;
    }
    .input-container {
        height: 50px;
        position: relative;
        width: 100%;
        margin-top: 2rem;
    }

    .input {
        background-color: var(--bg-seco);
        border-radius: 12px;
        border: 1px solid var(--bg-prim);
        box-sizing: border-box;
        color: var(--text-prim);
        font-size: 18px;
        height: 100%;
        outline: 0;
        padding: 4px 20px 0;
        width: 100%;
        background-image: none;
    }

    .label {
        color: var(--text-prim);
        font-family: sans-serif;
        left: 20px;
        line-height: 14px;
        pointer-events: none;
        position: absolute;
        transform-origin: 0 50%;
        transition: transform 200ms, color 200ms;
        top: 20px;
    }

    .input:focus ~ .label,
    .input:not(:placeholder-shown) ~ .label {
        transform: translateY(-30px) translateX(10px) scale(0.75);
    }

    .input:not(:placeholder-shown) ~ .label {
        color: var(--text-prim);
        opacity: 0.7;
    }

    .input:focus ~ .label {
        color: var(--text-seco);
    }

    .input::placeholder {
        opacity: 0;
    }
    .input:focus::placeholder {
        opacity: 0.7;
    }

    .submit {
        background-color: var(--success);
        border-radius: 12px;
        border: 0;
        box-sizing: border-box;
        color: #eee;
        cursor: pointer;
        font-size: 18px;
        height: 50px;
        margin-top: 38px;
        outline: 0;
        text-align: center;
        width: 100%;
    }

    .submit:active {
        opacity: 0.5;
    }
</style>
