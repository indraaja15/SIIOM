<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css"> 

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script language='JavaScript'>
        var txt = "Inventaris Ormawa | Daftar ";
        var speed = 300;
        var refresh = null;

        function action() {
            document.title = txt;
            txt = txt.substring(1, txt.length) + txt.charAt(0);
            refresh = setTimeout("action()", speed);
        }
        action();
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>
<h2>Daftar User Baru</h2>

<body class="hold-transition login-page" style="background-image: url('images/background.jpg');background-size: cover">
    <img src="images/logoPoliban.png" class="rounded float-left mb-3" width="200">

    <div class="login-box">
        <div class="card" style="border-radius: 10px;">
            <div class="card-body login-card-body" style="border-radius: 100px;">
                <form action="/daftar" method="POST" style="padding : 20px" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <select name="ormawa_id" id="ormawa_id" class="form-select @error('ormawa_id') is-invalid @enderror" aria-label=".form-select- example"
                            style="width: 100%" required>
                            <option value=''>Pilih Organisasi</option>
                            @foreach ($orm as $item)
                                <option value="{{ $item->id }}">{{ $item->nm_ormawa }}</option>
                            @endforeach
                        </select>
                        @error('ormawa_id')
                        <div class="invalid-feedback">
                            {{ 'Silahkan Pilih Organisasi' }}
                        </div>
                    @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                            placeholder="Username" name="username" value="{{ old('username') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class=""></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Password" name="password">
                        <label for="password"></label>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            </div>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ 'panjang minimal password 5' }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('ulangi-password') is-invalid @enderror"
                            placeholder="Ulangi Password" name="ulangi-password">
                        <label for="ulangi-password"></label>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            </div>
                        </div>
                        @error('ulangi-password')
                            <div class="invalid-feedback">
                                {{ 'Password Tidak sama' }}
                            </div>
                        @enderror
                    </div>
                    <input type="hidden" name="hak_akses" id="hak_akses" value="user">
                    <button type="submit" class="w-100 btn bt-lg btn-primary mb-3">Daftar</button>
                    <center><small class="mt-3">Sudah Memiliki akun? <a href="/login">Login !</a></small></center>

                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->


    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>
