class addProductFunctions {
  template = '';

  verifications(){
    
    function displayMssg(mssg){
      let container = document.querySelector('.notification');
      container.classList.remove('hidden');
      container.innerHTML = mssg;
      setTimeout(()=>{
        container.classList.add('hidden');
      },3000);
    }
    //verify that there's no empty inputs
    function verifyInputs(){
      const inputs = document.querySelectorAll('.form-control');
      let response = true;
      inputs.forEach((e)=>{
        if(e.value === ""){
          displayMssg('Please submit required data.');
          response = false;
        }
      });
      return response;
    }
    //verify name correct format
    function verifyName(){
      let nameInput = document.querySelector('#name').value;
      if(nameInput.match(/[0-9]/g)){ 
        displayMssg('Name should only have text.');
        return false;
      }
      return true;
    }
    //verify that product type is selected
    function verifyProductype(){
      const productType = document.querySelector('#productType').value; 
      if(productType === 'ts'){
        displayMssg('Please, select product type.');
        return false;
      }
      return true;
    }
    if(verifyName() && verifyProductype() && verifyInputs()) this.save(); 
  }

  showTemplate(type){
    if (type === 'book'){
      const bookTemplate = `
          <div class="mb-3 product-input">
            <label for="exampleInputPassword1" class="form-label">Weight (KG)*</label>
            <input type="number" class="form-control" id="weight">
          </div>
          <p class="description">Please Provide weight</p>`;
      this.template = bookTemplate;
      return this.template;
    }

    if (type === 'dvd'){
      const dvdTemplate = `
          <div class="mb-3 product-input">
            <label for="exampleInputPassword1" class="form-label">Size (MB)*</label>
            <input type="number" class="form-control" id="size">
          </div>
          <p class="description">Please Provide Size</p>`;
      this.template = dvdTemplate;
      return this.template;
    }

    if (type === 'forniture'){
      const fTemplate = `
        <div class="row product-input">
          <div class="col">
            <label for="exampleInputPassword1" class="form-label">Height (CM)*</label>
            <input type="number" class="form-control" id="height">
          </div>
          <div class="col">
            <label for="exampleInputPassword1" class="form-label">Width (CM)*</label>
            <input type="number" class="form-control" id="width">
          </div>
          <div class="col">
            <label for="exampleInputPassword1" class="form-label">Length (CM)*</label>
            <input type="number" class="form-control" id="length">
          </div>
        </div>
        <p class="description">Please Provide dimensions</p>`;
      this.template = fTemplate;
      return this.template;
    } 
  }

  save(){
    const type = document.querySelector('#productType').value;
    if(type === 'book'){
      const bookObj = {
        sku: document.querySelector('#sku').value,
        name: document.querySelector('#name').value,
        price: document.querySelector('#price').value,
        weight: document.querySelector('#weight').value,
        type: type,
      }
      this.sendToApi(bookObj);
    }
    if(type === 'dvd'){
      const dvdObj = {
        sku: document.querySelector('#sku').value,
        name: document.querySelector('#name').value,
        price: document.querySelector('#price').value,
        size: document.querySelector('#size').value,
        type: type,
      }
      this.sendToApi(dvdObj);
    }
    if(type === 'forniture'){
      const forObj = {
        sku: document.querySelector('#sku').value,
        name: document.querySelector('#name').value,
        price: document.querySelector('#price').value,
        height: document.querySelector('#height').value,
        width: document.querySelector('#width').value,
        length: document.querySelector('#length').value,
        type: type,
      }
      this.sendToApi(forObj);
    }
  }

  sendToApi(obj){
    $.ajax({
      url:'http://localhost/products_app/api/create.php',
      method:'post',
      data:{product: obj},
      success:(resp)=>{
        if(resp === 'OK') location.href='./index.php';
      }
    })
  }
}

export default addProductFunctions;