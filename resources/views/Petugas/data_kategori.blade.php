@include('layout.navpetugas')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="css/bg.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-Vv4f5iFdzyg8zuFP1VK7P7Mvl+DW56z5aPdpgymYOJ02VEXdM1tN3DDU5Jw2hqM"
         crossorigin="anonymous">
</head>
<body>
<h1 style="text-align: center; margin-top: 0px; margin-bottom: 30px;margin-top: 100px;">Data Kategori</h1>  
  <div style="width: 100%; justify-content: center;">
      <table class="table table-hover container shadow" style="background-color: rgba(238, 234, 234, 0.8); text-align:left; box-shadow" width="100px" >
        <thead>

          <tr class="table-dark">
              <th scope="col">Id Kategori</th>
              <th scope="col">Nama Kategori</th>
              <th scope="col">Opsi</th>
          </tr> 
        </thead>
      @foreach($user as $user)
      <tbody class="table-group-divider">
    <td>{{ $user->KategoriID}}</td>
    <td>{{ $user->NamaKategori}}</td>
    <td>
      <span><a href="/petugas/hapus_kategori/{{$user->KategoriID}}" class="btn btn-danger">Hapus</a></span>
    </td>
  </tbody>
  @endforeach
      </table>
</div>
</body>
</html>