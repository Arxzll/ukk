@include('layout.navpetugas')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body  style="background-image: url('/image/bg.jpg');
    background-repeat: no-repeat;
      background-size: cover;">
    
  <div class="col pt-5">
      <form class="d-flex justify-content-center " role="search" action="" method="get">
        {{-- @csrf --}}
        {{-- @method("GET") --}}
        <input style="width: 20%;" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q">
        <button class="btn btn-outline-primary" type="submit">Search</button>
      </form>
@foreach ($list as $list)
    
<div class="card mb-3 shadow m-4">

    <div class="card-body">

        <div class="d-flex flex-start">
            <img class="shadow-1-strong me-3" src="/image/{{$list->Foto}}" alt="" width="80" height="80" style="object-fit: cover; border-radius:;" />
            <div class="w-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="col p-2">
                        <h6 class="text-primary fw-bold mb-0">
                            Judul : {{$list->Judul}} 
                        </h6>
                        <h6 class="mb-0">
                          Nama Peminjam : {{$list->username}}
                        </h6>
                        <h6 class="mb-0">Status: {{$list->StatusPeminjaman}}
                        </h6>
                        <h6 class="mb-0">Tanggal Pengajuan : {{$list->TanggalPeminjaman}}
                        </h6>
                    </div>

                    <span>
                      <button onclick="confirmDelete(event, '{{ $list->PeminjamanID }}')" class="btn btn-outline-danger" style="margin: 5px">
                        <i class="fas fa-trash"></i> Hapus
                      </button>
                    </span>
                    @if ($list->StatusPeminjaman == 'menunggu')
                    <a href="/petugas/terima-buku/{{$list->PeminjamanID}}" class="btn btn-outline-primary">Terima</a>
                @elseif ($list->StatusPeminjaman == 'DiTerima')
                    <a href="/petugas/pinjam-buku/{{$list->PeminjamanID}}" class="btn btn-outline-success">Pinjam</a>
                @elseif ($list->StatusPeminjaman == 'Di Pinjam')
                    <a href="/petugas/selesai-buku/{{$list->PeminjamanID}}" class="btn btn-outline-success">Selesai</a>
                @elseif ($list->StatusPeminjaman == 'Selesai')
                    <span class="text-muted">No option available</span>
                @endif
                
                
                </div>
            </div>
        </div>
    </div>
</div>

@endforeach

    </div>
</body>
<script>
  function showSuccessNotificationAndReload() {
    Swal.fire({
      title: 'Berhasil!',
      text: 'Peminjaman Berhasil Dihapus.',
      icon: 'success',
      showCancelButton: false,
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Oke'
    }).then(() => {
      // Reload halaman setelah menekan tombol "Oke" pada notifikasi
      location.reload();
    });
  }

  function confirmDelete(event, PeminjamanID) {
    event.preventDefault();

    Swal.fire({
      title: 'Apakah Anda yakin?',
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Tidak, batal'
    }).then((result) => {
      if (result.isConfirmed) {
        // Menggunakan Ajax untuk melakukan penghapusan
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/peminjaman/hapus_peminjaman/" + PeminjamanID, true);
        xhr.onreadystatechange = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
            showSuccessNotificationAndReload(); // Tampilkan notifikasi dan reload halaman setelah penghapusan berhasil
          }
        };
        xhr.send();

        // Optional: Jika Anda ingin menambahkan logika lain setelah penghapusan, letakkan di sini
      }
    });
  }
</script>


<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</html>