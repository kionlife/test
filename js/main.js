$(document).ready(function(){
    $('td.edit').click(function(){
    $('.ajax').html($('.ajax input').val());
    $('.ajax').removeClass('ajax');
    $(this).addClass('ajax');
    $(this).html('<input id="editbox" size="'+ $(this).text().length+'" type="text" value="' + $(this).text() + '" />');
    $('#editbox').focus();
  });

$('td.edit').keydown(function(event){
arr = $(this).attr('class').split( " " );
var id = $(this).attr('data-id');
if(event.which == 13)
{
var table = $('table').attr('id');
$.ajax({ type: "POST",
url:"/process.php?type=update",
data: "id="+id+"&field="+arr[1]+"&value="+$('.ajax input').val()+"&table="+table,

success: function(data){
    console.log(data);

$('.ajax').html($('.ajax input').val());
$('.ajax').removeClass('ajax');
}});
}});
    
});




