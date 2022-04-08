 class homeFunctions {
  array = [];

  addId(id){
    this.array.push(id);
  }

  deleteProduct(){
      //get all the elements
    let checkboxes = document.querySelectorAll('.delete-checkbox');
    checkboxes.forEach((e)=>{
      //check if each element is checked and add it to array
      if (e.checked === true)this.array.push(e.id);
    });
    
    if(this.array.length > 0){
      $.ajax({
        url:'https://enmanuellassisproductapp.000webhostapp.com/api/delete.php',
        method:'post',
        data:{element_delete:this.array},
        success:(resp)=>{
          if(resp === 'OK') location.reload();
        }
      });
    }
  }
}

export default homeFunctions;