/**
 * title toggle matchMedia
 * The above code is adding a class to the body of the page depending on the width of the browser.
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