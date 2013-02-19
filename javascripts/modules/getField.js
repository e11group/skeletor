
define(['foundation/jquery'],

    function() {

        function some_color(color) {
        
        var colorPick = null;

         $.ajax({
              async: false,
              type: "GET",
              url: "http://localhost/leadertech/public/server/returnJSON",
              global: "true",
              data: {
                  
              },
              dataType: "json", 

              success: function(data){


                    colorPick = 'black';


                 else {

                 }


               }

            });
                  

                  return colorPick;


       }

      return {
          
        color: some_color,
        size: "unisize"
  
        
        }
    }
);