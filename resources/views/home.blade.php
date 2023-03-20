<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Machinetest</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="">REGISTER</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/login">LOGIN</a>
            </li>
            @auth
            <li class="nav-item">
                <a class="nav-link " href="/dashboard">DASHBOARD</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/logout">LOGOUT</a>
            </li>
            @endauth
        </ul>
    </nav>
    <br>

    <div style="border:2px solid black" class="form-group">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">REGISTER</li>
            </ol>
        </nav>
        <br>
        <form action="/register" method="POST">
            @csrf
            <label for="Username">Username</label>
            <input type ="text" class="form-control" placeholder = "name" name ="name"><br>
            <label for="Useremail">Useremail</label>
            <input type ="text" class="form-control" placeholder = "email" name ="email"><br>
            <label for="Referral code">Referral code(optional)</label>
            <input type ="text" class="form-control" placeholder = "Referral code(optional)" name ="refferal_code"><br>
            <center><button class="btn btn-primary">Register</button></center>
        </form>
        <br>
    </div>
    
</body>
</html>