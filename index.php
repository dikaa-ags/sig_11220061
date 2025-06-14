<?php
session_start();
?>
<!DOCTYPE html PUBLIC="-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Contoh Aplikasi Peta GIS Sederhana Dengan Google Maps API</title>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBEogdqk3PVqvTOUFIVAaiCZQE5akwg-Yc">
</script>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
    var peta;
    var koorAwal = new google.maps.LatLng(-7.329579339811421, 108.2196256616021);
    var marker;

    function peta_awal(){
        loadDataLokasiTersimpan();

        var settingpeta = {
            zoom:15,
            center:koorAwal,
            mapTypeId:google.maps.MapTypeId.HYBRID
        };
        peta = new google.maps.Map(document.getElementById("kanvaspeta"),settingpeta);
        google.maps.event.addListener(peta,'click',function(event){
            tandai(event.latLng);
        });
    }

    function tandai(lokasi){
        $("#koorX").val(lokasi.lat()); 
        $("#koorY").val(lokasi.lng()); 
        marker = new google.maps.Marker({ position: lokasi, map: peta });
    }

    $(document).ready(function(){
        $("#simpanpeta").click(function(){
            var koordinat_x = $("#koorX").val();
            var koordinat_y = $("#koorY").val();
            var nama_tempat = $("#namaTempat").val();

            $.ajax({ 
                url: "simpan_lokasi_baru.php", 
                data: "koordinat_x="+koordinat_x+"&koordinat_y="+koordinat_y+"&nama_tempat="+nama_tempat,
                success: function(msg){
                    $("#namaTempat").val('');
                    loadDataLokasiTersimpan();
                }
            });
        });
    });

    function loadDataLokasiTersimpan(){
      $('#kordinattersimpan').load('tampilkan_lokasi_tersimpan.php'); 
    }

    setInterval (loadDataLokasiTersimpan, 3000);

    function carikordinat(lokasi){
        var settingpeta = {
            zoom:15,
            center:lokasi,
            mapTypeId:google.maps.MapTypeId.HYBRID
        };
        peta = new google.maps.Map(document.getElementById("kanvaspeta"),settingpeta);
        marker = new google.maps.Marker({ position: lokasi, map: peta });
        google.maps.event.addListener(peta,'click',function(event){
            tandai(event.latLng);
        });
    }

    function gantipeta(){
        loadDataLokasiTersimpan();

        var isi = document.getElementById('cmb').value;

        var settingpeta = {
            zoom:15,
            center:koorAwal,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
        if(isi=='2') settingpeta.mapTypeId = google.maps.MapTypeId.TERRAIN;
        if(isi=='3') settingpeta.mapTypeId = google.maps.MapTypeId.SATELLITE;
        if(isi=='4') settingpeta.mapTypeId = google.maps.MapTypeId.HYBRID;

        peta = new google.maps.Map(document.getElementById("kanvaspeta"),settingpeta);
        google.maps.event.addListener(peta,'click',function(event){
            tandai(event.latLng);
        });
    }
</script>

<style>
body{
    font-size:12px;
    font-family:Tahoma;
    margin:0px auto;
    padding:0px;
    color:#FFFFFF;
    background-color:#333333;
}
a{
    text-decoration:none;
    color:#FF0000;
    font-weight:bold;
}
a:hover{
    color:#FF9900;
}
ul{
    margin:0px auto;
    padding:0px 15px 0px 15px;
    list-style:square;
}
li{
    padding-bottom:5px;
}
input,select,button{
    padding:5px;
    border:1px solid #FFFFFF;
    background-color:#FF9900;
}
input,button{
    padding:5px;
    border:1px solid #FFFFFF;
    background-color:#FF9900;
}
button:hover{
    padding:5px;
    border:1px solid #FFFFFF;
    background-color:#FF3300;
    cursor:pointer;
}
</style>
</head>
<body onLoad="peta_awal()">
    <div id="kanvaspeta" style="margin:0px auto; width:72%; height:630px; float:right; padding:10px;"></div>
    <div id="form_lokasi" style="background-color:#333333; width:23%; height:600px; text-align:left; padding:10px; float:left">
        <h3>Menu</h3>
        <table>
            <tr>
                <td>Ganti Jenis Peta</td>
                <td>:
                    <select id="cmb" onchange="gantipeta()">
                        <option value="1">Peta Roadmap</option>
                        <option value="2">Peta Terrain</option>
                        <option value="3">Peta Satellite</option>
                        <option value="4">Peta Hybrid</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Koordinat X</td>
                <td>: <input type="text" id="koorX" readonly="readonly"></td>
            </tr>
            <tr>
                <td>Koordinat Y</td>
                <td>: <input type="text" id="koorY" readonly="readonly"></td>
            </tr>
            <tr>
                <td>Nama Lokasi</td>
                <td>: <input type="text" id="namaTempat"><br></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button id="simpanpeta">Simpan</button>
                    <button onclick="javascript:carikordinat(koorAwal)">Koordinat Awal</button>
                </td>
            </tr>
        </table>

        <div id="kordinattersimpan"><!-- daftar lokasi --></div>

        <?php
        if (!isset($_SESSION['login'])) {
        ?>
            <form method="POST" action="login.php">
                <table width='80%' border='0'>
                    <tr><th colspan='2' align='center'>Login</th></tr>
                    <tr><td>Username</td><td><input type='text' name='user' size='10'></td></tr>
                    <tr><td>Password</td><td><input type='password' name='pass' size='10'></td></tr>
                    <tr><th colspan='2' align='center'><input type='submit' name='tombol' value='OK'></th></tr>
                </table>
            </form>
        <?php
        } else {
            echo "<p align='center'>Anda login sebagai <b>" . $_SESSION['username'] . "</b> | <a href='logout.php'>LOGOUT</a></p>";

            echo "<h3>Daftar Nama Tempat</h3>";

            include "koneksi.php";

            $query = mysqli_query($koneksi,"SELECT * FROM kordinat_gis");

            echo "<ul>";
    while ($row = mysqli_fetch_assoc($query)) {
        $color = $row['status']==1 ? "red" : "white";

        echo "<li style='color: $color'>{$row['nama_tempat']} 
                <a href='hapus.php?id={$row['nomor']}'
                   onclick='return confirm(\'Yakin ingin menghapus?\')'><img src='hapus.png' alt='Hapus' width='16' height='16'></a></li>";
    }
    echo "</ul>";
        }
        ?>
    </div><!-- form_lokasi -->
</body>
</html>

