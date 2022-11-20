$(document).ready(function() {  

    id_modal = ''; 
    modal =''; 
    dismiss ='';
    
    $(".custom-modal-activate").click(function() {
        
        var link_modal = $(this).attr('href');
        
        id_modal = link_modal.substr(1, link_modal.length); 
        modal = document.getElementById(id_modal);    
        dismiss = modal.getAttribute("data-dismiss"); 
        
        if (dismiss=="true") {            
            $(".custom-modal-close").show();
        }else {
            $(".custom-modal-close").hide();
        }

        modal.style.display = "block";            
    });

    $(".custom-modal-close").click(function() {
      
        $(modal).fadeOut();            
    });

    $(".custom-modal-action-close").click(function() {
      
        $(modal).fadeOut();            
    });

    $(document).click(function() {

        if (dismiss=="true") {

            if (event.target == modal) { 

                $(modal).fadeOut();            
            }
        }
    });

});
   
function customModalOpen(id) {             
    
    modal = document.getElementById(id);    
    dismiss = modal.getAttribute("data-dismiss"); 
    
    if (dismiss=="true") {
        
        $(".custom-modal-close").show();
    }else {
        $(".custom-modal-close").hide();
    }

    $(modal).fadeIn();            
}

function customModalClose(id) {  
            
    modal = document.getElementById(id);    
    $(modal).fadeOut();            
}

