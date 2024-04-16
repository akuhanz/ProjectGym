<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- link bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{-- link css --}}
    <link href="{{ asset('css/adminlogin.css') }}" rel="stylesheet">

    <title>Login Admin</title>
</head>
<body>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">
                    <img src="https://cdn-sdotid.adg.id/images/37d92b52-78e4-465f-87d2-4cac0f9476af_564x564.webp.jpeg" alt="image">
                    <div class="text">
                        <p>Masukan Akun Anda untuk mengelola data</p>
                    </div>
                </div>
                <div class="col-md-6 right">
                    <div class="input-box">
                        <header>SIGN IN ADMIN</header>
                        <div class="input-field">
                            <input type="text" class="input" name="email" id="email" required autocomplete="off">
                            <label for="email">email</label>
                        </div>
                        <div class="input-field">
                            <input type="password" class="input" name="password" id="password" required >
                            <label for="password">password</label>
                        </div>
                        <div class="input-field">
                            <input type="submit" class="submit" value="Sign in" >
                        </div>
                        <div class="warning">
                            <span>Anda hanya bisa login jika memiliki akun Admin, <a href="#">kembali Login Users</a> </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>