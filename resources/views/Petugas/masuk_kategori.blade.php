@include('layout.navpetugas')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      input {
          border : 1px solid black !important;
      }
  </style>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
  <body class="align">
<h1 style="text-align: center; margin-top: 100px; font-weight:bold;">Tambahkan Kategori Ke Buku</h1>
    <div class="grid container mb-5 register">
      <div class="card container mt-5 shadow-lg" style="width: 50%"> 
      <form method="POST" action="" class="container mt-3">
        @csrf
        @method('POST')
        
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label ">Kategori</label>
          <select class="form-select" name="kategori" aria-label="Default select example">
            @foreach ($kategori as $kategori)
                
             <option value="{{$kategori->KategoriID}}">{{$kategori->NamaKategori}}</option>
             @endforeach
            </select>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1"  class="form-label ">Buku</label>
          <select class="form-select" name="buku" aria-label="Default select example">
            @foreach ($buku as $buku)
                
             <option value="{{$buku->BukuID}}">{{$buku->Judul}}</option>
             @endforeach
            </select>
        </div>
        <br>
        <br>
        <center><button type="submit" name="submit" class="btn btn-primary mb-3">Tambah Kategori</button></center>
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
</body>
</html>
