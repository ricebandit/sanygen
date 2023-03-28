class GalleryLooper{
    constructor(img_array, ms){
        console.log('GalleryLooper', img_array);

        this.intSpd = ms;
        this.index = 0;
        this.items = img_array;

        this.items[0].classList.add('show');
    }

    start(){

        if(this.items.length > 1){
            this.int = setInterval( ()=>{
                this.swapSlides();
            }, this.intSpd);
        }else{
            this.items[0].classList.add('show');
        }
    }

    stop(){
        if(this.int){
            clearInterval(this.int);
            this.index = 0;
        }
    }

    swapSlides(){
        // First remove .show from currently displayed
        for(let i = 0; i < this.items.length; i++){
            const item = this.items[i];
            item.classList.remove('show');
        }

        this.index++;

        if(this.index == this.items.length){
            this.index = 0;
        }

        this.items[this.index].classList.add('show');
    }
}