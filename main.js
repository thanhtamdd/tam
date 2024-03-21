const glass = document.querySelector('.glass');
const search = document.querySelector('.search');
const span = search.querySelector('span');
const total = document.querySelector('.total')
const none = document.querySelector('.none')
glass.onclick= function(){
    search.style.display = "block";
}
span.onclick = function(){
    search.style.display = "none";
} 


let thisPage=1;
let listChoiced = document.querySelectorAll('.list-choiced div')
let list = document.querySelectorAll('.list-choose .choose');
let listArrow = document.querySelectorAll('.list-choose span');
let listProduct = document.querySelectorAll('.list .item ');

function tittlePage(){
    let tittle = thisPage - 1;
    list.forEach((choose,key)=>{
        if(key==tittle){
            choose.style.display = "flex"
            choose.onclick = function(){
                none.classList.toggle('none')
                listArrow.forEach((span,key)=>{
                    if(key==tittle){
                        span.classList.add('arrows')
                    } 
                    else{
                        span.classList.remove('arrows')
                    }
                })
            }
        }
        else{
            choose.style.display = "none"
        }
    })
    listChoiced.forEach((div,key)=>{
        if(key==tittle){
            div.classList.add('black')
        }
        else{
            div.classList.remove('black')
        }
        
    })
    listProduct.forEach((item,key)=>{
        if(key==tittle){
            item.style.display = "block"
        }
        else{
            item.style.display ="none"
        }
    })
    choicePage();
    
}
tittlePage();
function choicePage(){
    listChoiced.forEach(function (course ,index){
        course.setAttribute('onclick',"changePage("+ index +")")
    })
}

function changePage(index){
    thisPage = index + 1 ;
    none.classList.toggle('none');
    tittlePage();
    
}
const push = document.querySelector('.push');
const first = document.querySelector('.first');
const firstPer = document.querySelector('.main-infor1');
push.onclick = function(){
    first.classList.toggle('rotate')
    firstPer.classList.toggle('none')
}
const put = document.querySelector('.put');
const second = document.querySelector('.second');
const secondPer = document.querySelector('.main-infor2');
put.onclick = function(){
    second.classList.toggle('rotate')
    secondPer.classList.toggle('none')
}
const putLight = document.querySelector('.put-light');
const third = document.querySelector('.third');
const thirdPer = document.querySelector('.main-infor3');
putLight.onclick = function(){
    third.classList.toggle('rotate')
    thirdPer.classList.toggle('none')
}
const putFiber = document.querySelector('.put-fiber');
const four = document.querySelector('.four');
const fourPer = document.querySelector('.main-infor4');
putFiber.onclick = function(){
    four.classList.toggle('rotate')
    fourPer.classList.toggle('none')
}





 





























    

 
 
    
    




