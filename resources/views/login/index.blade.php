<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ url('images/icontab.png') }}">
    {{-- script title bergerak --}}
    <script language='JavaScript'>
        var txt = "Inventaris Ormawa | Login ";
        var speed = 300;
        var refresh = null;

        function action() {
            document.title = txt;
            txt = txt.substring(1, txt.length) + txt.charAt(0);
            refresh = setTimeout("action()", speed);
        }
        action();
    </script>
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('') }}asset/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    
</head>

<body class="hold-transition login-page" style="background-image: url('images/background.jpg');background-size: 1650px">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <h3>SISTEM INFORMASI INVENTARIS ORGANISASI MAHASISWA</h3>
    <img src="images/logoPoliban.png" class="rounded float-left mb-3" width="200">

    <div class="login-box ">
        <div class="card " style="border-radius: 10px;">
            <div class="card-body login-card-body " style="border-radius: 100px;">
                
                <form action="/login" method="post" style="padding : 10px">
                    @csrf
                    <center>
                        
                        <h2 class="text-center mb-3">LOGIN</h2>
                    </center>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                            placeholder="Username" name="username" autofocus required value="{{ old('username') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="w-100 btn bt-lg btn-primary mb-3">Login</button>
                    <center><small>Belum punya akun? <a href="/daftar">Daftar Sekarang!</a></small></center>
                    <!-- /.col -->

                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
        
    </div>
    <!-- /.login-box -->


    <!-- AdminLTE App -->

    <script src="{{ asset('') }}assets/dist/js/adminlte.min.js"></script>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

</html>
