<script>
    function toggle() {
        window.document.body.classList.toggle('dark-mode');
    }
</script>

<button on:click={toggle}>
    <svg height="20" width="20">
        <circle cx="10" cy="10" r="10" />
    </svg>
</button>

<style>
    button {
        background-color: #f76027;
        color: white;
        border: none;
        border-radius: 4px;
        padding: 0.5rem;
    }

    svg {
        fill: black;
    }
    body.darkMode svg {
        fill: white;
    }

    :global(body.dark-mode) button {
        background-color: #0084f6;
        color: white;
    }
</style>
