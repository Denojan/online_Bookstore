function check(){

		//Adding inputed values into variables
		var firstname= document.forms['signup']['firstname'];
		var lastname= document.forms['signup']['lastname'];
		var username= document.forms['signup']['username'];
		var email= document.forms['signup']['email'];
		var password= document.forms['signup']['password'];
		var repassword= document.forms['signup']['repassword'];
		var mobile= document.forms['signup']['mobile'];
		
		var letter=/^[a-zA-Z]*$/;
	
		//checking is there any field without values
		if(firstname.value=="" || lastname.value=="" || username.value=="" || email.value=="" || password.value=="" || repassword.value=="" || mobile.value=="")
		{
			alert("You did not fill all the fields.");
			return false;
		}
	
		//checking the required number of letters in first name
		if(firstname.value.length<4)
		{
			alert("First Name must be atleast 4 letters.");
			return false;
		}
		
		//checking whether first name is only in alphabets
		if(!firstname.value.match(letter))
		{
			alert("First Name must contain only alphabets.");
			return false;
		}
		
		//checking the required number of letters in last name
		if(lastname.value.length<4)
		{
			alert("Last Name must be atleast 4 letters.");
			return false;
		}
		
		//checking whether last name is only in alphabets
		if(!firstname.value.match(letter))
		{
			alert("Last Name must contain only alphabets.");
			return false;
		}
	
		//checking the password matching
		var pass = password.value;
		var cpass = repassword.value;

		if(pass!=cpass){	
			alert('Password mismatch');
			return false;
		}
	
}