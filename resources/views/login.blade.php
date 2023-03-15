<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Machinetest</title>
</head>
<body>
    <div style="border:2px solid black">
        <h1>LOGIN </h1>
        <form action="/login" method="POST">
            @csrf
            <input type ="text" placeholder = "name" name ="name">
            {{-- password is not included because it is not mention in given input data in question, so login using namme and email --}}
            <input type ="text" placeholder = "email" name ="email">
            <button>Login</button>
        </form>
    </div>

    <p>if you want to see admin section, kindly login with admin credentials  </p>
    <p>kindly please login  <a href="/login" ><h5>LOGIN</h5></a> </p>
    <a href="/" ><h5>REGISTER</h5></a>
    <a href="/logout" ><h3>LOGOUT</h3></a>

    

</body>
</html>