
define(['foundation/jquery'],
    function() {

        function some_color(color) {
        
        var colorPick = null;

         $.ajax({
              async: false,  
              type: "GET",
              url: "server/color",
              global: "true",
              data: {
                  
              },
              dataType: "json", 

              success: function(data){

                  if ((data.success == 'true') && (color > 10)) {

                    colorPick = 'black';

                  } 

                   if ((data.success == 'true') && (color < 10)) {

                    colorPick = 'yellow';

                  } 

                  else if (data.success == 'false') {

                    colorPick = 'white';


                 }

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