"use strict"

window.uvalid =false;
window.pvalid=false;

function ueMpty()
{
   var uname = document.getElementById("uname").value;
   if(uname == "")
   {  
       document.getElementById("unameMsg").innerHTML="  *field can't be empty!";
       
       window.uvalid =false;
   }

   else
   {
       window.uvalid =true;
   }  
  

   
}

function uRemover()
{
    document.getElementById('unameMsg').innerHTML = "";
    
}


function PeMpty()
{ 
    var password = document.getElementById("password").value;
    if(password=="")
    {
        document.getElementById("passMsg").innerHTML="*password field can't be empty!";
        window.pvalid=false;

    }

    
    else
    {
        window.pvalid=true;
       
    }
}

function pRemover()
{
    document.getElementById("passMsg").innerHTML="";
}
