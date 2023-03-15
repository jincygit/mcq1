<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Machinetest</title>
</head>
<body>
    <div style="border:2px solid black">
        @if(!empty(session('useremail')))
            <h1>{{ session('useremail')}}  LOGIN SUCCESSFULLY COMPLETED </h1>
            {{-- restrict users list section , only logged admin can see users list details --}}
            @if(session('useremail')=="admin@gmail.com")   
                <a href="/get_users" ><h3>GET USERS</h3></a>
            @else 
                <p>if you want to see admin section, kindly login with admin credentials  </p>
                <p>kindly please login  <a href="/login" ><h5>LOGIN</h5></a> </p>
            @endif
        @else  
            <p>kindly please login  <a href="/login" ><h5>LOGIN</h5></a> </p><br>
        @endif  
    </div>
    
   
   
   <a href="/" ><h3>REGISTER</h3></a>
   <a href="/logout" ><h3>LOGOUT</h3></a>
</body>
</html>