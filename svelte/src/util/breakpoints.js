/**
 * Set breakpoints by using matchMedia()
 * 
 * Depending of the page-width a `data-view` attribute is set to `<body>`
 * 
 * max 36em -> `small`
 * max 60em -> `medium`
 * max 120em -> `large`
 * 
 * usage in CSS: `:global([data-view='small'] .classname) {}`
 * 
 */
export const toggleView = function() {
    const breakpoints = [{
            width: '36em',
            class: 'small',
        },
        {
            width: '60em',
            class: 'medium',
        },
        {
            width: '120em',
            class: 'large',
        },
    ];

    breakpoints.every((view) => {
        if (window.matchMedia(`(max-width: ${view.width})`).matches) {
            document.body.setAttribute('data-view', view.class);
            return false;
        }
        return true;
    });
}