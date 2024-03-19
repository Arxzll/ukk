@include('layout.navpetugas')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
<h1 style="text-align: center; margin-top: 20px; margin-bottom: 30px; margin-top: 100px;">Data Buku</h1>  
  <div style="width: 100%; justify-content: center;">
      <table class="table table-hover container shadow" style="background-color: rgba(238, 234, 234, 0.8); text-align:left; box-shadow" width="100px" >
        <thead>

          <tr class="table-dark">
              <th scope="col">Judul</th>
              <th scope="col">Penulis</th>
              <th scope="col">Penerbit</th>
              <th scope="col">Tanggal Terbit</th>
              <th scope="col">Status</th>
              <th scope="col">opsi</th>
          </tr> 
        </thead>
      @foreach($buku as $b)
      <tbody class="table-group-divider">
    <td>{{ $b->Judul}}</td>
    <td>{{ $b->Penulis}}</td>
    <td>{{ $b->Penerbit}}</td>
    <td>{{ $b->TahunTerbit}}</td>
    <td>
      {{-- @if($b->status == 'selesai')
      @elseif($b->status == 'proses')
          @elseif($b->status == 'ditolak')
              @elseif($b->status == '0') --}}
  </td>
    <td>
      <span>
        <button onclick="confirmDelete(event, '{{ $b->BukuID }}')" class="btn btn-danger">
          <i class="fas fa-trash"></i> Hapus
        
        </button>
        <a href="{{ route('buku.edit', $b->BukuID) }}" class="btn btn-primary">
          <i class="fas fa-edit"></i> Edit
        </a>  
      </span>

    </td>

  </tbody>
  @endforeach
      </table>
</div>
<script>
  function showSuccessNotification() {
    Swal.fire({
      title: 'Berhasil!',
      text: 'Buku berhasil dihapus.',
      icon: 'success',
      showCancelButton: false, // Tidak perlu tombol cancel
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Oke'
    });
  }

  function confirmDelete(event, bukuID) {
    event.preventDefault(); // Menghentikan perilaku default anchor link
    
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
        // Jika pengguna memilih "Ya", lakukan penghapusan di sini
        window.location.href = "/petugas/hapus/" + bukuID;
        showSuccessNotification(); // Tampilkan notifikasi setelah penghapusan berhasil
      }
    });
  }
</script>


</body>
</html>