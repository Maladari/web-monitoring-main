<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- CSS --}}
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/">
    <link rel="stylesheet" href="/dist/MarkerCluster.css">
    <link rel="stylesheet" href="/dist/MarkerCluster.Default.css">
    <link rel="stylesheet" href="/css/ripple.css">
    <link rel="stylesheet" href="/css/leaflet-easy-button.css">
    <link rel="stylesheet" href="/css/leaflet-tag-filter-button.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css">
    <link rel="stylesheet" href="/css/leaflet.awesome-markers.css">
    <link rel="stylesheet" href="/css/leaflet-search.src.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

    {{-- JS --}}
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/"></script>
    <script src="/dist/leaflet.markercluster.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.js"></script>
    <script src="/js/leaflet-easy-button.js"></script>
    <script src="/js/leaflet-tag-filter-button.js"></script>
    <script src="/js/leaflet.awesome-markers.js"></script>
    <script src="/js/leaflet-search.src.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

    <title>{{ $title }}</title>
</head>

<body>
    <div id="pembungkus">

        {{-- <button class="kabeh" onclick='showDetail()'>Show Table</button> --}}
        <div id="ss">
            <div class="header">
                <img src="/img/logo-higertech.png" alt="">
                <ul>
                    <li><a href="/home">Home</a></li>
                    {{-- <li><a onclick='showDetail()'>Show Data</a></li> --}}
                    <li><a onclick='Fullview()'><i class="fa-solid fa-expand"></i></a></li>
                </ul>
            </div>
        </div>
        <div id="bg-map">
            <div id="bo-map">
                <div id="map"></div>
                
                <div id="bg-menu-pop-up">
                    <div id="bo-menu-pop-up">
                        <div id="cari-stasiun">
                            <input type="text" id="input-stasiun" onkeyup="CariStasiun()" placeholder="Masukan nama pos">
                        </div>
                        <table class="table" id="tabel-stasiun" data-filter-control="true"
                        data-show-search-clear-button="true">
                        <tr class="tb-mid">
                            <th>Tipe pos</th>
                            <th>Nama Pos</th>
                        </tr>
                        @foreach ($devices as $d)
                            <tr>
                                @if ($d->station->type == 'AWLR')
                                    <td style="background-color: #1976d2" class="tipe-tengah">{{ $d->station->type }}</td>
                                @elseif ($d->station->type == 'ARR')
                                    <td style="background-color: #069550" class="tipe-tengah">{{ $d->station->type }}</td>
                                @elseif ($d->station->type == 'AWS')
                                    <td style="background-color: #e53935" class="tipe-tengah">{{ $d->station->type }}</td>
                                @elseif ($d->station->type == 'AWLR & ARR')
                                    <td style="background-color: teal" class="tipe-tengah">{{ $d->station->type }}</td>
                                @endif
                                {{-- <td>{{ $d->station->type }}</td> --}}
                                <td><a href="/web-monitoring/{{ $d->station_id }}">{{ $d->station->name }}</a></td>
                            </tr>
                            
                        @endforeach
                        </table>
                    </div>
                </div>
                <div id="bg-pop-content">
                    <div id="bo-pop-content" class="prefix"> {{-- TRIGGER --}}
                        <div id="tb">
                            @foreach ($devices as $d)
                                <div id="bo-tb" class="clerfix">
                                    <div id="tb-1">
                                        <h1>{{ $d->station->type }}</h1>
                                    </div>
                                    <div id="tb-2">
                                        <div id="tb-atas">
                                            <p><a
                                                    href="/web-monitoring/{{ $d->station_id }}">{{ $d->station->name }}</a>
                                            </p>
                                        </div>
                                        <div id="tb-bawah">
                                            <p><?php
                                            $tanggal = mktime(date('m'), date('d'), date('Y'));
                                            echo date('d-M-Y', $tanggal); ?></p>
                                        </div>
                                    </div>
                                    <div id="tb-3">
                                        <p>13.40 WIB</p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="modaltabel" class="modal">
            <div id="datatable" class="dalamtabel">
                <h1 class="tes">Show Data</h1>
                <span class="close" onclick="tutup()">&times;</span>
                <table class="isi">
                    <tr class="mid">
                        <td>Nama Pos</td>
                        <td>Tipe</td>
                        <td>Device</td>
                        <td>Kantor</td>
                        <td>Tipe Kantor</td>
                        <td>Category</td>
                    </tr>
                    @foreach ($devices as $d)
                        @if ($d->station->type == 'AWLR & ARR')
                            <tr>
                                <td><a href="">{{ $d->station->name }}</a></td>
                                <td class="mid">{{ $d->station->type }}</td>
                                <td class="mid">{{ $d->device_id }}</td>
                                <td class="mid">{{ $d->station->office->type }}</td>
                                <td>{{ $d->station->office->name }}</td>
                                <td class="mid">{{ $d->station->office->id }}</td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    {{-- @foreach ($devices as $d)
        <h1>{{ $d->station->office->category }}</h1>
    @endforeach --}}
    <script>
        const devices = [
            @foreach ($devices as $key => $data)
                ["{{ $data->station->latitude }}", "{{ $data->station->longitude }}", "{{ $data->station->name }}",
                    "{{ $data->station->office->name }}", "{{ $data->station->type }}", "{{ $data->device_id }}",
                    "{{ $data->station_id }}", "{{ $data->station->office->category }}"
                ],
            @endforeach
        ];
    </script>
    {{-- fullscreen --}}
    <script>
        // $(".filter").on('change', function() {
        //     let device = $("#device").val()
        //     console.log([device])
        // })
        var mapId = document.getElementById('pembungkus');

        function Fullview() {
            mapId.requestFullscreen();
        }
    </script>
    {{-- Modal --}}
    <script>
        function showDetail() {
            // alert("COK");
            var modal = document.getElementById('modaltabel');
            var close = document.getElementsByClassName("close")[0];
            modal.style.display = "block";
            close.onclick = function() {
                modal.style.display = "none";
            }
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
            // document.getElementById('maintable').style.display = "block";
        }

        function tutup() {
            document.getElementsByClassName("close")[0];
            document.getElementsById("maintable").style.display = "none";
        }
    </script>
    <script>
        var map = L.map('map').setView([-0.8450014, 118.7546203], 5.25);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);
        // map.addControl(L.control.search());
        // L.Control.geocoder().addTo(map);
        // L.easyButton('fa-crosshairs fa-lg', function(btn, map) {
        //     alert('cok')
        // }).addTo(map);

        L.control.tagFilterButton({
            data: ["ARR", "AWLR", "AWS", "AWLR &amp; ARR"],
            icon: '<i class="fa-solid fa-filter"></i>',
            filterOnEveryClick: true
        }).addTo(map);

        var LeafIcon = L.Icon.extend({
            options: {
                // shadowUrl: 'leaf-shadow.png',
                iconSize: [38, 95],
                shadowSize: [50, 64],
                iconAnchor: [22, 94],
                shadowAnchor: [4, 62],
                popupAnchor: [-3, -76]
            }
        });

        var air = new LeafIcon({
            iconUrl: '/img/hujan.svg'
        });

        // var popgrup = new L.LayerGroup(); //layer contain searched elements

        // map.addLayer(popgrup);

        // var controlSearch = new L.Control.Search({
        //     position: 'topright',
        //     layer: popgrup,
        //     initial: false,
        //     zoom: 12,
        //     marker: false
        // });s

        // map.addControl(controlSearch);

        if (devices.length) {
            var popgrup = L.featureGroup();
            // var popgrup = L.markerClusterGroup();

            devices.forEach(function(data, i) {
                let [latitude, longitude] = [data[0], data[1]];
                let name = data[2];
                let category = data[3];
                let type = data[4];
                let device = data[5];
                let id = data[6];
                let ocat = data[7];

                if (latitude && longitude) {
                    // if (type == 'AWS') {
                    //     marker = new L.marker([latitude, longitude], {
                    //         icon: greenIcon
                    //     }).addTo(popgrup);
                    // }

                    marker = new L.marker([latitude, longitude], {
                        tags: [type]
                    }).addTo(popgrup);

                    var popup = "<div id='bg-pop'>" + "<div id='bo-pop' class='clearfix'>" +
                        "<div id='hed'>" + "<h1>" + name +
                        "</h1></div>" + "<div id='kiri'>" + "<h1> Tipe POS" +
                        "</h1>" + type + "</div>" + "<div id='kanan'><h1>Device ID" +
                        "</h1>" + device + "</div>" + "<div id='btn-det'>" +
                        "<button><i class='fa-solid fa-circle-info'></i> <a href='/web-monitoring/" + id +
                        "'>Lihat Detail</a></button>" + "</div></div>" + "</div>";
                    marker.bindPopup(popup).addTo(popgrup);

                    // cok.addLayer(marker);
                    // document.getElementById("overlay").innerHTML = id;

                } else {
                    popgrup.addTo(map);
                    console.log('no geo data available for: ' + name)
                }
            })
        }

        function CariStasiun() {
            let input, filter, table, tr, td, textValue;
            input = document.getElementById("input-stasiun");
            filter = input.value.toUpperCase();
            table = document.getElementById("tabel-stasiun");
            tr = table.getElementsByTagName("tr");
            for (let i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                    if (td) {
                        textValue = td.textContent || td.innerText;
                    if (textValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                         tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>

</html>
