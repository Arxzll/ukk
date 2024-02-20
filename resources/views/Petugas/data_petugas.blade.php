  @include ('layout.navpetugas')
  @section ('content')
      
  @endsection

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/bg.css">
  </head>
  <body>
  <h4 style="text-align: center; margin-top: 20px; margin-bottom: 30px;">Data Petugas</h4>  
  <div style="width: 100%; justify-content: center;">
    <table class="table table-hover container shadow" style="background-color: rgba(238, 234, 234, 0.8); text-align:left;" width="100px">
        <thead>

          <tr class="table-dark">
              <th scope="col">Nama Lengkap</th>
              <th scope="col">Username</th>
              <th scope="col">Email</th>
              <th scope="col">Alamat</th>
          </tr> 
        </thead>
        @foreach($user as $user)
        <tbody class="table-group-divider">
      <td>{{$user->NamaLengkap}}</td>
      <td>{{ $user->username}}</td>
      <td>{{ $user->Email}}</td>
      <td>{{$user->Alamat}}</td>
      

    </tbody>
    @endforeach
        </table>
  </div>
  </body>
  </html>