import addProductFunctions from './addProduct.js';

const addPageFunctions = new addProductFunctions(); 
document.addEventListener('click',(e)=>{
  if(e.target.id === 'save-button'){
    addPageFunctions.verifications();
  }
  if(e.target.id === 'cancel'){
    location.href = './index.php';
  }
})
const typeSwitcher = document.querySelector('#productType');
typeSwitcher.addEventListener('change',(e)=>{
  let container = document.querySelector('#template-container');
  container.innerHTML = addPageFunctions.showTemplate(e.target.value);
});