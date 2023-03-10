<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Machinetest</title>
</head>
<body>
    <div style="border:2px solid black">
        <h1>REGISTER </h1>
        <form action="/register" method="POST">
            @csrf
            <input type ="text" placeholder = "name" name ="name">
            <input type ="text" placeholder = "email" name ="email">
            <input type ="text" placeholder = "Referral code(optional)" name ="refferal_code">
            <button>Register</button>
        </form>
    </div>
   <a href="/get_users" ><h1>GET USERS</h1></a>
</body>
</html>