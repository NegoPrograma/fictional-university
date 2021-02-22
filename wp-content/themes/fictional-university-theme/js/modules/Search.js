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
        this.wp_api_url = "/wp-json/university/v1/search";
        
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
        this.searchStringValue = this.searchInputField.val();
        this.searchTimingValue = setTimeout(this.getResults.bind(this),2000);
    }
        

    }
    getResults(){
        this.isSearchAnimationRunning = false;
        let queryString = '?search=' + this.searchStringValue;
        
        if(this.searchStringValue != ''){
            $.getJSON( helper.root_url + this.wp_api_url  + queryString,(data) => {
                this.displayResults(Object.values(data));
            }).catch((error)=>{
                this.resultsDiv.html('something went wrong with your request, please try again.');
            });
            
            
        }
        else{
            this.resultsDiv.html('');
        }
    }

    displayResults(data){
        
        let numberOfPosts = 0;
        data.forEach((item)=> { numberOfPosts += item.length})
        if(numberOfPosts < 1){
            this.resultsDiv.html("Sorry, no posts where found to match your query.");
        }else{
           console.log(data);
            this.resultsDiv.html(
                `<h2 class='search-overlay__section-title'>Results Found:</h2>
                <ul class='link-list min-list'>
                ${data.map(post => {
                   return  post.map((item)=>{
                    return `<li>
                        <a href="${item.link}">${item.name}</a>
                        </li>`;
                }).join('')
                }).join('')
                    
              
                }
                </ul>
            `)
     }
     console.log(this.wp_api_url);
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
        this.searchInputField.val('');
        setTimeout(()=> {this.searchInputField.focus()},500)
        $('body').addClass('body-no-scroll');
    }

    closeOverlay() {
        this.searchOverlay.removeClass('search-overlay--active');
        $('body').removeClass('body-no-scroll');
    }



}

export default Search;