//$('#name').focus();
//https://stackoverflow.com/questions/4331022/focus-input-box-on-load
$(document).ready(function() {
    $('#name').focus();
});

$('#title').click(function(){
    $(this).html("<input></input>");
});