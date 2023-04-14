function windowLoaded(){
    
    
/*
HEADER SCROLL
*/

const scrollY = window.scrollY;
const header = document.querySelector('header');

if( document.querySelector('html').scrollTop == 0){
    header.classList.add('topscroll');
}

window.addEventListener('scroll', (evt) =>{

    if(document.querySelector('html').scrollTop > 0){
        //show desktop fog
        header.classList.remove('topscroll');
    }else{
        // Hides desktop fog
        header.classList.add('topscroll');
    }
})

/*
Desktop Main Navigation Sub-Menu System
*/

const allSubMenuButtons = document.querySelectorAll('.site-header .menu-main-nav-container .sub-menu li');

// Add listeners (hover) to each button
for(let menuBtnI = 0; menuBtnI < allSubMenuButtons.length; menuBtnI++){
    const btn = allSubMenuButtons[menuBtnI];

    btn.addEventListener('mouseover', (evt)=>{
        // Revert all btns
        resetSubMenus();

        const currentLI = evt.target.parentElement;

        if(currentLI.classList.contains('sub-menu') === false){
            iterateMenu(currentLI);
        }
        

    });
}

function resetSubMenus(){
    for(let i2 = 0; i2 < allSubMenuButtons.length; i2++){
        const resetBtn = allSubMenuButtons[i2];
        resetBtn.classList.remove('hover');
    }
}

function iterateMenu(node){

    const fromEl = node.parentElement.parentElement; // UL (SUB-MENU)

    if(fromEl.classList.contains('parent') === false ){
        fromEl.classList.add('hover');
        iterateMenu(fromEl);
    }
}


/*
CATEGORY SUBNAV
*/

if( document.querySelector('.category-subnav') ){

    const subnavLI = document.querySelectorAll('.category-subnav li.parent');

    for(let sni = 0; sni < subnavLI.length; sni++){
        const li = subnavLI[sni]
        console.log('category subnav detected', li);

        li.addEventListener('click', (evt) => {

            if(window.innerWidth < 900){

                if(evt.target.classList.contains('parent-arrow') ){
                    evt.preventDefault();

                    // Close any expanded LI's
                    for(let exi = 0; exi < subnavLI.length; exi++){
                        const liItem = subnavLI[exi];
                        if(liItem.classList.contains('expanded') ){
                            liItem.classList.remove('expanded');
                        }
                    }

                    // Close if already expanded
                    if( evt.target.parentNode.parentNode.classList.contains('expanded') ){
                        evt.target.parentNode.parentNode.classList.remove('expanded');
                    }else{
                        evt.target.parentNode.parentNode.classList.add('expanded');
                    }
                    
                }
            }
            
        });
    }

}


/*
SELECTABLE CONTENT
*/

class SelectableContent{
    constructor(id){
        this.instanceID = id;

        const btns = document.querySelectorAll(`#` + id + ` .items .img-link`);

        for(let i = 0; i < btns.length; i++){
            const btn = btns[i];

            btn.addEventListener('click', (evt) => {
                this.btnClick(evt);
            });
        }

        window.addEventListener('resize', (evt)=>{
            this.resize(evt);
        });

        setTimeout( ()=>{
            this.resize();
        }, 500 );
        
    }

    btnClick(evt){
        evt.preventDefault();

        this.hidePrevious();

        this.showNext(evt.currentTarget.dataset.code);
    }

    hidePrevious(){
        // Header
        const selectedHeader = document.querySelector(`#` + this.instanceID + ` .header-container .header-item.selected` );
        selectedHeader.classList.remove('selected');

        // Button
        const selectedBtn = document.querySelector(`#` + this.instanceID + ` .items .img-link.selected` );
        selectedBtn.classList.remove('selected');
    }

    showNext(id){
        // Header
        const selectedHeader = document.querySelector(`#` + this.instanceID + ` .header-container .header-item#` + id );
        selectedHeader.classList.add('selected');

        // Button
        const selectedBtn = document.querySelector(`#` + this.instanceID + ` .items .img-link#btn-` + id );
        selectedBtn.classList.add('selected');
    }

    resize(evt){
        // Set height of all .header-container to tallest child
        const headerContainer = document.querySelector( `#` + this.instanceID + ` .header-container` );

        const children = document.querySelectorAll( `#` + this.instanceID + ` .header-container .header-item` );

        let height = 0;

        for(let i = 0; i < children.length; i++){
            const child = children[i];

            if( child.offsetHeight > height ){
                height = child.offsetHeight;
            }
        }

        headerContainer.style.height = height + 'px';
    }
}

if( document.querySelector('.selectable-content') ){
    // Iterate through all SelectableContent instances and instantiate
    const allContent = document.querySelectorAll('.selectable-content');

    for(let si = 0; si < allContent.length; si++){
        const contentItem = allContent[si];
        const sContent = new SelectableContent(contentItem.id);
    }
}

/*
CAROUSEL CONTENT SELECTION
*/

class CarouselContentSelection{
    constructor(id){
        this.instanceID = id;

        this.carouselIndex = 0;
        
        this.carousel = new Glider(document.querySelector(`.carousel_content_selection#` + id + ` .cards`), {
            slidesToShow: 1,
            dots: '.dots',
            infinite:true,
            /*arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
            },*/
            responsive:[
                {
                    breakpoint:600,
                    settings:{
                        slidesToShow:2
                    }
                },{
                    breakpoint:1200,
                    settings:{
                        slidesToShow:3
                    }
                }
            ]
        });

        this.prev = document.querySelector(`.carousel_content_selection#` + id + ` .arrow-container .glider-prev`);

        this.prev.addEventListener('click', (evt)=>{
            this.prevClick(evt);
        });

        this.next = document.querySelector(`.carousel_content_selection#` + id + ` .arrow-container .glider-next`);

        this.next.addEventListener('click', (evt)=>{
            this.nextClick(evt);
        });

        window.addEventListener('resize', (evt)=>{
            this.resize(evt);
        });

        setTimeout( ()=>{
            this.resize();
        }, 500 );

        const allTextCards = document.querySelectorAll(`.carousel_content_selection#` + id + ` .carousel-container .card`);

        // Activate Cards Clicks
        for(let i = 0; i < allTextCards.length; i++){
            const card = allTextCards[i];

            card.addEventListener("click", (evt)=>{
                this.goto(evt.currentTarget.dataset.index);
            });
        }

        // Select Initial Display Item
        const firstItem = document.querySelectorAll(`.carousel_content_selection#` + id + ` .halfhalf-player .halfhalf-img`)[0];
        firstItem.classList.add('selected');

        const firstTextItem = document.querySelectorAll(`.carousel_content_selection#` + id + ` .carousel-container .card`)[0];
        firstTextItem.classList.add('selected');

        // Show Component (initially opacity:0 to avoid pre-styled mess)
        setTimeout( ()=>{
            document.querySelector(`.carousel_content_selection#` + id).style.opacity = 1;
        }, 1000);
        
    }

    goto(id){
        console.log('goto', id);
        const Items = document.querySelectorAll(`.carousel_content_selection#` + this.instanceID + ` .halfhalf-player .halfhalf-img`);
        const TextItems = document.querySelectorAll(`.carousel_content_selection#` + this.instanceID + ` .carousel-container .card`);


        this.carouselIndex = id;

        // Deselect Old Item
        const oldItem = document.querySelector(`.carousel_content_selection#` + this.instanceID + ` .halfhalf-player .halfhalf-img.selected`);
        const oldTextItem = document.querySelector(`.carousel_content_selection#` + this.instanceID + ` .carousel-container .card.selected`);

        oldItem.classList.remove('selected');
        oldTextItem.classList.remove('selected');

        // Select Display Item
        Items[this.carouselIndex].classList.add('selected');

        TextItems[this.carouselIndex].classList.add('selected');

        
        // Carousel page logic
        if(window.innerWidth >= 600){
            this.carousel.scrollItem(this.carouselIndex - 1);
        }else{
            this.carousel.scrollItem(this.carouselIndex);
        }
    }

    prevClick(evt){
        const Items = document.querySelectorAll(`.carousel_content_selection#` + this.instanceID + ` .halfhalf-player .halfhalf-img`);
        const TextItems = document.querySelectorAll(`.carousel_content_selection#` + this.instanceID + ` .carousel-container .card`);

        this.carouselIndex--;

        if(this.carouselIndex < 0){
            this.carouselIndex = 0;
        }

        // Deselect Old Item
        const oldItem = document.querySelector(`.carousel_content_selection#` + this.instanceID + ` .halfhalf-player .halfhalf-img.selected`);
        const oldTextItem = document.querySelector(`.carousel_content_selection#` + this.instanceID + ` .carousel-container .card.selected`);

        oldItem.classList.remove('selected');
        oldTextItem.classList.remove('selected');

        // Select Display Item
        Items[this.carouselIndex].classList.add('selected');

        TextItems[this.carouselIndex].classList.add('selected');

        
        // Carousel page logic
        if(window.innerWidth >= 600){
            if(this.carouselIndex < Items.length - 2){
                this.carousel.scrollItem(this.carouselIndex - 1);
            }
        }else{
            this.carousel.scrollItem(this.carouselIndex);
        }
    }

    nextClick(evt){
        const Items = document.querySelectorAll(`.carousel_content_selection#` + this.instanceID + ` .halfhalf-player .halfhalf-img`);
        const TextItems = document.querySelectorAll(`.carousel_content_selection#` + this.instanceID + ` .carousel-container .card`);

        this.carouselIndex++;

        if(this.carouselIndex >= Items.length - 1){
            this.carouselIndex = Items.length - 1;
        }

        // Deselect Old Item
        const oldItem = document.querySelector(`.carousel_content_selection#` + this.instanceID + ` .halfhalf-player .halfhalf-img.selected`);
        const oldTextItem = document.querySelector(`.carousel_content_selection#` + this.instanceID + ` .carousel-container .card.selected`);

        oldItem.classList.remove('selected');
        oldTextItem.classList.remove('selected');

        // Select Display Item
        Items[this.carouselIndex].classList.add('selected');

        TextItems[this.carouselIndex].classList.add('selected');

        
        // Carousel page logic
        if(window.innerWidth >= 600){
            if(this.carouselIndex > 1){
                this.carousel.scrollItem(this.carouselIndex - 1);
            }
        }else{
            this.carousel.scrollItem(this.carouselIndex);
        }
    }

    resize(evt){
        // Set height of all .header-container to tallest child
        const headerContainer = document.querySelector( `#` + this.instanceID + ` .halfhalf-player` );

        const children = document.querySelectorAll( `#` + this.instanceID + ` .halfhalf-player .halfhalf-img` );

        let height = 0;

        for(let i = 0; i < children.length; i++){
            const child = children[i];

            if( child.offsetHeight > height ){
                height = child.offsetHeight;
            }
        }

        headerContainer.style.height = height + 'px';
    }
}

if( document.querySelector('.carousel_content_selection') ){
    const allContent = document.querySelectorAll('.carousel_content_selection');

    for(let ci = 0; ci < allContent.length; ci++){
        const contentItem = allContent[ci];
        const sContent = new CarouselContentSelection(contentItem.id);
    }
}


/*
OFF CANVAS
*/
const hamburger = document.querySelector('.hamburger');
					

hamburger.addEventListener( 'click', (evt)=>{
    const body = document.querySelector('body');
    const offCanvas = document.querySelector('#mobilemenu');

    offCanvas.classList.add('show');

    setTimeout( () => {
        body.classList.add('fixed');
    }, 100);

    // CLOSE ANY EXPANDED
    for(let i = 0; i < mobileLI.length; i++){
        const liItem = mobileLI[i];
        liItem.classList.remove('expanded');
    }
    
});

const mobileLI = document.querySelectorAll('.offcanvas #menu-main-nav li');

for(let mobileMenuI = 0; mobileMenuI < mobileLI.length; mobileMenuI++){
    const mLI = mobileLI[mobileMenuI];

    mLI.addEventListener('click', (evt)=>{
        if(evt.target.parentElement.classList.contains('menu-item-has-children') === true ){
            evt.preventDefault();

    
            setTimeout( ()=>{
                const parentEl = evt.target.parentElement;
                
                if( parentEl.classList.contains('expanded') ){
                    parentEl.classList.remove('expanded');
                }else{
                    for(let i = 0; i < mobileLI.length; i++){
                        const liItem = mobileLI[i];
                        liItem.classList.remove('expanded');
                    }

                    parentEl.classList.add('expanded');
                }
    
            }, 100);
        }else{
            
        }


    })
}


/*
Card Text Carousels
*/
/*
const cardtextcarousels = document.querySelectorAll('.text_card_carousel');

if( cardtextcarousels.length > 0 ){
    new Glider(document.querySelector('.text_card_carousel .cards'), {
        slidesToShow: 1,
        dots: '.dots',
        arrows: {
            prev: '.glider-prev',
            next: '.glider-next'
        },
        responsive:[
            {
                breakpoint:600,
                settings:{
                    slidesToShow:2
                }
            },{
                breakpoint:1200,
                settings:{
                    slidesToShow:3
                }
            }
        ]
    });
}
*/

/** 
 * Product Detail Gallery Selector
*/

const product_gallery = document.querySelectorAll('.post-template-single-product #product .product-gallery')

if(product_gallery.length > 0){
    const gallery_thumbnails_container = document.querySelector('.post-template-single-product #product .product-gallery .thumbnails ul');

    new Glider(gallery_thumbnails_container, {
        slidesToShow: 5,
        dots: false,
        arrows: {
            prev: '.glider-prev',
            next: '.glider-next'
        },
        responsive:[
            {
                breakpoint:600,
                settings:{
                    slidesToShow:5
                }
            },{
                breakpoint:1200,
                settings:{
                    slidesToShow:5
                }
            }
        ]
    });

    // Activate thumbnail buttons
    const gallery_thumbnails = document.querySelectorAll('.post-template-single-product #product .product-gallery .thumbnails ul li');
    
    for(let gti = 0; gti < gallery_thumbnails.length; gti++){
        const thumb = gallery_thumbnails[gti];

        thumb.addEventListener('click', (evt)=>{
            // Deselect current image
            const current_img = document.querySelector('.post-template-single-product #product .product-gallery .images .g-image.selected');
            current_img.classList.remove('selected');

            // Deselect curent thumbnail
            const current_thumb = document.querySelector('.post-template-single-product #product .product-gallery .thumbnails ul li.selected');
            current_thumb.classList.remove('selected');

            // Select new image
            const parent = evt.target.parentNode.parentNode;
            
            const next_img = document.querySelector('.post-template-single-product #product .product-gallery .images .g-image#' + parent.dataset.img);
            next_img.classList.add('selected');

            // Select new thumb
            const next_thumb = parent;
            next_thumb.classList.add('selected');

        });
    }
}

















}