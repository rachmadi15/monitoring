<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ICLE | Register</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">


    
    <!-- Custom styles for this template -->
    <link href="/css/login.css" rel="stylesheet">
  </head>
  <body>
    
<main class="form-signin w-100 m-auto">

      <p class="text-center fs-2 fw-bold mb-4">Halaman <span class="text-danger">Registrasi</span></p>
      <div class="card">
        <div class="card-body">
          <form action="/store" method="post">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Nama</label>
              <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name">
            </div>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
            </div>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
            </div>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <p class="mt-2 text-center">Sudah Memiliki Akun ? <a href="/">Klik Disini</a></p>
            <button type="submit" class="btn btn-danger" style="width: 100%;">DAFTAR</button>
          </form>
          <p class="mt-5 mb-3 text-muted text-center">&copy; ICLE</p>
        </div>
      </div>
</main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    
  </body>
</html>
