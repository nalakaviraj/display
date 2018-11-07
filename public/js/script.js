$(document).ready(function(){

	$(".btn_del").click(function(){
	    if (!confirm("Do you want to delete ?")){
	      return false;
	    }
  	});

  	$(".schedule_client_name").on('change', function () {		

		var screen_schedule_id = $(this).next().val();
		var screen_id = $(this).next().next().val();
		var client_id = $(this).val();
		var client_name = $(this).find('option:selected').text();

		//alert(screen_id);

		$.ajax({
			type:'POST',
			url:base_url+'/admin/schedule/change',
			data:{
				screen_id:screen_id,
				screen_schedule_id:screen_schedule_id,
				client_url_id:client_id,
				_token: _token,

			},
			success:function(msg){
		
				if(msg){
					$('#sid_'+screen_id+'_'+screen_schedule_id).text(client_name);
				}
			}

		});

	});


	$(".emp_pro_report").on('click', function () {

		//alert($(this).parent('div').siblings().html());
		var img_html_div = $(this).parent('div').siblings();
		var app_html_div = $(this).parent('div').find('.someclass');
		var checkbox_value = "";
		var numberOfChecked = $("[type='checkbox']:checked").length;

		//alert(numberOfChecked);

		if(numberOfChecked <= 8){
	  
	        var ischecked = $(this).is(":checked");

	        if (ischecked) {

	            checkbox_value = $(this).val();

	            $.ajax({
			        type: "post",
			        url: base_url+"/admin/pro_report/bestprofitperhect/add",
			        data: {
			            checkbox_value: checkbox_value,
			            _token: _token,
			            ischecked:ischecked,
			        },
			        success: function (msg) {
			           app_html_div.html('<input type="hidden" name="" class="hidden_check" value="'+msg+'">');
			           //img_html_div.css('background','#99ff99');
			        }
		    	})

	        }else{

	        	checkbox_value = $(this).siblings('.someclass').find('.hidden_check').val();


	        	$.ajax({
			        type: "post",
			        url: base_url+"/admin/pro_report/bestprofitperhect/delete",
			        data: {
			            checkbox_value: checkbox_value,
			            _token: _token,
			            ischecked:ischecked,
			        },
			        success: function (msg) {
			            // alert(msg);
			            app_html_div.html('');
			        }
		    	})


	        }
        }else{
        	alert('You Can Only Select 8 People');
        	$(this).attr('checked', false);
        }

	});


	$(".emp_pro_report_bestimprovementonprofitperhect").on('click', function () {

		//alert($(this).parent('div').siblings().html());
		var img_html_div = $(this).parent('div').siblings();
		var app_html_div = $(this).parent('div').find('.someclass');
		var checkbox_value = "";
		var numberOfChecked = $("[type='checkbox']:checked").length;

		if(numberOfChecked <= 8){
	  
	        var ischecked = $(this).is(":checked");

	        if (ischecked) {

	            checkbox_value = $(this).val();

	            $.ajax({
			        type: "post",
			        url: base_url+"/admin/pro_report/bestimprovementonprofitperhect/add",
			        data: {
			            checkbox_value: checkbox_value,
			            _token: _token,
			            ischecked:ischecked,
			        },
			        success: function (msg) {
			           app_html_div.html('<input type="hidden" name="" class="hidden_check" value="'+msg+'">');
			           //img_html_div.css('background','#99ff99');
			        }
		    	})

	        }else{

	        	checkbox_value = $(this).siblings('.someclass').find('.hidden_check').val();


	        	$.ajax({
			        type: "post",
			        url: base_url+"/admin/pro_report/bestimprovementonprofitperhect/delete",
			        data: {
			            checkbox_value: checkbox_value,
			            _token: _token,
			            ischecked:ischecked,
			        },
			        success: function (msg) {
			            // alert(msg);
			            app_html_div.html('');
			        }
		    	})


	        }
	    }else{
	    	alert('You Can Only Select 8 People');
        	$(this).attr('checked', false);
	    } 
	});	


	$(".emp_pro_report_highestyph").on('click', function () {

		//alert($(this).parent('div').siblings().html());
		var img_html_div = $(this).parent('div').siblings();
		var app_html_div = $(this).parent('div').find('.someclass');
		var checkbox_value = "";
		var numberOfChecked = $("[type='checkbox']:checked").length;
	  	
	  	if(numberOfChecked <= 8){

	        var ischecked = $(this).is(":checked");

	        if (ischecked) {

	            checkbox_value = $(this).val();

	            $.ajax({
			        type: "post",
			        url: base_url+"/admin/pro_report/highestyph/add",
			        data: {
			            checkbox_value: checkbox_value,
			            _token: _token,
			            ischecked:ischecked,
			        },
			        success: function (msg) {
			           app_html_div.html('<input type="hidden" name="" class="hidden_check" value="'+msg+'">');
			           //img_html_div.css('background','#99ff99');
			        }
		    	})

	        }else{

	        	checkbox_value = $(this).siblings('.someclass').find('.hidden_check').val();


	        	$.ajax({
			        type: "post",
			        url: base_url+"/admin/pro_report/highestyph/delete",
			        data: {
			            checkbox_value: checkbox_value,
			            _token: _token,
			            ischecked:ischecked,
			        },
			        success: function (msg) {
			            // alert(msg);
			            app_html_div.html('');
			        }
		    	})


	        }
	    }else{
	    	alert('You Can Only Select 8 People');
        	$(this).attr('checked', false);
	    }
	});	


	$(".emp_pro_report_bestyphrankimprovement").on('click', function () {

		//alert($(this).parent('div').siblings().html());
		var img_html_div = $(this).parent('div').siblings();
		var app_html_div = $(this).parent('div').find('.someclass');
		var checkbox_value = "";
	  
	        var ischecked = $(this).is(":checked");

	        if (ischecked) {

	            checkbox_value = $(this).val();

	            $.ajax({
			        type: "post",
			        url: base_url+"/admin/pro_report/bestyphrankimprovement/add",
			        data: {
			            checkbox_value: checkbox_value,
			            _token: _token,
			            ischecked:ischecked,
			        },
			        success: function (msg) {
			           app_html_div.html('<input type="hidden" name="" class="hidden_check" value="'+msg+'">');
			           //img_html_div.css('background','#99ff99');
			        }
		    	})

	        }else{

	        	checkbox_value = $(this).siblings('.someclass').find('.hidden_check').val();


	        	$.ajax({
			        type: "post",
			        url: base_url+"/admin/pro_report/bestyphrankimprovement/delete",
			        data: {
			            checkbox_value: checkbox_value,
			            _token: _token,
			            ischecked:ischecked,
			        },
			        success: function (msg) {
			            // alert(msg);
			            app_html_div.html('');
			        }
		    	})


	        } 
	});	


	$(".emp_pro_report_highestrevenueperhect").on('click', function () {

		//alert($(this).parent('div').siblings().html());
		var img_html_div = $(this).parent('div').siblings();
		var app_html_div = $(this).parent('div').find('.someclass');
		var checkbox_value = "";
	  
	        var ischecked = $(this).is(":checked");

	        if (ischecked) {

	            checkbox_value = $(this).val();

	            $.ajax({
			        type: "post",
			        url: base_url+"/admin/pro_report/highestrevenueperhect/add",
			        data: {
			            checkbox_value: checkbox_value,
			            _token: _token,
			            ischecked:ischecked,
			        },
			        success: function (msg) {
			           app_html_div.html('<input type="hidden" name="" class="hidden_check" value="'+msg+'">');
			           //img_html_div.css('background','#99ff99');
			        }
		    	})

	        }else{

	        	checkbox_value = $(this).siblings('.someclass').find('.hidden_check').val();


	        	$.ajax({
			        type: "post",
			        url: base_url+"/admin/pro_report/highestrevenueperhect/delete",
			        data: {
			            checkbox_value: checkbox_value,
			            _token: _token,
			            ischecked:ischecked,
			        },
			        success: function (msg) {
			            // alert(msg);
			            app_html_div.html('');
			        }
		    	})


	        } 
	});


	$(".emp_pro_report_bestimprovementinrank").on('click', function () {

		//alert($(this).parent('div').siblings().html());
		var img_html_div = $(this).parent('div').siblings();
		var app_html_div = $(this).parent('div').find('.someclass');
		var checkbox_value = "";
	  
	        var ischecked = $(this).is(":checked");

	        if (ischecked) {

	            checkbox_value = $(this).val();

	            $.ajax({
			        type: "post",
			        url: base_url+"/admin/pro_report/bestimprovementinrank/add",
			        data: {
			            checkbox_value: checkbox_value,
			            _token: _token,
			            ischecked:ischecked,
			        },
			        success: function (msg) {
			           app_html_div.html('<input type="hidden" name="" class="hidden_check" value="'+msg+'">');
			           //img_html_div.css('background','#99ff99');
			        }
		    	})

	        }else{

	        	checkbox_value = $(this).siblings('.someclass').find('.hidden_check').val();


	        	$.ajax({
			        type: "post",
			        url: base_url+"/admin/pro_report/bestimprovementinrank/delete",
			        data: {
			            checkbox_value: checkbox_value,
			            _token: _token,
			            ischecked:ischecked,
			        },
			        success: function (msg) {
			            // alert(msg);
			            app_html_div.html('');
			        }
		    	})


	        } 
	});






});//end of ready