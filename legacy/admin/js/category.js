
let cateMakeBtn = document.querySelectorAll('.cate_make_btn');
let cateMakeBtn_middle = cateMakeBtn[0];
let cateMakeBtn_small = cateMakeBtn[1];

let cateCssModal = document.querySelectorAll('.cate_css_modal');
let cateModal_middle = cateCssModal[0];
let cateModal_small = cateCssModal[1];

let closeModalBtn = document.querySelectorAll('.modal_footer .cate_modal_close');
let closeModal_middle = closeModalBtn[0];
let closeModal_small = closeModalBtn[1]

cateMakeBtn_middle.addEventListener('click', function(){
  cateModal_middle.classList.add('visible');
})
cateMakeBtn_small.addEventListener('click', function(){
  cateModal_small.classList.add('visible');
})

closeModal_middle.addEventListener('click', function(){
  cateModal_middle.classList.remove('visible');
})
closeModal_small.addEventListener('click', function(){
  cateModal_small.classList.remove('visible');
})

cateModal_middle.addEventListener('click', function(e){
  if(e.target == e.currentTarget){
    cateModal_middle.classList.remove('visible');
  } 
})

cateModal_small.addEventListener('click', function(e){
  if(e.target == e.currentTarget){
    cateModal_small.classList.remove('visible');
  }
})

