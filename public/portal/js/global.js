// signin
$("button#signin").click(function(){
	location.href = "/signin";
});
// signout
$("span#signout").click(function(){
	location.href = "/signout";
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
