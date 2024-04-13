var acc = document.querySelectorAll(".accordion");
var i;

acc.forEach(function(item){
    item.addEventListener('click', function(){

        if(this.nextElementSibling.classList.contains('panelShow')){
            this.nextElementSibling.classList.remove('panelShow');
            this.firstChild.classList.remove("arrowUp"); 
        }else{
            acc.forEach(function(item) {
                item.nextElementSibling.classList.remove('panelShow');
                item.firstChild.classList.remove("arrowUp");
            });
    
            this.nextElementSibling.classList.toggle('panelShow');
            this.firstChild.classList.toggle("arrowUp");
        }
        
    }, false)
})