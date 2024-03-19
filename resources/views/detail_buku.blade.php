@include('layout.navbar')
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
      body {
         background-color: rgb(245, 245, 245);
      }
   
      .gambar {
         width: 100%;
      }
   
      .card-img-top {
         height: 288px;
         filter: brightness(100%);
         transition: filter 0.2s ease-in-out;
      }
   
      .gambar:hover .img-thumbnail {
         filter: brightness(60%);
      }
   
      .role {
         overflow-x: scroll;
         width: 100%;
      }
   
      .text {
         color: black;
         font-size: 16px; /* Gaya font umum */
      }
   
      .text-justify {
         text-align: justify;
         line-height: 1.5;
         margin: 20px 0;
      }
   
      #imageModal {
         display: none;
         position: fixed;
         z-index: 1;
         padding-top: 50px;
         left: 0;
         top: 0;
         width: 100%;
         height: 100%;
         overflow: auto;
         background-color: rgba(0, 0, 0, 0.5);
      }
   
      #modalImage {
         margin: auto;
         display: block;
         width: 320px;
         height: 378px;
         position: fixed;
         top: 50%;
         left: 50%;
         transform: translate(-50%, -50%);
      }
   
      .close {
         position: absolute;
         z-index: 2;
         top: 130px;
         right: 37%;
         font-size: 30px;
         color: white;
         cursor: pointer;
      }
   
      /* Gaya untuk layar kecil (<= 576px) */
      @media (max-width: 576px) {
         .container {
            margin-left: 0;
         }
   
         .col-3, .col-9 {
            width: 100%;
         }
   
         .gambar {
            width: 100%;
         }
   
         .text {
            font-size: 14px;
         }
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
  
   </style>
   
</head>
<body>
<div class="container-fluid" style="margin-left:  0px;margin-top:140px; ">
  <div class="row">
    <div class="col-3">
      <div class="gambar shadow" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <img src="{{$buku->Foto}}" class="img-thumbnail" alt="Image" onclick="openImageModal('/image/{{$buku->Foto}}')" style="max-width: 100%; max-height: 100%; width: 100%; height: auto;">
    </div>
    
      <p> <br>Penulis: {{$buku->Penulis}}
      <br>Penerbit: {{$buku->Penerbit}}
      <br>Tanggal Terbit: {{$buku->TahunTerbit}}
      <br>Kategori: {{$kategori->NamaKategori}}
      </p>
    </div>

    <div class="col-7">
      <h5>{{$buku->Penulis}}</h5>
      <div class="text">
    <h3><b><u>{{$buku->Judul}}</u></b></h3>
    <div class="mt-5">
      <h5><b><u>Deskripsi Buku</u></b></h5>
      <p class="text-justify" id="bookDescription">
        <span id="shortDescription">{{ substr($buku->Deskripsi, 0, 300) }} .......</span>
        <span id="fullDescription" style="display: none;">  {!! nl2br(e($buku->Deskripsi)) !!}</span>
    </p>
    <a href="javascript:void(0);" id="readMoreLink" onclick="toggleDescription()" style="text-decoration: none">Baca Selengkapnya</a> </div>
    </div> 
    <br>
    {{-- @foreach ($peminjaman as $pinjam)
      <form id="pinjamForm" action="{{ route('peminjaman.pinjambuku') }}" method="POST">
        @method('POST')
        @csrf
        <input type="hidden" name="BukuID" value="{{ $buku->BukuID }}">
        @if ($pinjam->StatusPeminjaman == 'DiTerima' || $pinjam->StatusPeminjaman == 'menunggu' || $pinjam->StatusPeminjaman == 'Selesai')
            <button class="btn btn-primary shadow" type="button" disabled>Buku Sudah Dipinjam</button>
        @else 
            <button class="btn btn-primary shadow" type="button" onclick="pinjamBuku()">Pinjam</button>
        @endif
      </form>
    @endforeach --}}
    
    <form id="pinjamForm" action="{{ route('peminjaman.pinjambuku') }}" method="POST">
      @method('POST')
      @csrf
      <input type="hidden" name="BukuID" value="{{ $buku->BukuID }}">
      <button class="btn btn-primary shadow" type="button" onclick="pinjamBuku()">Pinjam</button>
  </form>
  

  </div>
  </div>
</div>

<div class="">
  <section style="background-color: #f7f6f6;">
    <div class="container my-5 py-5 text-dark">
      <form action="/CommentController/komen/{{$buku->BukuID}}" method="POST">
        @method("POST")
        @csrf
      
        <div class="input-group mb-3 w-50">
          <span class="input-group-text shadow" id="inputGroup-sizing-default">Rating</span>
          <select id="rating" name="rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>
      
        <div class="input-group mb-3 w-50 shadow">
          <span class="input-group-text" id="inputGroup-sizing-default">Komentar</span>
          <input type="text" class="form-control" name="ulasan" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
          <button class="btn btn-primary" type="submit">Kirim</button>
        </div>
      
      </form>
{{--       
      <div class="row d-flex ">
        <div class="col-md-12 col-lg-10 col-xl-8">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="card">
             
            </div>
          </div> --}}

  @foreach ($ulasan as $u)
      
  
          <div class="card mb-3 shadow">
            <div class="card-body">
              <div class="d-flex flex-start">
                {{-- <img class="rounded-circle shadow-1-strong me-3"
                  src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(26).webp" alt="avatar" width="40"
                  height="40" /> --}}
                <div class="w-100">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="text-primary fw-bold mb-0">
                      {{$u->username}}
                      <span class="text-dark ms-2">{{$u->Ulasan}}</span>
                    </h6>
                    <p class="mb-0"><i class="fa fa-star" aria-hidden="true" style="color:gold"></i> {{$u->Rating}}</p>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
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
                  <img src="/image/111.png" alt="Footer Image" style="max-width: 180px; height: auto;opacity: 2;">
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
</div>
<div id="imageModal" class="modal">
  <span class="close" onclick="closeImageModal()">&times;</span>
  <img class="modal-content" id="modalImage">
</div>

</body>
<script src="/assets/plugins/common/common.min.js"></script>

<script src="/assets/js/custom.min.js"></script>
<script src="/assets/js/settings.js"></script>
<script src="/assets/js/gleek.js"></script>
<script src="/assets/js/styleSwitcher.js"></script>
</html>
 <script>
    function pinjamBuku() {
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda yakin ingin meminjam buku ini?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, Pinjam!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Menggunakan AJAX untuk mengirim formulir secara asinkron
                var formData = new FormData(document.getElementById('pinjamForm'));

                $.ajax({
                    url: '{{ route('peminjaman.pinjambuku') }}',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Peminjaman Berhasil Di Ajukan!',
                            text: 'Silahkan Cek Peminjaman Anda Di Halaman Peminjaman',
                            showCancelButton: true,
                            confirmButtonText: 'OK',
                            cancelButtonText: 'Lihat Riwayat Peminjaman'
                        }).then((result) => {
                           if (result.dismiss === Swal.DismissReason.cancel) {
                                // Logika jika tombol Lihat Riwayat Peminjaman ditekan
                                window.location.href = '/peminjaman';
                            }
                        });
                    },
                    error: function (xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Terjadi kesalahan. Silakan coba lagi.'
                        });
                    }
                });
            }
        });
    }

</script>

<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
  function toggleDescription() {
    var shortDesc = document.getElementById('shortDescription');
    var fullDesc = document.getElementById('fullDescription');
    var readMoreLink = document.getElementById('readMoreLink');

    if (fullDesc.style.display === 'none') {
        shortDesc.style.display = 'none';
        fullDesc.style.display = 'inline';
        readMoreLink.textContent = 'Tutup';
    } else {
        shortDesc.style.display = 'inline';
        fullDesc.style.display = 'none';
        readMoreLink.textContent = 'Baca Selengkapnya';
    }
}
function openImageModal(imageUrl) {
    // Atur sumber gambar pada modal
    document.getElementById('modalImage').src = imageUrl;

    // Buka modal
    document.getElementById('imageModal').style.display = 'block';
  }

  function closeImageModal() {
    // Tutup modal
    document.getElementById('imageModal').style.display = 'none';
  }
</script>
