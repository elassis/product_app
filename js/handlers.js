import homeFunctions from './homePage.js';

const newHomeFunctions = new homeFunctions();

document.addEventListener('click',(e)=>{
  if(e.target.classList.contains('delete-checkbox') && e.target.checked === true){
    newHomeFunctions.addId(e.target.id);
  }
  if(e.target.classList.contains('delete-checkbox') && e.target.checked === false){
    newHomeFunctions.cancel(e.target.id);
  }
  if(e.target.classList.contains('delete-btn')){
    newHomeFunctions.deleteProduct();
  }
})