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
    check();
} 
let ShopPage = 1;
let limit = 8;
let listShop = document.querySelectorAll('.list-shop .shop-product');
function loadProduct(){
    let BenginGet = limit *(ShopPage-1);
    let EndGet = limit * ShopPage -1;
    listShop.forEach((item,key)=>{
        if(key >= BenginGet && key <= EndGet){
            item.style.display = 'block';
        }
        else{
            item.style.display = 'none';
        }
    })
    listChoose();
}
loadProduct();

function listChoose(){
    let count = Math.ceil(listShop.length / limit);
    document.querySelector('.listPage').innerHTML = '';
    if(ShopPage != 1){
        let prev = document.createElement('li');
        prev.innerText = 'PREV';
        prev.setAttribute('onclick',"changePage("+ (ShopPage-1) +")");
        document.querySelector('.listPage').appendChild(prev);
    }
    for( i = 1;i <= count;i++){
        let newPage = document.createElement('li');
        newPage.innerText = i;
        if(i==ShopPage){
            newPage.classList.add('active');
        }
        newPage.setAttribute('onclick',"changePage("+ i +")");
        document.querySelector('.listPage').appendChild(newPage);
    }
    if(ShopPage != count){
        let next = document.createElement('li');
        next.innerText = 'NEXT';
        next.setAttribute('onclick',"changePage("+ (ShopPage+1) +")");
        document.querySelector('.listPage').appendChild(next);
    }

}
function changePage(i){
    ShopPage = i;
    loadProduct();
}

var searchInput = search.querySelector('input');
searchInput.addEventListener('input',function(e){
    let txtSearch = e.target.value.trim().toLowerCase();
    listShop.forEach(item =>{
        if(item.innerText.toLowerCase().includes(txtSearch)){
            item.style.display = 'block';
        } 
        else{
            item.style.display = 'none';
        }
    })
})
function check(){
    var check = searchInput.value;
    if(check == ""){
        loadProduct();
    }
}

