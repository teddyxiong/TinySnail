// signin
$("button#signin").click(function(){
	location.href = "?action=sign_in";
});
// signout
$("span#signout").click(function(){
	location.href = "?action=sign_out";
});
$('#setting').tooltip('show')
$('#setting').tooltip('hide')
$('#create').tooltip('show');
$('#create').tooltip('hide');
$('#signout').tooltip('show');
$('#signout').tooltip('hide');

$('#helpModal').modal('show');
$('#helpModal').modal('hide');
