
//////////////////////////////////////////////////////////
// Main JS for the website
//////////////////////////////////////////////////////////

// This file can be used to contain or reference your site/app JavaScript code.
// For larger projects, you can make use of a JavaScript module loader, like Require.js, to load any other scripts you need to run.


// Hamburger icon toggling
/////////////////////////////

$(function() {
    var menuButton = document.getElementById('menuButton');
    menuButton.addEventListener('click', function (e) {
        menuButton.classList.toggle('is-active');
        e.preventDefault();
    });
});

///////////////////////////////////////////////////////////////

