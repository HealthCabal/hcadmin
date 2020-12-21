function _(id){
	return document.getElementById(id);
}
function loginUser(){
    event.preventDefault();
    _("loginbtn").disabled = true;
    _("loginInfo").innerHTML = "Checking for your account . . .";
    var loginData = new FormData();
    loginData.append("phone", _("phone").value);
    loginData.append("password", _("password").value);
    var ajax = new XMLHttpRequest();
    ajax.open("POST", "modules/runlogin.php");
    ajax.onreadystatechange = function(){
        if(ajax.readyState == 4 && ajax.status == 200){
            if(ajax.responseText !== "usernameerror"){
                var ajaxFeedback = ajax.responseText;
                //alert(ajax.responseText);
                _("loginInfo").innerHTML = "Login successful!";
                window.location.assign("newarticle.php");
               //setTimeout(redirectUser, 2000)
                
            }else{
                var ajaxFeedback = ajax.responseText;
              _("loginInfo").innerHTML = "Login failed! Check phone number and password"
              _("loginbtn").disabled = false;
              //window.alert("We couldn't find your account."); 
            }
        }
    }
    ajax.send(loginData);
}