window.onload = function(){
const menu_btn= document.querySelector('.hamburger');
const side_bar = document.querySelector('.sidebar'); 

menu_btn.addEventListener('click', function () {
  menu_btn.classList.toggle('is-active');
  side_bar.classList.toggle('active');
});
const collapseBtn = document.querySelector('.collapse-btn');
const collapseContent = document.querySelector('.collapse-content');

collapseBtn.addEventListener('click', function() {
  collapseContent.style.display = (collapseContent.style.display === 'block') ? 'none' : 'block';
  this.classList.toggle('active');
});
$('.collapse-btn').click(function() {
  $('.collapse-content').slideToggle();
  $(this).toggleClass('active');
});
};