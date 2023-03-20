<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Machinetest-  sucessful registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link " href="/dashboard">DASHBOARD</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/">REGISTER</a>
            </li>
            @auth
            <li class="nav-item">
                <a class="nav-link " href="/logout">LOGOUT</a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link " href="/login">LOGIN</a>
            </li>
            @endauth
        </ul>
    </nav>
    <br>
    <div style="border:2px solid black">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">REGISTRATION SUCCESSFULLY COMPLETED</li>
            </ol>
        </nav>
       
        <p>if you want to see admin section kindly login with admin credentials  </p>
        <p>kindly please login  <a href="/login" ><button class="btn btn-primary">LOGIN</button></a> </p>
        
        <br>
        <p><b>{{ $refferal_code }}</b> is your referral code </p>
    </div>
   
</body>
</html>