/**
 * departmentselect.js
 * All custom JS for department cards stored here.
 * @author Ainsley Clark
 * @author URL:   https://www.reddico.co.uk
 * @author email: ainsley@reddico.co.uk
 */

/**
 * Require * Import
 * 
 */
let Isotope = require('isotope-layout');

/**
 * Isotope & Options
 * 
 */
let iso;

window.onload = function() {

    iso = new Isotope( document.querySelector('.team-card-row'), {
    // Options
    itemSelector: '.team-card',
    layoutMode: 'masonry',
    masonry: {
      columnWidth: '.grid-sizer'
    },
    transitionDuration: 500
  });
}

/**
 * Change active cards and relayout
 * 
 */
let teamCards = document.querySelectorAll('.team-card');

teamCards.forEach(card => {
    card.addEventListener('click', e => {

        //Add active class to this
        card.classList.toggle('active');

        //Remove active class from siblings
        let sibling = card.parentNode.firstChild;

        while (sibling) {
            if (sibling.nodeType === 1 && sibling !== card) {
                sibling.classList.remove('active');
            }
            sibling = sibling.nextSibling
        }

        //Relayout Isotope
        iso.layout();

    });
});