<div class="scoreTable d-flex justify-content-center">
   <p class="value d-none">{{ $article->leaderboard->average}}</p>
</div>
<script>
    let valueP = document.querySelector('.value')
    let value = parseFloat(valueP.innerHTML)
    let container = document.querySelector('.scoreTable')

    let int = Math.floor(value)
    let dec = value-int

    switch (int) {
    case 1:
        container.innerHTML=`
        <span>
        <i class="fa-solid fa-star mx-2" style="color: #ffd700;"></i>
        </span>`
    break;
    case 2:
    container.innerHTML=`
        <span>
        <i class="fa-solid fa-star mx-2" style="color: #ffd700;"></i>
        <i class="fa-solid fa-star mx-2" style="color: #ffd700;"></i>
        </span>`
    break;
    case 3:
    container.innerHTML=`
        <span>
        <i class="fa-solid fa-star mx-2" style="color: #ffd700;"></i>
        <i class="fa-solid fa-star mx-2" style="color: #ffd700;"></i>
        <i class="fa-solid fa-star mx-2" style="color: #ffd700;"></i>
        </span>`
    break;
    case 4:
    container.innerHTML=`
        <span>
        <i class="fa-solid fa-star mx-2" style="color: #ffd700;"></i>
        <i class="fa-solid fa-star mx-2" style="color: #ffd700;"></i>
        <i class="fa-solid fa-star mx-2" style="color: #ffd700;"></i>
        <i class="fa-solid fa-star mx-2" style="color: #ffd700;"></i>
        </span>`
    break;
    case 5:
    container.innerHTML=`
        <span>
        <i class="fa-solid fa-star mx-2" style="color: #ffd700;"></i>
        <i class="fa-solid fa-star mx-2" style="color: #ffd700;"></i>
        <i class="fa-solid fa-star mx-2" style="color: #ffd700;"></i>
        <i class="fa-solid fa-star mx-2" style="color: #ffd700;"></i>
        <i class="fa-solid fa-star mx-2" style="color: #ffd700;"></i>
        </span>`
    break;
}
let span2 = document.createElement('span')
if(dec>0){
    let span = document.createElement('span')
    span.innerHTML=`
    <i class="fa-solid fa-star-half-stroke mx-2" style="color: #ffd700;"></i>
    `
    container.appendChild(span);
    switch (int) {
    case 1:
        span2.innerHTML=`
        <i class="fa-solid fa-star mx-2"></i>
        <i class="fa-solid fa-star mx-2"></i>
        <i class="fa-solid fa-star mx-2"></i>
        `
        container.appendChild(span2)
        
    break;
    case 2:
        span2.innerHTML=`
        <i class="fa-solid fa-star mx-2"></i>
        <i class="fa-solid fa-star mx-2"></i>
        `
        container.appendChild(span2)
    break;
    case 3:
        span2.innerHTML=`
        <i class="fa-solid fa-star mx-2"></i>
        `
        container.appendChild(span2)
    break;
    }
}else{
    switch (int) {
    case 1:
        span2.innerHTML=`
        <i class="fa-solid fa-star mx-2"></i>
        <i class="fa-solid fa-star mx-2"></i>
        <i class="fa-solid fa-star mx-2"></i>
        <i class="fa-solid fa-star mx-2"></i>
        `
        container.appendChild(span2)    
    break;
    case 2:
        span2.innerHTML=`
        <i class="fa-solid fa-star mx-2"></i>
        <i class="fa-solid fa-star mx-2"></i>
        <i class="fa-solid fa-star mx-2"></i>
        `
        container.appendChild(span2)
    break;
    case 3:
        span2.innerHTML=`
        <i class="fa-solid fa-star mx-2"></i>
        <i class="fa-solid fa-star mx-2"></i>
        `
        container.appendChild(span2)
    break;
    case 4:
        span2.innerHTML=`
        <i class="fa-solid fa-star mx-2"></i>
        `
        container.appendChild(span2)
    break;
    }  
}

</script>