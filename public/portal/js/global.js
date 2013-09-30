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

$('#helpModal').modal('show');
$('#helpModal').modal('hide');
