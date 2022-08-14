// import Customer from './routes/Customer.svelte'
import NotFound from './routes/NotFound.svelte'
// import Home from './routes/Home.svelte'


import { wrap } from 'svelte-spa-router/wrap'

// Export the route definition object
export default {
    // '/': Home,

    '/': wrap({
        asyncComponent: () =>
            import ('./routes/Home.svelte')
    }),

    // Wrapping the Author component
    '/customer': wrap({
        asyncComponent: () =>
            import ('./routes/Customer.svelte')
    }),

    // Wrapping the Author component
    '/customer/:id?': wrap({
        asyncComponent: () =>
            import ('./routes/CustomerSingle.svelte')
    }),

    // Wrapping the Author component
    '/profile/:id?': wrap({
        asyncComponent: () =>
            import ('./routes/Profile.svelte')
    }),


    // '/customer/:id?': Customer,

    '*': NotFound,
}