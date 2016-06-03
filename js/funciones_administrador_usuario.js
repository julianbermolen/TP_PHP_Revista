
  $(function () {
    $("#tabla1").DataTable();
  
  });

$(document).ready(function(){
        $(document).on('click', '.btn_delete', function(){  
           var id_usuario=$(this).data("id1");  
           if(confirm("Estas seguro de borrar esto?"))  
           {  
                $.ajax({  
                     url:"php/borrar_usuario.php",  
                     method:"POST",  
                     data:{id_usuario:id_usuario},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          window.location.reload();  
                     }  
                });  
           }  

      
       });

      $('#modalNuevo').on('hidden.bs.modal', function(){ 
          $(this).find('form')[0].reset(); //para borrar todos los datos que tenga los input, textareas, select.
          $("label.error").remove();  //lo utilice para borrar la etiqueta de error del jquery validate
          $(".error").removeClass("error");  //lo utilice para remover los bordes rojos
         });


 });



