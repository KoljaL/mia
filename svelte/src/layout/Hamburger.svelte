<script>
  /**
   * title Hamburger Button
   *
   * animated SVG
   * toggles the `<body>` class `.showSidebar`
   */
  function toggleSidebar() {
    window.document.body.classList.toggle('showSidebar');
  }
</script>

<div class="hamburger" on:click={toggleSidebar}>
  <div class="hamburger-box">
    <div class="hamburger-inner" />
  </div>
</div>

<style>
  .hamburger {
    padding: 15px 15px;
    display: inline-block;
    cursor: pointer;
    transition-property: opacity, filter;
    transition-duration: 0.15s;
    transition-timing-function: linear;
    font: inherit;
    color: var(--text-prim);
    /* color: inherit; */
    text-transform: none;
    background-color: transparent;
    border: 0;
    margin: 0;
    overflow: visible;
  }
  .hamburger:hover {
    opacity: 0.7;
  }
  /* 
    :global(body.showSidebar) .hamburger-inner,
    :global(body.showSidebar) .hamburger-inner::before,
    :global(body.showSidebar) .hamburger-inner::after {
        background-color: #000;
    } */

  .hamburger-box {
    width: 40px;
    height: 24px;
    display: inline-block;
    position: relative;
  }

  .hamburger-inner {
    display: block;
    top: 50%;
    margin-top: -2px;
  }
  .hamburger-inner,
  .hamburger-inner::before,
  .hamburger-inner::after {
    width: 40px;
    height: 4px;
    background-color: var(--text-prim);
    border-radius: 4px;
    position: absolute;
    transition-property: transform;
    transition-duration: 0.15s;
    transition-timing-function: ease;
  }
  .hamburger-inner::before,
  .hamburger-inner::after {
    content: '';
    display: block;
  }
  .hamburger-inner::before {
    top: -10px;
  }
  .hamburger-inner::after {
    bottom: -10px;
  }

  .hamburger-inner {
    transition-duration: 0.075s;
    transition-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }
  .hamburger-inner::before {
    transition: top 0.075s 0.12s ease, opacity 0.075s ease;
  }
  .hamburger-inner::after {
    transition: bottom 0.075s 0.12s ease, transform 0.075s cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }

  :global(body.showSidebar) .hamburger-inner {
    transform: rotate(45deg);
    transition-delay: 0.12s;
    transition-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }
  :global(body.showSidebar) .hamburger-inner::before {
    top: 0;
    opacity: 0;
    transition: top 0.075s ease, opacity 0.075s 0.12s ease;
  }
  :global(body.showSidebar) .hamburger-inner::after {
    bottom: 0;
    transform: rotate(-90deg);
    transition: bottom 0.075s ease, transform 0.075s 0.12s cubic-bezier(0.215, 0.61, 0.355, 1);
  }
</style>
