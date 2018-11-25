var firstname=false;
var lastname=false;
var useremail=false;
var password=false;
var confirm_password=false;
var check_confirm=false;
var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
var password_reg= /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/; 
var temp;
function validate(field)
{
  

  if(field=='firstname')
      {
        if(document.getElementById("firstname").value=="")
        {
          document.getElementById("error_firstname").style.display="block";
          firstname=false;
        } 
        else
        {
          document.getElementById("error_firstname").style.display="none";
          firstname=true;
        } 
      } 

      else if(field=='lastname')
      {
        if(document.getElementById("lastname").value=="")
        {
          document.getElementById("error_lastname").style.display="block";
          lastname=false;
        } 
        else
        {
          document.getElementById("error_lastname").style.display="none";
          lastname=true;
        } 
      }

      else if(field=='useremail')
      {
        
        temp=document.getElementById("email").value;
        temp=re.test(String(temp).toLowerCase());
      
        if((temp=="")||(temp==false))
        {
          document.getElementById("error_email").style.display="block";
          useremail=false;
        } 
      
        else
        {
          document.getElementById("error_email").style.display="none";
          useremail=true;
        } 
      }
      
      else if(field=='password')
      {
        
        temp=document.getElementById("pwd").value;
        temp=password_reg.test(temp);
      
        if((temp=="")||(temp==false))
        {
          document.getElementById("error_password").style.display="block";
          password=false;
        } 
      
        else
        {
          document.getElementById("error_password").style.display="none";
          password=true;
        }
      
        if((temp!=document.getElementById("c_pwd").value)&&(check_confirm==true))  
        {
          document.getElementById("error_confirmpassword").style.display="block";
          confirm_password=false;
        } 
      
        else
        {
          document.getElementById("error_confirmpassword").style.display="none";
          confirm_password=true;  
        } 
          
      }
      
      else if(field=='confirm_password')
      {
        
        temp=document.getElementById("c_pwd").value;
        
        if((temp=="")||(temp!=document.getElementById("pwd").value))
        {
          document.getElementById("error_confirmpassword").style.display="block";
          confirm_password=false;
        } 
        else
        {
          document.getElementById("error_confirmpassword").style.display="none";
          confirm_password=true;
        } 
      }
      if((firstname==true)&&(lastname==true)&&(useremail==true)&&(password==true)&&(confirm_password==true))
      {
        document.getElementById("form_button").disabled=false;
      } 
      else
      {
        document.getElementById("form_button").disabled=true;
      } 
    }
    function cheking() {
      check_confirm=true;
    }
    function form_send() 
    {
      //console.log("good");
      $("form").submit();
      alert("good");
    }