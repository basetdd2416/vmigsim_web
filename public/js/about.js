$(function() {

	$(document).ajaxStart(function(){
	
    $('#loading').show();
    $('#myTabContent').hide();
 }).ajaxStop(function(){
    $('#loading').hide();
    $('#myTabContent').slideDown("slow");
 });
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    $.ajax();
    $('#myTabContent').hide();
    var target = $(e.target).attr("href") // activated tab

    
});
});