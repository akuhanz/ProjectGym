<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- link bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{-- link css --}}
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('LTE/dist/icon/css/all.min.css')}}">

    <title>Register</title>
</head>
<body>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">
                    <img src="{{ asset('storage/images/VIm.jpeg')}}" alt="image">
                    <div class="text">
                        <p>Selamat datang! silahkan Masuk atau daftar untuk memulai GYM anda.</p>
                    </div>
                </div>
                <div class="col-md-6 right">
                    <form method="POST" action="{{ route('register-proses')}}">
                        @csrf
                        <div class="input-box">
                            <header>DAFTAR</header>
                            <div class="input-field">
                                <input type="text" class="input" name="name" value="{{ old('name') }}" id="name" required autocomplete="name">
                                <label for="name">username</label>
                            </div>
                            <div class="input-field">
                                <input type="text" class="input" name="email" value="{{ old('email') }}" id="email" required autocomplete="email">
                                <label for="email">email</label>
                            </div>
                            <div class="input-field">
                                <input type="password" class="input" {{ old('password') }} name="password" id="password" required>
                                <label for="password">password</label>
                                <span id="togglePassword" class="toggle-password">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </span>
                                @error('password')
                                    <small class="error-message">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="input-field">
                                <input type="password" class="input" name="password_confirmation" id="password_confirmation" required>
                                <label for="password">Confirm Password</label>
                                <span id="toggleConfirmPassword" class="toggle-password">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="input-field">
                                <input type="submit" class="submit" name="submit" value="Daftar" >
                            </div>
                            <div class="sign-in">
                                <span>Silahkan Kembali ke halaman <a href="{{ route('login')}}">Masuk</a> </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
       const togglePassword = document.getElementById('togglePassword');
       const password = document.getElementById('password');

       togglePassword.addEventListener('click', function () {
           const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
           password.setAttribute('type', type);

           // Toggle the icon
           this.querySelector('i').classList.toggle('fa-eye');
           this.querySelector('i').classList.toggle('fa-eye-slash');
       });

       // Monitor input field to keep the icon visible when it has content
       password.addEventListener('input', function () {
           if (password.value.length > 0) {
               togglePassword.style.opacity = '1';
           } else {
               togglePassword.style.opacity = '0';
           }
       });

       const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
            const confirmPassword = document.getElementById('password_confirmation');

            toggleConfirmPassword.addEventListener('click', function () {
                const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
                confirmPassword.setAttribute('type', type);

                // Toggle the icon
                this.querySelector('i').classList.toggle('fa-eye');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });

            // Monitor input field to keep the icon visible when it has content
            confirmPassword.addEventListener('input', function () {
                if (confirmPassword.value.length > 0) {
                    toggleConfirmPassword.style.opacity = '1';
                } else {
                    toggleConfirmPassword.style.opacity = '0';
                }
            });
   });
   </script>
</body>
</html>