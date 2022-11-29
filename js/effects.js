var nav = document.querySelector("#nav");
var login_form = document.querySelector('#login_form');
var creat_account = document.querySelector("create_account");
var cart_data = document.querySelector("#cart_data");
var searchform = document.querySelector('#searchform')


window.onclick = (event)=>{
    if(event.target == nav ){
        nav.classList.remove('active');
    }elseif (event.target == login_form)
    {
        login_form.classList.remove('active');
    }
    elseif(event.target == cart_data)
    {
        cart_data.classList.remove('active');
    }
} 

document.querySelector("#menu").onclick = ()=>{
    nav.classList.toggle('active');
    login_form.classList.remove('active');
    cart_data.classList.remove('active');
}
document.querySelector("#user").onclick = ()=>{
    login_form.classList.toggle('active');
    nav.classList.remove('active');
    cart_data.classList.remove('active');
}
document.querySelector("#shoppingcart").onclick = ()=>{
    cart_data.classList.toggle('active');
    nav.classList.remove('active');
    login_form.classList.remove('active');
    
}
document.querySelector("#search").onclick = ()=>{
    searchform.classList.toggle('active');
}

document.querySelector("#close").onclick = ()=>{
    if (login_form.classList.toggle('active')){
        login_form.classList.remove('active');
    }
    if (create_account.classList.toggle('active')){
        create_account.classList.remove('active');
    }
    if (cart_data.classList.toggle('active')){
        cart_data.classList.remove('active');
    }
    if (searchform.classList.toggle('active')){
        searchform.classList.remove('active');
    }
    
}

