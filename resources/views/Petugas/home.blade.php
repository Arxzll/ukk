@include('layout.navpetugas')
@section('content')
@endsection

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="/assets/css/style.css" rel="stylesheet">
    <style>
    body{
        background-color:rgb(255, 255, 255);
        .row {
    --bs-gutter-x: 0;
    --bs-gutter-y: 0;
    display: flex;  
    flex-wrap: wrap;
    margin-top: calc(var(--bs-gutter-y)* -1);
    margin-right: calc(var(--bs-gutter-x)* -.5);
    margin-left: calc(var(--bs-gutter-x)* -.5);
}
.footer {
    background-color: #211C6A;
    color: #fff;
    padding: 20px 0;
    bottom: 0;
    width: 100%;
    box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.5);
    margin-top: 20%;
}

.footer p {
    margin-bottom: 5px;
}
  }
      
    </style>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <<div class="container" style="margin-top: 150px; background-color: #fff; padding:20px 30px">
      <div class="row">
        <div class="col-lg-7 col-md-8 col-sm-12 mx-auto mt-4" style="color: black">
          <h1 >Selamat datang di Perpustakaan Indonesia</h1>
          <h5 >Selamat datang di Perpustakaan Indonesia, tempat di mana pintu pengetahuan selalu terbuka untuk Anda! Mari jelajahi koleksi kami yang kaya dan beragam, dari buku-buku terkini hingga klasik. Temukan dunia literasi tanpa batas dan tingkatkan wawasan Anda di setiap halaman. Mulailah petualangan membaca Anda sekarang, dan mari bersama-sama mengeksplorasi keajaiban dunia tulisan!</h5>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-12 text-right">
          <img src="/image/1233.jpg" alt="Footer Image" style="max-width: 400px; height: auto">
      </div>
    </div>
    </div>

   
    <footer class="footer">
      <div class="container">
          <div class="row">
              <div class="col-6">
                  <h5>Alamat Perpustakaan</h5>
                  <p>Jl. Kesayang Papahmu No. 11</p>
                  <p>Karawang</p>
              </div>
              <div class="col-6">
                  <h5>Kontak</h5>
                  <p>Email: PerpustakaanIndonesia@gmail.com</p>
                  <p>Telepon: (62) 51-6113-2690</p>
              </div>
              <!-- Tambahkan kolom untuk gambar di pojok kanan footer -->
          </div>
          <hr>
          <div class="row">
              <div class="col-md-12 text-center">
                  <p>&copy; 2024 Perpustakaan Indonesia. All rights reserved.</p>
              </div>
          </div>
      </div>
    </footer>
</body>
<script>
  @if(session('success'))
      const Toast = Swal.mixin({
          toast: true,
          position: "top-end",
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
              toast.onmouseenter = Swal.stopTimer;
              toast.onmouseleave = Swal.resumeTimer;
          }
      });
      Toast.fire({
          icon: "success",
          title: "{{ session('success') }}"
      });
  @elseif(session('error'))
      Swal.fire({
          icon: 'error',
          title: 'Error',
          text: '{{ session('error') }}',
          timer: 3000,
          showConfirmButton: false
      });
  @endif
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="/assets/plugins/common/common.min.js"></script>
<script src="/assets/js/custom.min.js"></script>
<script src="/assets/js/settings.js"></script>
<script src="/assets/js/gleek.js"></script>
<script src="/assets/js/styleSwitcher.js"></script>
</html>

