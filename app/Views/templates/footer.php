
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="<?php echo base_url();?>/assets/js/sweetalert.min.js"></script>
      <script src="<?php echo base_url();?>/assets/js/show-hide-pass.js"></script>
      <script src="<?php echo base_url();?>/assets/js/signup.js"></script>
      <script src="<?php echo base_url();?>/assets/js/chat.js"></script>
      <script src="<?php echo base_url();?>/assets/js/login.js"></script>
      <script>
            /*setInterval(function(){
            
            },3000);*/


            clearInterval(intervalID);
            intervalID = setInterval(function(){
            console.log("Hello");
            var form = $(this);
		var url = form.attr('action');

		/*$.ajax({
			type: "POST",
			url: url,
			data: form.serialize(),
			success: function(data)
			{
				if (data === 'send')
					swal("Email Send", "Thank you for response", "success", {button: false, timer: 1500,});//.then(function() {window.location.href = "<-?php echo base_url();?>";});
				else if (data === 'notSend')
					swal("Error", "Something went wrong, check network connection", "error", {button: false, timer: 1500,});
				else  if (data === 'invalidEntry')
					swal("Error", "Maybe email is not valid please check again your inputs", "error", {button: false, timer: 1500,});
				
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				swal("Error",textStatus + XMLHttpRequest + errorThrown, "error");
			}
		});*/
            }, 60000);
      </script>
</body>
</html>