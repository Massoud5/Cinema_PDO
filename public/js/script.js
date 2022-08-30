const message = document.querySelector('.message');

if(message){

    message.style.display = "block"; 

    setTimeout(function(){
        message.style.display = "none";     
    }, 700);
    
}