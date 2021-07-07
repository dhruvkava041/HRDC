<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> HRDC | Login </title>
    <link rel="stylesheet" href="loginstyle.css">
  </head>
  <body>
    <div class="center">
      <h1>HRDC</h1>
      <form name="f1" action="authentication.php" onsubmit = "return validation()" method="post">
        <div class="txt_field">
          <input type="text" name="username" id="username" required>
          
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" id="password" required>
          
          <label>Password</label>
        </div>

      
        <input type="submit" id="btn" value="Login">

           </form>
    </div>
    <script>  
            function validation()  
            {  
                var id=document.f1.user.value;  
                var ps=document.f1.pass.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("User Name and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("User Name is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }  
        </script>  
  </body>
</html>
