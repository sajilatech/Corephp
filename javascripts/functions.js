
function confirmDelete(){
	var ans=confirm("Do you want to Delete this item?");
	if(ans==true){
		return true;
	}
	else{
		return false;	
	}
	
}
function show_message(msn){
		alert(msn); 
		return false;
	}
function cancelAction(){
	history.go(-1);
}
 function login_validation(){
	if(document.getElementById('login_username').value==''){
		alert("Enter username");
		document.getElementById('login_username').focus();
		return false;
	}
	if(document.getElementById('login_password').value==''){
		alert("Enter password");
		document.getElementById('login_password').focus();
		return false;
	}
	if(document.getElementById('login_username').value=='Enter User Name'){
		alert("Enter username");
		document.getElementById('login_username').focus();
		return false;
	}
	if(document.getElementById('login_password').value=='Enter password'){
		alert("Enter password");
		document.getElementById('login_password').focus();
		return false;
	}
	
}

// JavaScript Document