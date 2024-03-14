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
  <h1 style="text-align: center; margin-top: 50px; font-weight:bold;">Tambah Buku</h1>
    <div class="grid container mb-5 register">
  
        
        <div class="card container mt-5 shadow-lg" style="width: 50%; "> <!-- Menggunakan kelas 'shadow-md' untuk memberikan efek bayangan yang lebih halus -->
            <form method="POST" action="" class="mt-3" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" name="judul" id="judul" required>
                </div>
        
                <div class="mb-3">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input type="text" class="form-control" name="penulis" id="penulis" required>
                </div>
        
                <div class="mb-3">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" class="form-control" name="penerbit" id="penerbit" required>
                </div>
        
                <div class="mb-3">
                    <label for="TahunTerbit" class="form-label">Tahun Terbit</label>
                    <input type="text" class="form-control" name="TahunTerbit" id="TahunTerbit" required>
                </div>
        
                <div class="mb-3">
                    <label for="Deskripsi" class="form-label">Deskripsi Buku</label>
                    <input type="text" class="form-control" name="Deskripsi" id="Deskripsi" required>
                </div>

                <div class="mb-3">
                    <label for="Deskripsi" class="form-label">Stok</label>
                    <input type="text" class="form-control" name="s" id="Stok" required>
                </div>
        
                <div class="mb-3">
                    <label for="Foto" class="form-label" style="color: white;">Foto</label>
                    <input class="form-control" name="Foto" type="file">
                </div>
                  
                <center><button type="submit" name="submit" class="btn btn-primary mb-3">Tambah Buku</button></center>
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
