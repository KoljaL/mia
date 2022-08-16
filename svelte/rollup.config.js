// import svelte from 'rollup-plugin-svelte';
// import resolve from '@rollup/plugin-node-resolve';
// import css from 'rollup-plugin-css-only';
// export default {
//     // This `main.js` file we wrote
//     input: 'src/main.js',
//     output: {
//         // The destination for our bundled JavaScript
//         file: 'public/build/bundle.js',
//         // Our bundle will be an Immediately-Invoked Function Expression
//         format: 'iife',
//         // The IIFE return value will be assigned into a variable called `app`
//         name: 'app',
//     },
//     plugins: [
//         svelte({
//             // Tell the svelte plugin where our svelte files are located
//             include: 'src/**/*.svelte',
//             // Optionally, preprocess components with svelte.preprocess:
//             // https://svelte.dev/docs#svelte_preprocess
//             preprocess: {
//                 style: ({ content }) => {
//                     return transformStyles(content);
//                 }
//             },
//             // we'll extract any component CSS out into
//             // a separate file - better for performance
//             // css({ output: 'bundle.css' }),

//             // Emit CSS as "files" for other plugins to process. default is true
//             emitCss: false,

//             // Warnings are normally passed straight to Rollup. You can
//             // optionally handle them here, for example to squelch
//             // warnings with a particular code
//             onwarn: (warning, handler) => {
//                 // e.g. don't warn on <marquee> elements, cos they're cool
//                 if (warning.code === 'a11y-distracting-elements') return;

//                 // let Rollup handle all other warnings normally
//                 handler(warning);
//             },

//             // You can pass any of the Svelte compiler options
//             compilerOptions: {

//                 // By default, the client-side compiler is used. You
//                 // can also use the server-side rendering compiler
//                 // generate: 'ssr',

//                 // ensure that extra attributes are added to head
//                 // elements for hydration (used with generate: 'ssr')
//                 hydratable: true,

//                 // You can optionally set 'customElement' to 'true' to compile
//                 // your components to custom elements (aka web elements)
//                 customElement: false
//             }
//         }),
//         // Tell any third-party plugins that we're building for the browser
//         resolve({ browser: true }),
//     ],
// };