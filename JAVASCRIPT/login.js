var msg,i,password=true;
function check_password()
{
	var u=0,l=0,n=0,s=0,sp=0;
	msg=document.getElementById("password").value;
	for(i=0;i<msg.length;i++)
	{
		var cha=msg.charAt(i);
		if(cha.charCodeAt() >= 65 && cha.charCodeAt() <= 90)
		{
			u=u+1;
		}
		else if(cha.charCodeAt() >= 97 && cha.charCodeAt() <= 122)
		{
			l=l+1;
		}
		else if(cha.charCodeAt() >= 48 && cha.charCodeAt() <= 57)
		{
			n=n+1;
		}
		else if(cha==' ')
		{
			sp=sp+1;
		}
		else
		{
			s=s+1;
		}
	}
	if(sp==0 && u>0 && l>0 && n>0 && s>0)
	{
		document.getElementById("password").style.borderBottom="2px solid #7aff12";
		document.getElementById("alert").innerHTML="";
	}
	else if(msg=="")
	{
		document.getElementById("password").style.borderBottom="2px solid #7aff12";
		document.getElementById("alert").innerHTML="";
	}
	else
	{
		document.getElementById("password").style.borderBottom="2px solid #ff4f30";
		document.getElementById("alert").innerHTML="*Password should contain no spaces, atleast one special character, uppercase letter, lowercase letter and a number.";
	}
}
function toggle_visibility()
{
	var icon,value;
	icon=document.getElementById("material");
	value=document.getElementById("password")
	if(password)
	{
		icon.innerHTML="visibility_off";
		value.type="text";
	}
	else
	{
		icon.innerHTML="visibility";
		value.type="password";
	}
	password=!password;
}