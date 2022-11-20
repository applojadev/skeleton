$(window).on('load', function () {    

    $("#load-loading").fadeOut("slow");              
});

teclaControlPress = false;

$(document).on('keydown', function(e) {
    
    if (e.ctrlKey){ 
        teclaControlPress = true;        
    }
    
});      

$(document).on('keyup', function(e) {
   
    if (e.keyCode == 17){ 
        teclaControlPress = false;        
    }
    
});        

$(document).ready(function () {                     
        
    $("body").on('click', '.click-loading-old', function(e){                   
        
        if (teclaControlPress) {
    
        }else {
    
            $("#load-loading").show();
        }        
    
    });    
    
    $(".mask-money").maskMoney({        
        decimal: ",",
        thousands: ".",
        allowZero: true                
    });    
    
    var close = document.getElementsByClassName("custom-closebtn");
    var i;

    for (i = 0; i < close.length; i++) {
        close[i].onclick = function(){
            var div = this.parentElement;
            div.style.opacity = "0";
            setTimeout(function(){ div.style.display = "none"; }, 600);
        }
    }    

    /**
     * Descomentar popover para utilizar
     */
    /*$('[data-toggle="popover"]').popover({
        container: 'body',
        trigger:'hover',            
        delay: { "show": 100, "hide": 100 }
    })*/

    /**
     * Descomentar tooltip para utilizar
     */
    /*$('[data-toggle="tooltip"]').tooltip({
        trigger:'hover',            
        delay: { "show": 100, "hide": 100 }
    });
    
    $('body').tooltip({
        selector: '[data-toggle="tooltip"]'
    });

    $('.title-custom').tooltip({
        trigger:'hover',
        placement: 'top',
        html: true,
        delay: { "show": 100, "hide": 100 }
    });*/      

});