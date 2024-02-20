@include('layout.navpetugas')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      body{
    background-image: url('../image/bg5.jpg');
    background-repeat: no-repeat;
    background-size: cover;
}
        input {
            border : 1px solid black !important;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
  <body class="align">
<h1 style="text-align: center; margin-top: 50px; font-weight:bold;">Tambahkan akun petugas</h1>
    <div class="grid container mb-5 register">
  
      <div class="card container mt-5 shadow-lg" style="width: 50%; ">
      <form method="POST" action="" class="container mt-3">
        @csrf
        @method('POST')
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label" @required(true)>Nama Lengkap</label>
          <input type="text" class="form-control" name="NamaLengkap" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label" @required(true)>Username</label>
          <input type="text" class="form-control" name="Username" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label" @required(true)>Password</label>
          <input type="password" class="form-control" name="Password" id="exampleInputall1">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label" @required(true)>Email</label>
          <input type="email" class="form-control" name="Email" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label" @required(true)>Alamat</label>
          <input type="text" class="form-control" name="Alamat" id="exampleInputPassword1">
        </div>
        <center><button type="submit" name="submit" class="btn btn-primary mb-3">Buat Akun</button></center>
      </form>
      </div>
    </div>
    <script>
      // Menanggapi pesan flash dari Laravel
      var errorMessage = '{{ session('error') }}';
      if (errorMessage) {
          Swal.fire({
              icon: 'error',
              title: 'Error',
              text: errorMessage,
          });
      }

      var successMessage = '{{ session('message') }}';
      if (successMessage) {
          Swal.fire({
              icon: 'success',
              title: 'Success',
              text: successMessage,
          });
      }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</html>
