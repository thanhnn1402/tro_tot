<?php




$vung = "Ninh kiều Cần Thơ";
if(isset($_GET['vung'])){
    if(strlen($_GET['vung']) > 3){
        $vung = $_GET['vung'];
    }
}

$tieude = "Ninh kiều Cần Thơ";
if(isset($_GET['tieude'])){
    if(strlen($_GET['tieude']) > 3){
        $tieude = $_GET['tieude'];
    }
}

$mota = "Code by Trần Thương";
if(isset($_GET['mota'])){
    if(strlen($_GET['mota']) > 3){
        $mota = $_GET['mota'];
    }
}

$width = "600px";
if(isset($_GET['width'])){
    if(strlen($_GET['width']) > 1){
        $width = $_GET['width'];
    }
}

$height = "400px";
if(isset($_GET['height'])){
    if(strlen($_GET['height']) > 1){
        $height = $_GET['height'];
    }
}



$link_map = "https://www.google.com/maps/search/".urlencode($vung);



$link = "https://www.google.com/maps/place/".urlencode($vung);
//echo $link;
$data = file_get_contents($link);


// $file = fopen("data_map.html","w");
// fwrite($file, $data);
// fclose($file);

$toado0 = explode("window.APP_INITIALIZATION_STATE",$data)[1];
$toado1 = explode(",",$toado0)[1];
$toado1 = explode("]",$toado1)[0];
$toado2 = explode(",",$toado0)[2];
$toado2 = explode("]",$toado2)[0];



//echo "<br>".$toado2.", ".$toado1;

$toado = $toado2.", ".$toado1;

$td_1 = explode(",", $toado)[0] . ",";
$td_2 = explode(",", $toado)[1];





?>
<html lang="en" data-arp-injected="true">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>View Map By Tran Thuong</title>

    <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="">
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
    <style></style>


    <script src="chrome-extension://mooikfkahbdckldjjndioackbalphokd/assets/prompt.js"></script>
    <style>
        .leaflet-control{
            max-width: 0px;
            max-height: 0px;
        }
    </style>
</head>

<body>
    <div id="map" style="width: <?=$width?>; height: <?=$height?>; position: relative;" class="leaflet-container leaflet-touch leaflet-retina leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom" tabindex="0">
        <div class="leaflet-control-container">
            <div class="leaflet-top leaflet-left">
                <div class="leaflet-control-zoom leaflet-bar leaflet-control">
                    <a class="leaflet-control-zoom-in" href="#" title="Zoom in" role="button" aria-label="Zoom in" aria-disabled="false">
                        <span aria-hidden="true">+</span>
                    </a>
                    <a class="leaflet-control-zoom-out" href="#" title="Zoom out" role="button" aria-label="Zoom out" aria-disabled="false">
                        <span aria-hidden="true">−</span>
                    </a>
                </div>
            </div>
            <div class="leaflet-top leaflet-right"id="BY_code"></div>
            <div class="leaflet-bottom leaflet-left " ></div>
        </div>
    </div>
    <script>

        var map = L.map('map').setView([<?= $td_1 . $td_2 ?>], 13);

        var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="">Trần Thương</a>'
        }).addTo(map);

        var marker = L.marker([<?= $td_1 . $td_2 ?>]).addTo(map)
            .bindPopup('<b><?=$tieude?></b><br /><?=$mota?>.<br /><a href="<?=$link_map?>" target="_blank">Xem trên Google map</a>').openPopup();

        var circle = L.circle([<?= $td_1 . $td_2 ?>], {
            color: 'red',
            fillColor: '#f035',
            fillOpacity: 0.5,
            radius: 500
        }).addTo(map).bindPopup('Vị trí bạn tìm trong khu vực này.');

        // var polygon = L.polygon([
        //     [<?= $td_1 . $td_2 ?>],
        //     [<?= $td_1 . $td_2 ?>],
        //     [<?= $td_1 . $td_2 ?>]
        // ]).addTo(map).bindPopup('Chào.');


        var popup = L.popup()
        	// .setLatLng([<?= $td_1 . $td_2 ?>])
        	// //.setContent('I am a standalone popup.')
        	// .openOn(map);
        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent('Bạn đang click vào tọa độ<br>' + e.latlng.toString().replace("LatLng(", "").toString().replace(")", "")+"<br>Đã sao chép tọa độ này")
                .openOn(map);

                var toado =  e.latlng.toString().replace("LatLng(", "").toString().replace(")", "");
                navigator.clipboard.writeText(toado);
        }

        map.on('click', onMapClick);
    </script>
    <div data-v-6d709352="">
        <!---->
    </div>
</body>
<div style="position: absolute; top: 0px; display: block !important;"></div>

</html>