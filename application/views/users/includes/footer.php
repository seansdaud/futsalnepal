	</div>
	<script type="text/javascript" src="<?php echo site_url().'assets/js/jquery.js' ?>"></script>
	<script type="text/javascript" src="<?php echo site_url().'assets/js/bootstrap.min.js' ?>"></script>
	<script type="text/javascript" src="<?php echo site_url().'assets/js/validator.min.js' ?>"></script>

	<script type="text/javascript">
	 $("#home .sidebar-navigation a:contains('Home')").addClass('active');
   $("#scheduler .sidebar-navigation a:contains('Schedular')").addClass('active');
   $("#book .sidebar-navigation a:contains('Book Schedule')").addClass('active');
   $("#book .sidebar-navigation #book").addClass('in');
    $("#showschedular .sidebar-navigation a:contains('Update Schedule')").addClass('active');
     $("#todayschedular .sidebar-navigation a:contains('Today's Schedule')").addClass('active');
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