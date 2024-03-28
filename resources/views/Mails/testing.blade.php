
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
      <h1>You have been successfully registered</h1>
     
       <p>Hello {{ $details->fullname}}</p>
       <p>Your Email ID is {{ $details->email}}</p>
       <p> Your Password is {{ $password}}</p>

       <a href="http://127.0.0.1:8000/login" >click here to login</a>
    
    
</body>
</html>
