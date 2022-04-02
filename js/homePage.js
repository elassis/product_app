 class homeFunctions {
  array = [];

  addId(id){
    this.array.push(id);
  }

  deleteProduct(){
    if(this.array.length > 0){
      $.ajax({
        url:'http://localhost/products_app/api/delete.php',
        method:'post',
        data:{element_delete:this.array},
        success:(resp)=>{
          if(resp === 'OK') location.reload();
        }
      });
    }
  }
//function to cancel removing of element
  cancel(id){
    let index = this.array.indexOf(id);
    this.array.splice(index, 1);
  }
}

export default homeFunctions;