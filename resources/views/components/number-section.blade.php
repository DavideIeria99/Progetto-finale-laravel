<div class="container-fluid d-flex containerseznumeri numWrapper mt-4">
    <div class="row ">
        <div class="col-12 my-2  my-md-2  col-md-12 numSec mynumbers d-flex mysection12 justify-content-center">
            <div class="pt-3">
                <h3 class="fst-italic">{{__('messages.I nostri utenti')}}:</h3>
                <h4 class="text-center"><span class="userNum spanNum">{{$userNum}}</span></h4>
            </div>
        </div>
        <div class="col-12 col-md-12 my-2 my-md-2 numSec mynumbers d-flex mysection12 justify-content-center">
            <div class="pt-3">
                <h3 class="fst-italic">{{__('messages.Le Categorie')}}:</h3>
                <h4 class="text-center"><span class="catNum spanNum">{{count($genres->all())}}</span></h4>
            </div>
        </div>
        <div class="col-12 col-md-12 my-2 my-md-2 numSec mynumbers spanNum d-flex mysection12 justify-content-center">
            <div class="pt-3">
                <h3 class="fst-italic">{{__('messages.I nostri prodotti')}}:</h3>
                <h4 class="text-center"><span class="artNum">{{$artNum}}</span></h4>    
            </div>             
        </div>
        <div class="col-12 col-md-12 my-2 my-md-2 numSec mynumbers spanNum d-flex mysection12 justify-content-center">
            <div class="pt-3">
                <h3 class="fst-italic">{{__('messages.Utenti soddisfatti')}}:</h3>
                <h4 class="text-center"><span class="satNum"></span> %</h4>
            </div>       
        </div>
    </div>
</div>

<script>
let isChecked = false;
let container = document.querySelector('.numWrapper');
let userNum = document.querySelector('.userNum');
let userVal = userNum.innerHTML;
let catNum = document.querySelector('.catNum');
let catVal = catNum.innerHTML;
let artNum = document.querySelector('.artNum');
let artVal = artNum.innerHTML;
let satNum = document.querySelector('.satNum');
let numSecs = document.querySelectorAll('.numSec')
let spanNum = document.querySelectorAll('.spanNum')
// intervallo numeri
function createInterval(element, final, number) {
    let counter = 0;

    let interval = setInterval(() => {
        if (counter < final) {
            counter++;
            element.innerHTML = counter;
        } else {
            clearInterval(interval);
        } 
    
    }, number);    
}
// obsrver su container stesso sezione
let observer = new IntersectionObserver((entries)=>{
    entries.forEach(entry=>{
        if(entry.isIntersecting && isChecked == false){
            numSecs.forEach(element=>{
                element.style.opacity = 1;
            });
            spanNum.innerHTML='';
            
            createInterval(userNum, userVal, 200);
            createInterval(catNum, catVal, 200);
            createInterval(artNum, artVal, 200);
            createInterval(satNum, 110, 100);             
            isChecked = true
        }
    })
});
observer.observe(container);
</script>