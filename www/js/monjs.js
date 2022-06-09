function valider(){
	//<[CDATA[
	if(document.frm.password.value == document.frm.confi_password.value){
		return true;

	}else{

		alert ('les deux mot de passe ne sont pas identiques');
		return false;

	}
}
//]]>
function valider_number(){
	//<[CDATA[
	if(document.frm_a.number.value == document.frm_a.number2.value){
		return true;

	}else{

		alert ('les deux numéros ne sont pas identiques');
		return false;

	}
}


//]]>