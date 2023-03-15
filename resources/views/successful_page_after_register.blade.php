<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Machinetest</title>
</head>
<body>
    <div style="border:2px solid black">
        <h1>REGISTRATION SUCCESSFULLY COMPLETED </h1><br>
        <p>if you want to see admin section kindly login with admin credentials  </p>
        <p>kindly please login  <a href="/login" ><h5>LOGIN</h5></a> </p>
        
        @php
            echo $refferal_code;
        @endphp
        <br>
        <p>This is your referral code </p>
    </div>
   
    <a href="/" ><h3>REGISTER</h3></a>
    <a href="/logout" ><h3>LOGOUT</h3></a>
</body>
</html>