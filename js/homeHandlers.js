import homeFunctions from './homePage.js';

const HomeFunctions = new homeFunctions();

document.addEventListener('click',(e)=>{
  if(e.target.classList.contains('delete-checkbox') && e.target.checked === true){
    HomeFunctions.addId(e.target.id);
  }
//   if(e.target.classList.contains('delete-checkbox') && e.target.checked === false){
//     HomeFunctions.cancel(e.target.id);
//   }
  if(e.target.innerText === 'MASS DELETE'){
    HomeFunctions.deleteProduct();
  }
  if(e.target.id === 'save-button'){
    newProductFunctions.save();
  }
});