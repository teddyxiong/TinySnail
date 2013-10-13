// signin
$("button#signin").click(function(){
	location.href = "/signin";
});
// signout
$("span#signout").click(function(){
	location.href = "/signout";
});

// reply comment submit
$("button[id^='reply_submit_']").click(function(){
	// fetch data
	var comment_id = $(this).attr("comment_id");
	var post_type = 'reply';
	var reply_uid = $(this).attr("reply_uid");
	var reply_username = $(this).attr("reply_username");
	var reply = $("#reply_comment_"+comment_id).val();

	// set data 
	$("input[name='post_type']").val(post_type);
	$("input[name='reply_uid']").val(reply_uid);
	$("input[name='reply_username']").val(reply_username);
	$("input[name='comment_id']").val(comment_id);
	$("input[name='alert_div_id']").val("alert_danger_"+comment_id);
	$("#comment").val(reply);

	// submit data
	document.comment_form.submit();

});

// reply reply submit
$("button[id^='reply_reply_submit_']").click(function(){
	// fetch data
	var reply_id = $(this).attr("reply_id");
	var comment_id = $(this).attr("comment_id");
	var post_type = 'reply';
	var reply_uid = $(this).attr("reply_uid");
	var reply_username = $(this).attr("reply_username");
	var reply = $("#reply_reply_"+reply_id).val();

	// set data 
	$("input[name='post_type']").val(post_type);
	$("input[name='reply_uid']").val(reply_uid);
	$("input[name='reply_username']").val(reply_username);
	$("input[name='comment_id']").val(comment_id);
	$("input[name='alert_div_id']").val("reply_alert_danger_"+reply_id);
	$("#comment").val(reply);

	// submit data
	document.comment_form.submit();

});

// reply comment set
$("a[id^='reply_comment_button_']").click(function() {
	var comment_cid = $(this).attr('comment_cid');

	var reply_div_id = "#reply_div_"+comment_cid;
	var reply_status = $(reply_div_id).css('display');
	if ('none' == reply_status) {
		$(reply_div_id).show();
	} else {
		$(reply_div_id).hide();
	}

});

// reply reply set
$("a[id^='reply_reply_button_']").click(function() {
	var rid = $(this).attr('reply_id');

	var reply_reply_div_id = "#reply_reply_div_"+rid;
	var reply_reply_status = $(reply_reply_div_id).css('display');
	if ('none' == reply_reply_status) {
		$(reply_reply_div_id).show();
	} else {
		$(reply_reply_div_id).hide();
	}

});

// entry the task 
$("button#add_task").click(function(){
	location.href = "/addtask";
});

// create task
$("#create_task").click(function(){
	location.href = "/addtask";
});
// settings
$("#setting").click(function(){
	var login_user_name = $(this).attr("login_user_name");
	location.href = "/u/"+login_user_name+"/?tab=settings";
});

$('#setting').tooltip('show')
$('#setting').tooltip('hide')
$('#create_task').tooltip('show');
$('#create_task').tooltip('hide');
$('#signout').tooltip('show');
$('#signout').tooltip('hide');

$('#help_tent').modal('show');
$('#help_tent').modal('hide');

$('#help_rule').modal('show');
$('#help_rule').modal('hide');

$('#help_integral').modal('show');
$('#help_integral').modal('hide');

$('#help_philosophy').modal('show');
$('#help_philosophy').modal('hide');
