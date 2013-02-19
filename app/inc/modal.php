<script>


			function runScript() {

    			if( window.jQuery  && $.fn.reveal) {

    				$("#modal").reveal()

   				 } else {

       			 window.setTimeout( runScript, 50 );
    			}
			
			}        	 
    
    			runScript();

        	
        	</script>