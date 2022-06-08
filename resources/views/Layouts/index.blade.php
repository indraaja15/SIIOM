<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Inventarsi Organisasi Mahasiswa</title>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">SIIOM</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../peminjaman">Peminjaman</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../barang">Barang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../ormawa">Ormawa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../kategori">Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../userOrmawa">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../about">About</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

<body>
    <div class="container mt-4">
        @yield('content')
    </div>
</body>

</html>
