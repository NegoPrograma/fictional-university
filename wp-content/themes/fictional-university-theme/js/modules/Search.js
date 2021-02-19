import $ from "jquery"
class Search {
    /**
     * Describe and create an event
     */
    constructor() {
        
        this.openButton = $('.js-search-trigger');
        this.closeButton = $('.search-overlay__close');
        this.searchOverlay = $('.search-overlay');
        this.resultsDiv = $('.search-overlay__results');
        this.searchInputField = $('#search-term');
        this.setEventListeners();
        this.isOverlayOpen = false;
        this.isSearchAnimationRunning = false;
        this.searchTimingValue;
        this.searchStringValue = '';
        
    }

    /**
     * events
     */

     setEventListeners(){
         this.openButton.on('click',this.openOverlay.bind(this));
         this.closeButton.on('click',this.closeOverlay.bind(this));
         $(document).on('keydown',this.keyPressDispatch.bind(this));
         $('#search-term').on('keyup',this.searchTimer.bind(this));
     }

    
    /**
     * 
     * methods
     */

    searchTimer(){
        if(this.searchInputField.val() != this.searchStringValue){
        clearTimeout(this.searchTimingValue);
        if(!this.isSearchAnimationRunning){
            this.resultsDiv.html("<div class='spinner-loader'></div>");
            this.isSearchAnimationRunning = true;
        }
        this.searchTimingValue = setTimeout(this.getResults.bind(this),1000);
    }
        this.searchStringValue = this.searchInputField.val();

    }
    getResults(){
        this.isSearchAnimationRunning = false;
        if(this.searchStringValue != '')
            this.resultsDiv.html('cabo');
        else{
            this.resultsDiv.html('');
        }
    }

    keyPressDispatch(e){
        const S_KEY_CODE = 83;
        const ESC_KEY_CODE = 27;
        if(e.keyCode == S_KEY_CODE && !this.isOverlayOpen && !$('input, textarea').is(':focus')){
            this.openOverlay();
            this.isOverlayOpen = true;
        }
        else if(e.keyCode == ESC_KEY_CODE && this.isOverlayOpen){
            this.closeOverlay();
            this.isOverlayOpen = false;
        }
    }

    openOverlay() {
        this.searchOverlay.addClass('search-overlay--active');
        $('body').addClass('body-no-scroll');
    }

    closeOverlay() {
        this.searchOverlay.removeClass('search-overlay--active');
        $('body').removeClass('body-no-scroll');
    }



}

export default Search;