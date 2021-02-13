class Notification{

	success(){

		new Noty({
    type: 'success',
    layout: 'topRight',
    text: 'Successfully Done!',
    timeout: 2000,
		}).show();
	
			}

	alert(){

		new Noty({
    type: 'alert',
    layout: 'topRight',
    text: 'Are You Sure?',
    timeout: 2000,
		}).show();
	
			}

	error(){

		new Noty({
    type: 'alert',
    layout: 'topRight',
    text: 'Something Went Wrong !',
    timeout: 2000,
		}).show();
	
			}

	warning(){

		new Noty({
    type: 'warning',
    layout: 'topRight',
    text: 'Oops Wrong !',
    timeout: 2000,
		}).show();
	
			}

	image_validation(){

		new Noty({
    type: 'error',
    layout: 'topRight',
    text: 'Upload Image Size Max: 1MB',
    timeout: 2000,
		}).show();
	
      }
      
      cart_success(){
        new Noty({
        type: 'success',
        layout: 'topRight',
        text: 'Successfully Add to Cart!',
        timeout: 1000,
           }).show();
      } 
    
    
       cart_delete(){
        new Noty({
        type: 'success',
        layout: 'topRight',
        text: 'Successfully Cart Deleted!',
        timeout: 1000,
           }).show();
      } 





}

export default Notification = new Notification()