window.addEventListener('load', slideShow, false);

function slideShow() {
  /* GLOBALS **********************************************************************************************/
    var globals = {
        slideDelay: 4000,//interval between slides
        fadeDelay: 35,//interval between opacity change
        wrapperID: "slideShowImages",//ID of <div>/<img>
        buttonID: "slideShowButton",
        wrapperObject: null, //reference to <div>/<img>
        buttonObject: null,
        slideImages: [], //all slide image objects.
        slideShowID: null, // A setInterval() ID value used to stop the slide show.
        slideShowRunning: true, //records when show running vs not Used   
        slideIndex: 0
    }
  /* MAIN *************************************************************************************************/
    initializeGlobals();

    if (insufficientSlideShowMarkup())
        return;

    if (globals.slideImages.length === 1)
        return;

    initializeSlideShowMarkup();

    globals.wrapperObject.addEventListener('click', toggleSlideShow, false);

    startSlideShow();
  /* FUNCTIONS ********************************************************************************************/
  
    function initializeGlobals() {
        globals.wrapperObject = (document.getElementById(globals.wrapperID) ? document.getElementById(globals.wrapperID) : null);

        if (globals.wrapperObject)
            globals.slideImages = (globals.wrapperObject.querySelectorAll('img') ? globals.wrapperObject.querySelectorAll('img') : []);
    }
  // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    function insufficientSlideShowMarkup() {

        if (!globals.slideImages.length)
        {
            if (globals.wrapperObject) 
                globals.wrapperObject.style.display = "none";

            return true;
        }

        return false;
    }
  // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    function initializeSlideShowMarkup() {
        var slideWidthMax = maxSlideWidth();
        var slideHeightMax = maxSlideHeight();

        globals.wrapperObject.style.position = "relative";
        globals.wrapperObject.style.overflow = "hidden";
        globals.wrapperObject.style.width = slideWidthMax + "px";
        globals.wrapperObject.style.height = slideHeightMax + "px";

        var slideCount = globals.slideImages.length;
        for (var i = 0; i < slideCount; i++)
        {
            globals.slideImages[i].style.opacity = 0;
            globals.slideImages[i].style.position = "absolute";
            globals.slideImages[i].style.top = (slideHeightMax - globals.slideImages[i].getBoundingClientRect().height) / 2 + "px";
            globals.slideImages[i].style.left = (slideWidthMax - globals.slideImages[i].getBoundingClientRect().width) / 2 + "px";
        }

        globals.slideImages[0].style.opacity = 1;
    }
  // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    function maxSlideWidth() {
        var maxWidth = 0;
        var maxSlideIndex = 0;
        var slideCount = globals.slideImages.length;

        for (var i = 0; i < slideCount; i++) {
            if (globals.slideImages[i].width > maxWidth) {
                maxWidth = globals.slideImages[i].width;
                maxSlideIndex = i;
            }
        }

        return globals.slideImages[maxSlideIndex].getBoundingClientRect().width;
    }
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    function maxSlideHeight() {
        var maxHeight = 0;
        var maxSlideIndex = 0;
        var slideCount = globals.slideImages.length;

        for (var i = 0; i < slideCount; i++) {
            if (globals.slideImages[i].height > maxHeight) {
                maxHeight = globals.slideImages[i].height;
                maxSlideIndex = i;
            }
        }

        return globals.slideImages[maxSlideIndex].getBoundingClientRect().height;
    }
  // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    function startSlideShow() {
        globals.slideShowID = setInterval(transitionSlides, globals.slideDelay);
    }
  // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    function haltSlideShow() {
        clearInterval(globals.slideShowID);
    }
  // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    function toggleSlideShow() {
        if (globals.slideShowRunning)
        {
            haltSlideShow();
        }
        else
        {
            startSlideShow();
        }
        globals.slideShowRunning = !(globals.slideShowRunning);

        globals.wrapperObject.addEventListener('click', toggleSlideShow, false);
    }
  // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    function transitionSlides() {
        var currentSlide = globals.slideImages[globals.slideIndex];

        ++(globals.slideIndex);
        if (globals.slideIndex >= globals.slideImages.length)
            globals.slideIndex = 0;//move to next slide

        var nextSlide = globals.slideImages[globals.slideIndex];

        var currentSlideOpacity = 1;
        var nextSlideOpacity = 0;
        var opacityLevelIncrement = 1 / globals.fadeDelay;
        var fadeActiveSlidesID = setInterval(fadeActiveSlides, globals.fadeDelay);

        function fadeActiveSlides() {
            currentSlideOpacity -= opacityLevelIncrement;
            nextSlideOpacity += opacityLevelIncrement;  

            if (currentSlideOpacity >= 0 && nextSlideOpacity <= 1)
            {
                currentSlide.style.opacity = currentSlideOpacity;
                nextSlide.style.opacity = nextSlideOpacity;
            }
            else
            {
                currentSlide.style.opacity = 0;
                nextSlide.style.opacity = 1;
                clearInterval(fadeActiveSlidesID);
            }
        }
    }
} // slideShow
