<script>
	$(document).ready(function() {
		$("#logo ul li").hover(function(){
			
			$(".40").animate({
			width:'60px'
			},1000);
			$(this).animate({
				bottom:'-10px'
			},"fast");
			
		});
		$("#logo ul li").mouseout(function(){
			
			
			$(this).animate({
				bottom:'0px'
			},"fast");
			
		});
		
		
		
	});
</script>
<script type="text/javascript">
        $(document).ready(function() {
            $('#featured li a').click(function() {
                var $this = $(this), url = $(this).attr('href');
				
                $('#featured li a').removeClass('selected');
                $this.addClass('selected');
                
                $('.imageBox')
                .children('img')
                .fadeOut(200, function() {
                    $(this)
                    .attr('src', url)
                    .load(function() {
                      $(this).fadeIn(200);  
                    });
                    
                });
                return false;
            });
            
        });
     </script>