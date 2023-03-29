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



















}