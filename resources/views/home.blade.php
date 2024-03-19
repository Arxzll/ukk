@include('layout.navbar')
@section('content')
@endsection

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan Indonesia</title>
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
    margin-top: 30px;
}

.footer p {
    margin-bottom: 5px;
}
  }
      .card{
        width: 200px;
      }
      .card-img-top { 
        height: 188px;
        filter: brightness(100%);
        transition: filter 0.2s ease-in-out;
      }
    
      .card:hover .card-img-top {
        filter: brightness(60%);
      }
      .role{
        overflow-x: scroll;
        width: 100%;
      }
      .carousel-item img {
            width: 100%;
            height: auto;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  <div id="carouselExampleDark" class="carousel carousel-dark slide carousel-fluid" data-bs-ride="carousel" style="margin-top: 75px;">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="5000">
            <img class="d-block w-100 img-fluid" src="/image/img1.png" alt="First slide">
            <div class="carousel-caption d-none d-md-block"></div>
        </div>
        <div class="carousel-item" data-bs-interval="5000">
            <img class="d-block w-100 img-fluid" src="/image/img2.png" alt="Second slide">
            <div class="carousel-caption d-none d-md-block"></div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

   
<section>  
  <div class=" d-flex " style="margin-top: 3px; background-color: #fff;padding:20px 2;">
   
      <div class="col-7 mx-5 mt-4" style="color: black">
          <h1 >Selamat datang di Perpustakaan Indonesia</h1>
          <h5 >Selamat datang di Perpustakaan Indonesia, tempat di mana pintu pengetahuan selalu terbuka untuk Anda! Mari jelajahi koleksi kami yang kaya dan beragam, dari buku-buku terkini hingga klasik. Temukan dunia literasi tanpa batas dan tingkatkan wawasan Anda di setiap halaman. Mulailah petualangan membaca Anda sekarang, dan mari bersama-sama mengeksplorasi keajaiban dunia tulisan!</h5>
      </div>
      <div class="col-3 text-right">
        <img src="image/1233.jpg" alt="Footer Image" style="max-width: 400px; height: auto">
    </div>
 
  </div>
  {{-- <form class="d-flex justify-content-center " role="search" action="" method="get">
        <input style="width: 20%;" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
       --}}
       <br>
       
       <div class="d-flex justify-content-center mt-3 mb-3">
         <h1 class="mx-1 text-primary font-weight-bold">Buku</h1>
         <h1 class="mx-1 font-weight-bold" style="color: darkblue">Perpustakaan</h1>
         <h1 class="mx-1 text-success font-weight-bold">Indonesia</h1>
        </div>
        
        <form class="d-flex justify-content-center " role="search" action="pencarian" method="get">
         {{-- @csrf --}}
         {{-- @method("GET") --}}
         <input style="width: 30%;" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q">
         <button class="btn btn-outline-primary" type="submit">Search</button>
       </form>
        

      <div class="container">
    <div class="title dark" style="margin-left: 10px;margin-top:5px;" >
          <h2 class="ms-2">Novel</h2>
    </div>
  
      <div class="row" style="margin-left: 0;"> <!-- Tambahkan gaya langsung di sini --> 
        @foreach($buku as $b)
          @if($b->NamaKategori=='Novel')
            <div class="card ms-3 shadow" style="width: 10rem; margin:5px">
              <a href="detail_buku/{{$b->Judul}}" itemprop="url">
                <img src="/image/{{$b->Foto}}" class="card-img-top" alt="...">
              </a>
              <div class="card-body">
                <h6 class="card-title">{{ $b->Judul}}</h6>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>

    <div class="container">
 <div class="title dark" style="margin-left: 10px;margin-top:5px;" >
    <h2 class="ms-2">Komik</h2>
</div>

  <div class="row "> 
  @foreach($buku as $b)
  @if($b->NamaKategori=='Komik')
<div class="card ms-3 shadow" style="width: 10rem; margin:5px">
    <a href="detail_buku/{{$b->Judul}}" itemprop="url">
      <img src="/image/{{$b->Foto}}" class="card-img-top" alt="...">
    </a>
    <div class="card-body">
      <h6 class="card-title">{{ $b->Judul}}</h6>
    </div>
</div>
@endif
@endforeach
  </div>
</div>


<footer class="footer">
  <div class="container">
      <div class="row">
          <div class="col-md-5">
              <h5>Alamat Perpustakaan</h5>
              <p>Jl. Kesayang Papahmu No. 11</p>
              <p>Karawang</p>
          </div>
          <div class="col-md-5">
              <h5>Kontak</h5>
              <p>Email: PerpustakaanIndonesia@gmail.com</p>
              <p>Telepon: (62) 51-6113-2690</p>
          </div>
          <!-- Tambahkan kolom untuk gambar di pojok kanan footer -->
          <div class="col-md-2 text-right">
              <img src="image/111.png" alt="Footer Image" style="max-width: 180px; height: auto;opacity: 2;">
          </div>
      </div>
      <hr>
      <div class="row">
          <div class="col-md-12 text-center">
              <p>&copy; 2024 Perpustakaan Indonesia. All rights reserved.</p>
          </div>
      </div>
  </div>
</footer>

</section>

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

