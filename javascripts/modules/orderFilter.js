
define(['foundation/jquery'],
    function() {

        function order_filter() {
        
        var colorPick = null;

         $.ajax({
              async: false,  
              type: "GET",
              url: "orders/filter",
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
          
        filter: order_filter
  
        }
    }
);