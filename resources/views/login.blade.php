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
            {{-- password is not included because it is not mention in given input data, so login using namme and email --}}
            <input type ="text" placeholder = "email" name ="email">
            <button>login</button>
        </form>
    </div>
   <a href="/get_users" ><h1>GET USERS</h1></a>
</body>
</html>