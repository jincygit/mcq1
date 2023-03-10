<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Machinetest</title>
</head>
<body>
    <div style="border:2px solid black">
        <h1>LOGIN SUCCESSFULLY COMPLETED </h1><br>
        @php
            print_r($_SESSION['useremail']);
        @endphp
        <br>
        <p>This is your referral code </p>
        
    </div>
   <a href="/get_users" ><h3>GET USERS</h3></a>
   <a href="/" ><h3>REGISTER</h3></a>
   <a href="/logout" ><h3>LOGOUT</h3></a>
</body>
</html>