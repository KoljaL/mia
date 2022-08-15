/**
 * title Routing file
 * 
 * loads dynamically the routes
 */

import { wrap } from 'svelte-spa-router/wrap'
import NotFound from './routes/NotFound.svelte'

// Export the route definition object
export default {
    '/': wrap({
        asyncComponent: () =>
            import ('./routes/Home.svelte')
    }),

    // all customer
    '/customer': wrap({
        asyncComponent: () =>
            import ('./routes/Customer.svelte')
    }),

    // single customer
    '/customer/:id?': wrap({
        asyncComponent: () =>
            import ('./routes/CustomerSingle.svelte')
    }),

    // staff / own profile 
    '/profile/:id?': wrap({
        asyncComponent: () =>
            import ('./routes/Profile.svelte')
    }),


    // default route
    '*': NotFound,
}