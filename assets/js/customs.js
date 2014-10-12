
$(document).ready(function() {
$('input[name=create]').click(function(){
	
		var diff;
		var start= $('input[name=start_time]').val();
		var end= $('input[name=end_time]').val();
function timeDiff( first, second ) {
    var f = first.split(':'), s = second.split(':');
    if( first == '12:00am' ) f[0] = '0';
    if( first == '12:00pm' ) f[1] = 'am';
    if( second == '12:00am' ) s[0] = '24';
    if( second == '12:00pm' ) s[1] = 'am';
    f[0] = parseInt( f[0], 10 ) + (f[1] == '00pm' ? 12 : 0);
    s[0] = parseInt( s[0], 10 ) + (s[1] == '00pm' ? 12 : 0);

    return s[0] - f[0];
}
function newstart(first){
	var f = first.split(':');
  
   	 if( first == '11:00pm' ) f[1] = '00am';
     if( first == '11:00am' ) f[1] = '00pm';
      if( first == '12:00pm' ) {
      	f[0] = '01';
      }
      else if( first == '12:00am' ) {
      	f[0] = '01';
      }
      else{
      	  f[0] = parseInt( f[0], 10 ) + 1;
      }

 
    return f[0]+":"+f[1];
}

	diff=timeDiff( start,end );
	$("#time").append("<input type='hidden' name='diff' value='"+diff+"'>");	
	start_time1=start;
	var array = [];
	for (var i = 0; i< diff; i++) {
		 array.push(i);
	};
	$("#result").html("<table id='mytable' name='futsal-table' border=1 width=100% >"+
		"<tbody id='my'>"+
														"<tr>"+
															"<td name='time'>Time</td>"+
															"<td name='sunday'><span>Sunday</span></td>"+
															"<td name='monday'><span>Monday</span></td>"+
															"<td name='tuesday'><span>Tuesday</span></td>"+
															"<td name='wednesday'><span>Wednesday</span></td>"+
															"<td name='thrusday'><span>Thrusday</span></td>"+
															"<td name='friday'><span>Friday</span></td>"+
															"<td name='saturday'><span>Saturday</span></td>"+
														"</tr>"+"</tbody>");
													jQuery("#result tbody").append(function(){
														 var $container = $('<div></div>');
														    $.each(array, function(val) {
														        $container.append($("<tr/>").append(
														        	 $("<td/>").html("<span>"+start_time1+"--"+newstart(start_time1)+"</span>"),
														        	  $("<td/>").html("<span><input type='text' name='1"+val+"'></span>"), 
														        	  $("<td/>").html("<span><input type='text' name='2"+val+"'></span>"), 
														        	  $("<td/>").html("<span><input type='text' name='3"+val+"'></span>"), 
														        	  $("<td/>").html("<span><input type='text' name='4"+val+"'></span>"),
														        	   $("<td/>").html("<span><input type='text' name='5"+val+"'></span>"),
														        	    $("<td/>").html("<span><input type='text' name='6"+val+"'></span>"),
														        	     $("<td/>").html("<span><input type='text' name='7"+val+"'></span>")
														        	
														        ));
														      
																$("#time").append("<input type='hidden' name='start_time"+val+"' value='"+start_time1+"'>");											
														         start_time1=newstart(start_time1);
														         $("#time").append("<input type='hidden' name='end_time"+val+"' value='"+start_time1+"'>");	
														    });

														   return $container.html();
														});
$("#submit").html("<input type='submit'  value='update'>");

});	


});

// // $("#submit").html("<input type='button' onclick='submit_ajax()' value='update'>");
//  function get_ajax(){
//  	var base_url= $('#base_url').val();
// 	$.ajax({
//      		type: "GET",
//           	url: base_url+'admin/get_schedular',
//           	dataType: 'json',
//           	  success:function(data){ 
//           	  	console.log(data);
// 				var start= data[0].start_time;
// 				function newstart(first){
// 				var f = first.split(':');
				  
// 				   	 if( first == '11:00pm' ) f[1] = '00am';
// 				     if( first == '11:00am' ) f[1] = '00pm';
// 				      if( first == '12:00pm' ) {
// 				      	f[0] = '01';
// 				      }
// 				      else if( first == '12:00am' ) {
// 				      	f[0] = '01';
// 				      }
// 				      else{
// 				      	  f[0] = parseInt( f[0], 10 ) + 1;
// 				      }

				 
// 				    return f[0]+":"+f[1];
// 				}

// 					diff=data[0].time_diff;
// 					$("#time").append("<input type='hidden' name='diff' value='"+diff+"'>");	
// 					start_time1=start;
// 					var array = [];
// 					for (var i = 0; i< diff; i++) {
// 						 array.push(i);
// 					};
// 					var array1 = [];
// 					for (var i = 1; i< 8; i++) {
// 						 array1.push(i);
// 					};
// 	$("#result").html("<table id='mytable' name='futsal-table' border=1 width=100% >"+
// 		"<tbody id='my'>"+
// 														"<tr>"+
// 															"<td name='time'>Time</td>"+
// 															"<td name='sunday'><span>Sunday</span></td>"+
// 															"<td name='monday'><span>Monday</span></td>"+
// 															"<td name='tuesday'><span>Tuesday</span></td>"+
// 															"<td name='wednesday'><span>Wednesday</span></td>"+
// 															"<td name='thrusday'><span>Thrusday</span></td>"+
// 															"<td name='friday'><span>Friday</span></td>"+
// 															"<td name='saturday'><span>Saturday</span></td>"+
// 														"</tr>"+"</tbody>");
// 													jQuery("#result tbody").append(function(){
// 														 var $container = $('<div></div>');
// 														    $.each(array, function(val) {
// 														        $container.append($("<tr/>").append(
// 														        	 $("<td/>").html("<span>"+start_time1+"--"+newstart(start_time1)+"</span>"),
// 														        	  $("<td/>").html("<span><input type='text' name='1"+val+"' value='"+data[val].price+"' ></span>"), 
// 														        	  $("<td/>").html("<span><input type='text' name='2"+val+"' value='"+data[val].price+"' ></span>"), 
// 														        	  $("<td/>").html("<span><input type='text' name='3"+val+"' value='"+data[val].price+"' ></span>"), 
// 														        	  $("<td/>").html("<span><input type='text' name='4"+val+"' value='"+data[val].price+"' ></span>"),
// 														        	   $("<td/>").html("<span><input type='text' name='5"+val+"' value='"+data[val].price+"' ></span>"),
// 														        	    $("<td/>").html("<span><input type='text' name='6"+val+"' value='"+data[val].price+"' ></span>"),
// 														        	     $("<td/>").html("<span><input type='text' name='7"+val+"' value='"+data[val].price+"' ></span>")
														        	
// 														        ));
// 														      	$("#id").append("<input type='hidden' name='id"+val+"' value='"+data[val].id+"'>");
// 																$("#time").append("<input type='hidden' name='start_time"+val+"' value='"+start_time1+"'>");											
// 														         start_time1=newstart(start_time1);
// 														         $("#time").append("<input type='hidden' name='end_time"+val+"' value='"+start_time1+"'>");	
// 														    });

// 														   return $container.html();
// 														});
// $("#submit").html("<input type='button' onclick='update_ajax()'  value='update'>");


               
//             },
//             error: function(jqXHR, textStatus, errorThrown){ 
//       alert( jqXHR.responseText);
               
//           }
//        });
// }

//  if($("#show").length > 0){
//     $(document).ready(function(){
//     	get_ajax();
//     });
// }
function update_ajax(){
		var base_url= $('#base_url').val();
		var form_data = $("#myform1").serialize();
		$.ajax({
     		type: "POST",
          	url: base_url+'admin/update_schedular',
          	data: form_data,
          	dataType: 'json',
          	  success:function(data){ 
          	  	 $('#id').html("");

          	  	if (data==1) {
          	  		$('#message').html("Updated Successfully");
          	  	};
          	  setTimeout(function () {
          	  $('#message').html("");
          	}, 2000);
     		  },
     		   beforeSend : function (){
                 $('#id').html("<img src='"+base_url+"/images/ajax_load.gif'>");

            },
          	    error: function(jqXHR, textStatus, errorThrown){ 
      alert( jqXHR.responseText);
               
          }
          	});

}
