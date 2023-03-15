<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="border:2px solid black">
        {{-- restrict users list section , only logged admin can see users list details --}}
        @if(session('useremail')=="admin@gmail.com")   
            <h1>LIST USERS </h1>
            <table border="1">
                <tr>
                    <th>Level</th>
                    <th>Points</th>
                </tr>
                @foreach ($user_data as $user)
                    <tr>
                    <td>Level {{$user['user_id']}} </td>
                    <td>{{$user['points']}} </td>
                    </tr>
                @endforeach
            </table>
        @else  
            <p>if you want to see admin section, kindly login with admin credentials  </p>
            <p>kindly please login  <a href="/login" ><h5>LOGIN</h5></a> </p>
        @endif
        
    </div>
   <a href="/" ><h1>REGISTER</h1></a>
   <a href="/logout" ><h3>LOGOUT</h3></a>
   <a href="/login" ><h3>LOGIN</h3></a>
    

</body>
</html>