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
        background-color:rgb(245, 245, 245);

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
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div id="carouselExampleDark" class="carousel carousel-dark slide carousel-fluid" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000">
            <img class="d-block w-100 img-fluid " src="/image/img1.png" alt="First slide" style="height: 329px;object-fit: cover;">
            <div class="carousel-caption d-none d-md-block">
             
            </div>
          </div>
    
          <div class="carousel-item" data-bs-interval="2000">
            <img class="d-block w-100 img-fluid" src="/image/img2.png" alt="Second slide" style="height: 329px;object-fit: cover;">
            <div class="carousel-caption d-none d-md-block">
            
            </div>
         
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

  {{-- <form class="d-flex justify-content-center " role="search" action="" method="get">
        <input style="width: 20%;" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
       --}}
       <br>
       <form class="d-flex justify-content-center " role="search" action="" method="get">
        {{-- @csrf --}}
        {{-- @method("GET") --}}
        <input style="width: 40%;" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q">
        <button class="btn btn-outline-primary" type="submit">Search</button>
      </form>

   
  
    <div class="d-flex "> 
      @foreach($buku as $b)
    <div class="card ms-3 shadow" style="width: 10rem; margin:5px">
        <a href="detail_buku/{{$b->Judul}}" itemprop="url">
          <img src="/image/{{$b->Foto}}" class="card-img-top" alt="...">
        </a>
        <div class="card-body">
          <h6 class="card-title">{{ $b->Judul}}</h6>
        </div>
   </div>
   @endforeach
  </div>
 

  
</section>
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
</body>
<script src="/assets/plugins/common/common.min.js"></script>
<script src="/assets/js/custom.min.js"></script>
<script src="/assets/js/settings.js"></script>
<script src="/assets/js/gleek.js"></script>
<script src="/assets/js/styleSwitcher.js"></script>
</html>

