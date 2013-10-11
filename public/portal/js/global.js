// signin
$("button#signin").click(function(){
	location.href = "/signin";
});
// signout
$("span#signout").click(function(){
	location.href = "/signout";
});

// reply comment
$("a[id^='rely_comment_']").click(function() {
	var comment_cid = $(this).attr('comment_cid');
	var comment_user_name = $(this).attr('comment_user_name');
	var comment_text = $(this).attr('comment_text');
	$("#parent_id").val(comment_cid);

	var quote_content = ">"+"#### 引用来自“@"+comment_user_name+"”的评论:     "+comment_text+"<hr/>";
	var comment_content = "M#D正在引用 @"+comment_user_name+" 的评论M#D\r\n";

	$("#quote_content").val(quote_content);
	$("#comment").html(comment_content);
	location.href = "#comment_input";
});
// entry the task 
$("button#add_task").click(function(){
	location.href = "/addtask";
});

$('#setting').tooltip('show')
$('#setting').tooltip('hide')
$('#create').tooltip('show');
$('#create').tooltip('hide');
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
