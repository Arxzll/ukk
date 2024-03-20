<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan Indonesia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
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
     .profile-picture-dropdown {
      width: 40px; /* Sesuaikan ukuran foto profil */
      height: 40px;
    }

         </style>
         <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" /> 
</head>
<body>
  
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:rgb(25, 61, 179); box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.50);  ">
        <div class="container-fluid">
            <a class="navbar-brand" href="/home">
                <img src="/image/logo7.png" alt="" width="100" height="47">
            </a>
    
            <!-- Add the navbar-toggler button for small screens -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/home')}}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/peminjaman')}}">Peminjaman</a>
                    </li>
                 
                </ul>
                <ul class="navbar-nav me-4 mb-2 mb-lg-0">
                    <!-- Dropdown Profil -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/image/person.jpg" alt="Profil" class="profile-picture-dropdown rounded-circle">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="profilDropdown">
                            <!-- Tautan Dropdown -->
                            <li><a class="dropdown-item" href="#">Profil Saya</a></li>
                            <li><a class="dropdown-item" href="#">Pengaturan</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{url('/logout')}}">Keluar</a></li>
                        </ul>
                    </li>
            </div>
        </div>
    </nav>
    
    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    

    </body>
    </html>