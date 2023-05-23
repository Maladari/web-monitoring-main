<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- CSS --}}
    <link rel="stylesheet" href="/css/homestyle.css">
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


    <title>Home | Higertech</title>
</head>

<body>
    <div id="bg-asli">
        <div id="bg-home">
            <div id="bo-home" class="clearfix">
                <div id="kiri-home">
                    <img src="/img/logo-higertech.png" alt="">
                </div>
                <div id="kanan-home">
                    <ul>
                        <li><a href="/home">Home</a></li>
                        <li><a href="/web-monitoring">Web Monitoring</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="bg-mp-home">
            <div id="bo-mp-home">
                <div id="map"></div>
            </div>
        </div>
        <div id="bg-awlr">
            <div id="bo-awlr">
                <div id="head-awlr">
                    <h1><i class="fa-solid fa-water"></i> Pos Duga Air</h1>
                </div>
                <div id="isi-awlr">
                    <div id="cari-awlr">
                        <p>Cari : <input type="text" id="input-awlr" onkeyup="tableSearch()" placeholder="">
                        </p>
                    </div>
                    <div id="rapeh">
                        <table class="table" id="tabel-awlr" data-filter-control="true"
                            data-show-search-clear-button="true">
                            <tr class="tb-mid">
                                <th>No</th>
                                <th>Nama Pos</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Tinggi Air</th>
                                <th>Perubahan</th>
                            </tr>
                            <?php $i = 1; ?>
                            @foreach ($dev as $b)
                                @if ($b->station->type == 'AWLR')
                                    <tr>
                                        <td class="tb-mid"><?= $i++ ?></td>
                                        <td><a href="/web-monitoring/{{ $b->station_id }}">{{ $b->station->name }}</a>
                                        </td>
                                        <td class="tb-mid">
                                            <?php
                                            $tanggal = mktime(date('m'), date('d'), date('Y'));
                                            echo date('d-M-Y', $tanggal); ?>
                                        </td>
                                        <td class="tb-mid">
                                            <?php
                                            date_default_timezone_set('Asia/Jakarta');
                                            $jam = date('H:i');
                                            echo $jam;
                                            ?>
                                        </td>
                                        <td class="tb-mid">{{ $b->brand->tinggi_air }} cm</td>
                                        @if ($b->brand->perubahan == 'naik')
                                            <td class="tb-mid"><i class="fa-solid fa-circle-arrow-up"
                                                    style="color:red"></i></td>
                                        @elseif ($b->brand->perubahan == 'tetap')
                                            <td class="tb-mid"><i class="fa-solid fa-circle-arrow-right"
                                                    style="color:blue"></i></td>
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
                </div>
                <div id="foot-awlr" class="clearfix">
                    <div id="foot-awlr-atas">
                        <ul>
                            <li><i class="fa-solid fa-square-full" style="color:green"></i> : Normal</li>
                            <li><i class="fa-solid fa-square-full" style="color:yellow"></i> : Siaga 3</li>
                            <li><i class="fa-solid fa-square-full" style="color:orange"></i> : Siaga 2</li>
                            <li><i class="fa-solid fa-square-full" style="color:red"></i> : Siaga 1</li>
                        </ul>
                    </div>
                    <div id="foot-awlr-bawah">
                        <ul>
                            <li><i class="fa-solid fa-circle-arrow-up" style="color:red"></i> : Tinggi Air Naik</li>
                            <li><i class="fa-solid fa-circle-arrow-right" style="color:blue"></i> : Tinggi Air Tetap
                            </li>
                            <li><i class="fa-solid fa-circle-arrow-down" style="color:green"></i> : Tinggi Air Menurun
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="bg-aws">
            <div id="bo-aws">
                <div id="bo-head-aws">
                    <h1><i class="fa-solid fa-snowflake"></i> Pos Klimatologi</h1>
                </div>
                <div id="isi-aws">
                    <div id="cari-aws">
                        <p>Cari : <input type="text" id="input-aws" onkeyup="tableAWS()" placeholder="">
                        </p>
                    </div>
                    <div id="co-aws">
                        <table class="table" id="tabel-aws" data-filter-control="true"
                            data-show-search-clear-button="true">
                            <tr class="tb-mid">
                                <th>No</th>
                                <th>Nama Pos</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Humidity (%)</th>
                                <th>Pressure (MB)</th>
                                <th>Rainfall (mm)</th>
                                <th>Solar Radiation</th>
                                <th>Temperature (°C)</th>
                                <th>Wind Direction (°)</th>
                                <th>Wind Speed (Km/Hour)</th>
                                <th>Battery (V)</th>
                                <th>Evaporation (mm)</th>
                            </tr>
                            <?php $i = 1; ?>
                            @foreach ($dev as $b)
                                @if ($b->station->type == 'AWS')
                                    <tr>
                                        <td class="tb-mid"><?= $i++ ?></td>
                                        <td><a href="/web-monitoring/{{ $b->station_id }}">{{ $b->station->name }}</a>
                                        </td>
                                        <td class="tb-mid">
                                            <?php
                                            $tanggal = mktime(date('m'), date('d'), date('Y'));
                                            echo date('d-M-Y', $tanggal); ?>
                                        </td>
                                        <td class="tb-mid">
                                            <?php
                                            date_default_timezone_set('Asia/Jakarta');
                                            $jam = date('H:i');
                                            echo $jam;
                                            ?>
                                        </td>
                                        <td class="tb-mid">{{ $b->brand->humidity }}</td>
                                        <td class="tb-mid">{{ $b->brand->pressure }}</td>
                                        <td class="tb-mid">{{ $b->brand->rainfall }}</td>
                                        <td class="tb-mid">{{ $b->brand->solar_radiation }}</td>
                                        <td class="tb-mid">{{ $b->brand->temperature }}</td>
                                        <td class="tb-mid">{{ $b->brand->wind_direction }}</td>
                                        <td class="tb-mid">{{ $b->brand->wind_speed }}</td>
                                        <td class="tb-mid">{{ $b->brand->battery }}</td>
                                        <td class="tb-mid">{{ $b->brand->evaporation }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div id="bg-arr">
            <div id="bo-arr">
                <div id="head-arr">
                    <h1><i class="fa-solid fa-cloud"></i> Pos Curah Hujan</h1>
                </div>
                <div id="isi-arr">
                    <div id="cari-arr">
                        <p>Cari : <input type="text" id="input-arr" onkeyup="tableARR()" placeholder="">
                        </p>
                    </div>
                    <div id="co-arr">
                        <table class="table" id="tabel-arr" data-filter-control="true"
                            data-show-search-clear-button="true">
                            <tr class="tb-mid">
                                <th rowspan="2">No</th>
                                <th rowspan="2">Nama Pos</th>
                                <th rowspan="2">Tanggal</th>
                                <th rowspan="2">CH Per 5 Menit (mm)</th>
                                <th colspan="2">Intensitas Per Jam</th>
                                <th colspan="2">Intensitas Per Hari Pkl 07:00 s.d 06:59 (H+1)</th>
                                <th>Manual Harian (Jam)</th>
                            </tr>
                            <tr class="tb-mid">
                                <th>CH (mm)</th>
                                <th>Status</th>
                                <th>CH (mm)</th>
                                <th>Status</th>
                                <th>CH 07.00 (mm)</th>
                            </tr>
                            <?php $i = 1; ?>
                            @foreach ($dev as $b)
                                @if ($b->station->type == 'ARR')
                                    <tr>
                                        <td class="tb-mid"><?= $i++ ?></td>
                                        <td><a
                                                href="/web-monitoring/{{ $b->station_id }}">{{ $b->station->name }}</a>
                                        </td>
                                        <td class="tb-mid">
                                            <?php
                                            $tanggal = mktime(date('m'), date('d'), date('Y'));
                                            echo date('d-M-Y', $tanggal); ?>
                                        </td>
                                        <td class="tb-mid">{{ $b->brand->ch5min }}</td>
                                        @if ($b->brand->ch5min == '0.5')
                                            <td class="tb-mid">0.5</td>
                                            <td class="bg-hujan-ringan">
                                                <p class="hujan-ringan">Hujan Ringan</p>
                                            </td>
                                            <td class="tb-mid">{{ $b->brand->chhari }}</td>
                                            <td class="bg-hujan-ringan">
                                                <p class="hujan-ringan">Hujan Ringan</p>
                                            </td>
                                            <td class="tb-mid">-</td>
                                        @elseif ($b->brand->ch5min == '0')
                                            <td class="tb-mid">0</td>
                                            <td class="bg-berawan">
                                                <p class="berawan">Berawan</p>
                                            </td>
                                            <td class="tb-mid">{{ $b->brand->chhari }}</td>
                                            <td class="bg-hujan-ringan">
                                                <p class="hujan-ringan">Hujan Ringan</p>
                                            </td>
                                            <td class="tb-mid">-</td>
                                        @elseif ($b->brand->ch5min == '2')
                                            <td class="tb-mid">0</td>
                                            <td class="bg-berawan">
                                                <p class="berawan">Berawan</p>
                                            </td>
                                            <td class="tb-mid">{{ $b->brand->chhari }}</td>
                                            <td class="bg-berawan">
                                                <p class="berawan">Berawan</p>
                                            </td>
                                            <td class="tb-mid">-</td>
                                        @elseif ($b->brand->ch5min == '0.4')
                                            <td class="tb-mid">0</td>
                                            <td class="bg-hujan-ringan">
                                                <p class="hujan-ringan">Hujan Ringan</p>
                                            </td>
                                            <td class="tb-mid">{{ $b->brand->chhari }}</td>
                                            <td class="bg-berawan">
                                                <p class="berawan">Berawan</p>
                                            </td>
                                            <td class="tb-mid">-</td>
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
                </div>
                <div id="foot-arr">
                    <div id="bo-foot-arr" class="clearfix">
                        <div id="barr1">
                            <h1 class="box-arr-abu">Berawan</h1>
                            <h1>Intensitas Per Jam</h1>
                            <p>0 mm/jam</p>
                            <h1>Intensitas Per Hari</h1>
                            <p>0 mm/jam</p>
                        </div>
                        <div id="barr1">
                            <h1 class="box-arr-ijo">Hujan Ringan</h1>
                            <h1>Intensitas Per Jam</h1>
                            <p>0.1 - 5 mm/jam</p>
                            <h1>Intensitas Per Hari</h1>
                            <p>5 - 20 mm/jam</p>
                        </div>
                        <div id="barr1">
                            <h1 class="box-arr-kuning">Hujan Sedang</h1>
                            <h1>Intensitas Per Jam</h1>
                            <p>5 - 10 mm/jam</p>
                            <h1>Intensitas Per Hari</h1>
                            <p>20 - 50 mm/jam</p>
                        </div>
                        <div id="barr1">
                            <h1 class="box-arr-oren">Hujan Lebat</h1>
                            <h1>Intensitas Per Jam</h1>
                            <p>10 - 20 mm/jam</p>
                            <h1>Intensitas Per Hari</h1>
                            <p>50 - 100 mm/jam</p>
                        </div>
                        <div id="barr1">
                            <h1 class="box-arr-merah">Hujan Sangat Lebat</h1>
                            <h1>Intensitas Per Jam</h1>
                            <p>> 20 mm/jam</p>
                            <h1>Intensitas Per Hari</h1>
                            <p>> 100 mm/jam</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="bg-foot-home">
            <div id="bo-foot-home">
                <h1>2022 &copy; Higertech Karya Sinergi</h1>
            </div>
        </div>
    </div>
    <script type="application/javascript">
        function tableSearch() {
            let input, filter, table, tr, td, textValue;
            input = document.getElementById("input-awlr");
            filter = input.value.toUpperCase();
            table = document.getElementById("tabel-awlr");
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
        function tableAWS() {
            let input, filter, table, tr, td, textValue;
            input = document.getElementById("input-aws");
            filter = input.value.toUpperCase();
            table = document.getElementById("tabel-aws");
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
        function tableARR() {
            let input, filter, table, tr, td, textValue;
            input = document.getElementById("input-arr");
            filter = input.value.toUpperCase();
            table = document.getElementById("tabel-arr");
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
    <script>
        var map = L.map('map').setView([-0.8450014, 118.7546203], 5.25);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© Higertech Karya Sinergi'
        }).addTo(map);

        const devices = [
            @foreach ($devices as $key => $data)
                ["{{ $data->station->latitude }}", "{{ $data->station->longitude }}", "{{ $data->station->name }}",
                    "{{ $data->station->office->name }}", "{{ $data->station->type }}", "{{ $data->device_id }}",
                    "{{ $data->station_id }}", "{{ $data->station->office->category }}"
                ],
            @endforeach
        ];

        L.control.tagFilterButton({
            data: ["ARR", "AWLR", "AWS", "AWLR &amp; ARR"],
            icon: '<i class="fa-solid fa-filter"></i>',
            filterOnEveryClick: true
        }).addTo(map);

        var LeafIcon = L.Icon.extend({
            options: {
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


                } else {
                    popgrup.addTo(map);
                    console.log('no geo data available for: ' + name)
                }
            })
        }
    </script>
</body>

</html>
