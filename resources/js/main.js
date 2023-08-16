import { Autoplay, EffectCards, Navigation, Pagination } from "swiper";
import Swiper from "swiper";
Swiper.use([Autoplay, Navigation, Pagination, EffectCards]);

let swiper = new Swiper(".mySwiper", {

    slidesPerView: 1,
    spaceBetween: 30,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
  });
  


// Caricamento Spinner
let Start = document.querySelector('#Start');
let End = document.querySelector('#End');

setTimeout(() => {
    Start.classList.add('d-none');
    End.classList.remove('d-none');
    let swiperCard = new Swiper(".mySwiper2", {
        effect: "cards",
        grabCursor: true,
        cardsEffect:{
            slideShadows:false,
        },
    });
    let swiper = new Swiper(".mySwiper", {

        slidesPerView: 1,
        spaceBetween: 30,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
      });
    
}, 200)

let link = document.querySelectorAll('.page-link')
if (link.length>0) {
    let liLink=document.querySelectorAll('.page-item')
    link.forEach(element => {
    element.classList.add('mybtn');
    element.classList.add('mx-3');
});
    liLink.forEach(element=>{
    element.classList.remove('active');
    element.classList.remove('disabled')
    if (element.ariaDisabled) {
        element.classList.add('invisible')
    }
})

// link[0].innerHTML=`{{(__"messages.Precedente")}}`;
// link[1].innerHTML='Successivo >>';
}

let prices = document.querySelectorAll('.price');
if (prices) {
    prices.forEach(price => {
        let value = parseFloat(price.innerHTML)
        
        let int = Math.floor(value)
        let dec = ((value - int).toFixed(2))*100
        
        
        if (dec == 0) {
            price.innerHTML=`
            <span class="int">${int}</span><span class="dec">,00</span>`;
        } else {
            price.innerHTML=`
            <span class="int">${int}</span><span class="dec">,${dec}</span>
           `;
        }
        
    });
}

let titleText = document.querySelectorAll('.titleText')
if (titleText) {
    titleText.forEach(title => {
        title.innerHTML =  title.innerHTML.charAt(0).toUpperCase() + 
        title.innerHTML.slice(1); ;
    });
}

// script per nuovo su nuovi articoli
let date = new Date();
let today = date.getDate();
let month = (date.getMonth())+1;
let year = (date.getYear())-100;
if (month < 10) {
    month=`0${month}`
}
let value = `${today}/${month}/${year}`
let created = document.querySelectorAll('.created')
if (created) {
    created.forEach(element => {
        if (value == element.innerHTML) {
            element.classList.add('newArticle')
        }
    });
}
