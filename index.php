<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <img src="img/MI_legenda.png" class="img-fluid" alt="...">
        <form action="functions/login.php" method="POST">
            <div class="form-floating mb-3">
                <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input name="password" type="password" class="form-control" id="floatingPassword"
                    placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-dark" type="submit" style="margin-top: 20px;">Login</button>
                <!-- Button Trigger Register Modal -->
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Register
                </button>
            </div>
        </form>
    </div>


    
</body>

</html>