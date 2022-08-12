<script>
    // import ToggleTheme for CSS loading
    import ToggleTheme from '../components/toggleTheme.svelte';
    import axios from 'axios';
    import { authUser } from './../util/auth.js';

    let password = 'admin';
    let email = 'mail@example.com';

    //
    // call API login and receive JWT
    //
    async function APIlogin() {
        axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';

        axios
            .post('http://localhost:8888/mia/mia/login', {
                email: email,
                password: password,
            })
            .then((resp) => {
                if (resp.data.status === 200) {
                    // read the token and login in user
                    authUser(resp.data.data);
                } else {
                    return false;
                }
            })
            .catch((err) => {
                console.error(err);
            });
    }
</script>

<nav>
    <ToggleTheme />
</nav>
<div class="center">
    <form class="form" on:submit|preventDefault={APIlogin}>
        <span class="title"> Login </span>

        <div class="input-container">
            <input id="email" class="input" bind:value={email} type="text" placeholder="write your Email" />
            <label for="email" class="label">Email</label>
        </div>

        <div class="input-container">
            <input id="password" class="input" bind:value={password} type="password" placeholder="type your secret password" />
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
