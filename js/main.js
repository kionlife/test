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

$(".getSubs").click(function(){
    var date = $(this).attr("data")
    $.ajax({ type: "POST",
url:"/actions.php?action=subscription",
data: "date="+date,

success: function(data){
    $(".subs").html(data);
}});
    
});



$("#search").click(function(){
    var name = $(".search input").val();
    $.ajax({ type: "POST",
url:"/actions.php?action=subscribers",
data: "name="+name,

success: function(data){
    $(".subs").html(data);
}});
    
});


$("#getReceipts").click(function(){
    var date1 = $("#date1").val();
    var date2 = $("#date2").val();
    $.ajax({ type: "POST",
        url:"/actions.php?action=report",
        data: "date1="+date1+"&date2="+date2,
        success: function(data){
            $(".subs").html(data);
        }});
    });

});




