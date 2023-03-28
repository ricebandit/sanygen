
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