@include('layout.navbar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struk Peminjaman Buku</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.3/JsBarcode.all.min.js"></script>
    <style>
    ul {
        list-style: none;
        padding: 0;
    }

    li {
        margin-bottom: 10px; /* Adjust the margin as needed */
        display: flex;
        justify-content: space-between;
    }

    li strong {
        margin-right: 10px; /* Adjust the margin as needed for the strong element */
    }

    li span {
        margin-left: 10px; /* Adjust the margin as needed for the regular text element */
    }
    </style>
</head>
<body>

    <h3 class="text-center mt-3" style="margin-top: 40pxpx;">Struk Peminjaman Buku</h3>
    <h4 class="text-center">
        {{-- Tanggal {{ tanggal_indonesia($awal, false) }}
        s/d
        Tanggal {{ tanggal_indonesia($akhir, false) }} --}}
    </h4>
<div class="container" style="width: 30%; margin-top:50px;">
    <div class="card shadow">
        <p  class="text-center pt-2"><img src="/image/logo5.png" alt="" style="max-width: 147px;"></p>
    </div>
    <div class="card shadow">
     @foreach ($detail as $detail)
         
     <div class="list-group list-group-flush m-2">
         <ul>
             <li><strong>No. Peminjaman:</strong> {{$detail->PeminjamanID}} </li>
             <li><strong>ID Peminjam:</strong> {{$detail->UserID}}</li>
             <li><strong>Nama Peminjam:</strong> {{$detail->username}}</li>
             <li><strong>Nama Buku:</strong> {{$detail->Judul}}</li>
             <li><strong>Status:</strong> {{$detail->StatusPeminjaman}}</li>
             @if ($detail->StatusPeminjaman == 'DiTerima' || $detail->StatusPeminjaman == 'Selesai' || $detail->StatusPeminjaman == 'Di Pinjam')
            <li><strong>Tanggal Peminjaman:</strong> {{$detail->TanggalPeminjaman}}</li>
            @else
            <li><strong>Tanggal peminjaman:</strong>-</li>
        @endif
            @if ($detail->StatusPeminjaman == 'DiTerima' || $detail->StatusPeminjaman == 'Selesai' || $detail->StatusPeminjaman == 'Di Pinjam')
            <li><strong>Tanggal Pengembilan:</strong>{{$detail->TanggalPeminjaman}}</li>
        @else
            <li><strong>Tanggal pengembalian:</strong>-</li>
        @endif
</ul>
        
    </div>
    <div class="content" style="text-align: center">
        <input type="hidden" id="text" value="{{$detail->PeminjamanID}}"> 
        <svg id="barcode"></svg>
      </div>
      @endforeach
    </div>
    {{-- <div class="card shadow">
        <button class="btn btn-outline-primary m-2"> cetak struk</button>
    </div> --}}
</div>

<script>
    let text = document.getElementById("text").value;
    JsBarcode("#barcode", text);</script>
</body>
</html> 