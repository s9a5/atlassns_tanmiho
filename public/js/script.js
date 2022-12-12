// $(function () { // if document is ready
//   alert('hello world')
// });
$('.menu-btn').click(function () {
  $(this).toggleClass('is-open');
  $(this).siblings('.menu').toggleClass('is-open');
});
