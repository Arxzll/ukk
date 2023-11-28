@include('layout.navbar')


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
</head>
<body>
    <div class="col-lg-12" style="padding: 0">
        <div class="card">
                <div class="bootstrap-carousel">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="/image/img1.png" alt="First slide" style="
                                height: 329px;
                                object-fit: cover;
                            ">
                            </div>

                            <div class="carousel-item">
                                <img class="d-block w-100" src="/image/img2.png" alt="Second slide" style="
                                height: 329px;
                                object-fit: cover;
                            ">
                                        
                            </div>        
                        </div><a class="carousel-control-prev" href="#carouselExampleControls" data-slide="prev"><span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span> </a><a class="carousel-control-next" href="#carouselExampleControls"
                            data-slide="next"><span class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
                    </div>
                </div>
        </div>
    </div>
    <script src="/assets/plugins/common/common.min.js"></script>
    <script src="/assets/js/custom.min.js"></script>
    <script src="/assets/js/settings.js"></script>
    <script src="/assets/js/gleek.js"></script>
    <script src="/assets/js/styleSwitcher.js"></script>
</body>
</html>