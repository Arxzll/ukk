@section('content')
@endsection
<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <title>Document</title>
      <link rel="stylesheet" href="css/register.css">
      <link rel="stylesheet" href="css/bg.css">
      <style>
        @import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Asap+Condensed:wght@200;300;500;600&family=Bebas+Neue&display=swap');
           body{
             font-family: "Asap Condensed";
           }
     .material-symbols-outlined {
       font-variation-settings:
       'FILL' 0,
       'wght' 400,
       'GRAD' 0,
       'opsz' 24
     }
     
         </style>
             <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
          <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        </head>

    <body class="align">

      {{-- <h1>Loginnnn</h1> --}}
      <div class="grid container mb-5 register" style="margin-top:50px;max-width: 540px; ">
        <p><img src="/image/logo5.png" alt="" style="max-width: 147px;margin-left:175px"></p>
        <form method="POST" action="" class="container mt-5" style="background-color: rgba(238, 234, 234, 0.8); 
        border-radius:5px;box-shadow: 5px 5px #BAD7E9 ;">
         
          @method("POST")
          @csrf
          <div class="mb-3">
            <h2 class="text-center" style="padding-top: 20px;color: #0079FF; text-shadow: 2px 2px #BAD7E9">Login</h2>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputall1">
            <center><button type="submit" name="submit" class="btn btn-primary mb-3 mt-3">LogIn</button></center>
          <center><p>Belum Punya Akun?<a href="/register" style="text-decoration: none;"> Klik Disini</a></p> </center>
        </form>
      </div>
      <script>
    @if(session('error'))
        // Code for error message
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ session('error') }}',
            showConfirmButton: true, // Display the confirm button
            confirmButtonText: 'OK' // Customize the confirm button text
        }).then((result) => {
            if (result.isConfirmed) {
                // Code to execute when the confirm button is clicked
                Swal.close(); // Close the SweetAlert
            }
        });

        // Clear the error message from the session
        @php
            session()->forget('error');
        @endphp
    @endif  
</script>

    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
    