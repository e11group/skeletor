
define(['foundation/jquery'],
    function() {

        function changed_orders() {
        
        var colorPick = null;

         $.ajax({
              async: false,  
              type: "GET",
              url: "orders/changed",
              global: "true",
              data: {
                  
              },
              dataType: "html", 

              success: function(data){

                 colorPick = data;

                 

               }

            });
                  

          return colorPick;


       }

      return {
          
        color: changed_orders
  
        }
    }
);