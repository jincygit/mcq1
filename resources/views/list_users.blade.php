<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="border:2px solid black">
        <h1>LIST USERS </h1>
        
        <table border="1">
            <th>Level</th>
            <th>Points</th>

        @foreach ($user_data as $user)
        <tr>
        <td>Level {{$user['user_id']}} </td>
        <td>{{$user['points']}} </td>
        </tr>
        @endforeach
        
    </div>
   <a href="/" ><h1>BACK</h1></a>
    

</body>
</html>