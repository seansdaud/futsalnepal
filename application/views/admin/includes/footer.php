	
	<script type="text/javascript" src="<?php echo site_url().'assets/js/js.js' ?>"></script>
	<script type="text/javascript" src="<?php echo site_url().'assets/js/bootstrap.min.js' ?>"></script>
	<script type="text/javascript" src="<?php echo site_url().'assets/js/jquery.timepicker.js' ?>"></script>
	<script type="text/javascript" src="<?php echo site_url().'assets/js/customs.js' ?>"></script>
	<script type="text/javascript">$('input[name=start_time]').timepicker();</script>
	<script type="text/javascript">$('input[name=end_time]').timepicker();</script>

	<script type="text/javascript">
		$("#imagePreview  ").hide();

		$(function() {
		    $("#uploadImage ").on("change", function()
		    {
		        var files = !!this.files ? this.files : [];
		        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

		        if (/^image/.test( files[0].type)){ // only image file
		            var reader = new FileReader(); // instance of the FileReader
		            reader.readAsDataURL(files[0]); // read the local file

		            reader.onloadend = function(){ // set image data as background of div
		            	$("#imagePreview1").hide();
		            	$("#imagePreview").show();

		                $("#imagePreview").css("background-image", "url("+this.result+")");
		            }
		        }
		    });
		});
		   

	</script>
</body>
</html>