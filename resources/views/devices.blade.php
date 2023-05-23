<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/styledevice.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <title>{{ $devices->station->name }}</title>
</head>

<body>
    <div id="bg">
        <div id="kotak">
            <h1 id="atas-dev">{{ $devices->station->name }}</h1>
            <div id="bo-dev" class="clearfix">
                <div id="info-dev">
                    <h1>informasi pos</h1>
                </div>
                <div id="kiri-dev">
                    <h1>Nama Pos </h1>
                    <h1>Tipe Pos </h1>
                    <h1>Nama Device </h1>
                    <h1>Nama Kantor </h1>
                    <h1>Tipe Kantor </h1>
                    <h1>Kategori </h1>
                </div>
                <div id="kanan-dev">
                    <h1>: {{ $devices->station->name }}</h1>
                    <h1>: {{ $devices->station->type }}</h1>
                    <h1>: {{ $devices->device_id }}</h1>
                    <h1>: {{ $devices->station->office->type }}</h1>
                    <h1>: {{ $devices->station->office->name }}</h1>
                    <h1>: {{ $devices->station->office->category }}</h1>
                </div>
                <div id="info-location">
                    <h1><i class="fa-solid fa-location-dot"></i> Lokasi</h1>
                </div>
                <div id="bo-latlang">
                    <div id="kiri-latlang">
                        <h1>Koordinat </h1>
                    </div>
                    <div id="kanan-latlang">
                        <h1>: {{ $devices->station->latitude }}, {{ $devices->station->longitude }}</h1>
                    </div>
                </div>
                <div id="bawah-dev">
                    <div class="warna">
                        <p>Color</p>
                        <button class="default" onclick="ubahwarna('#274475', '#fff')"></button>
                        <button class="sakura" onclick="ubahwarna('#FFADA0', '#fff')"></button>
                        <button class="hitam" onclick="ubahwarna('#000', '#FFD700')"></button>
                    </div>
                </div>
                <div id="bo-back">
                    <div id="back">
                        <a href="/web-monitoring">Kembali ke Web Monitoring</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function ubahwarna(color, font) {
            var warna = document.getElementById('kotak').style.background = color;
            var font = document.getElementById('kotak').style.color = font;
        }
    </script>
</body>

</html>
