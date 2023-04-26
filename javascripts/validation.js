function contact_validation(){
   	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
  	if(document.getElementById('name').value==0){
			alert("Enter name");
			document.getElementById('name').focus();
			return false;
		}
		if(document.getElementById('email').value==0){
			alert("Enter email");
			document.getElementById('email').focus();
			return false;
		}
		 if(reg.test(document.getElementById('email').value) == false) {
	 
		  alert('Enter valid Email Address');
		  document.getElementById('email').value="";
		  document.getElementById('email').focus();
		  return false;
	   }
		
		if(document.getElementById('message').value==0){
			alert("Enter Message");
			document.getElementById('message').focus();
			return false;
		}
  }
  function newsletter_validation(){
		 var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
  		 var address = document.getElementById('nemail').value;
		 if(document.getElementById('title').value==0 || document.getElementById('title').value=='Enter your name'){
			alert("Enter name");
			document.getElementById('title').focus();
			return false;
		}
		if(document.getElementById('nemail').value==0){
			alert("Enter email");
			document.getElementById('nemail').focus();
			return false;
		}
	   if(reg.test(address) == false) {
	 
		  alert('Enter valid Email Address');
		  document.getElementById('nemail').value="";
		  document.getElementById('nemail').focus();
		  return false;
	   }
	}
// JavaScript Document