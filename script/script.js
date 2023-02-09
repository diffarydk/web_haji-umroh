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
const checkContent = document.querySelector('.passport');
const passportYes = document.querySelector('#yes');
const passportNo = document.querySelector('#no');

passportYes.addEventListener('click', function() {
  checkContent.classList.add('display-block');
  checkContent.classList.remove('display-none');
});

passportNo.addEventListener('click', function() {
  checkContent.classList.add('display-none');
  checkContent.classList.remove('display-block');
});
};
