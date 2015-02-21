$(function() {
alert('s');
$('ul.nav-pills li a').click(function (e) {
  $('ul.nav-pills li.active').removeClass('active')
  $(this).parent('li').addClass('active')
});
});