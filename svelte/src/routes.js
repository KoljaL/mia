import Customer from './routes/Customer.svelte'
import NotFound from './routes/NotFound.svelte'
import Home from './routes/Home.svelte'

// Export the route definition object
export default {
    '/': Home,

    '/customer': Customer,

    '*': NotFound,
}