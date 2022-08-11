// import Customer from './routes/Customer.svelte'
import NotFound from './routes/NotFound.svelte'
import Home from './routes/Home.svelte'


import { wrap } from 'svelte-spa-router/wrap'

// Export the route definition object
export default {
    '/': Home,


    // Wrapping the Author component
    '/customer/:id?': wrap({
        asyncComponent: () =>
            import ('./routes/Customer.svelte')
    }),


    // '/customer/:id?': Customer,

    '*': NotFound,
}