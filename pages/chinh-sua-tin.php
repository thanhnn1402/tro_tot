<?php
error_reporting(0);
require_once("../admin/config.php");
kiem_tra_user();

if(isset($_GET['ID'])){
    $hang = [];
    $idhh = $_GET['ID'];
    $hang = $ketnoi->query("SELECT * FROM `posts` WHERE `id` = '".$idhh."'")->fetch_array();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa tin đăng</title>
    <link rel="stylesheet" href="../pages/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../pages/assets/css/style.css">
    <link rel="stylesheet" href="../pages/assets/css/responsive.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pages/assets/css/themify-icons.css">
</head>

<body>
    <div class="main">
        <!--  Header  -->
        <?php require_once('../admin/header.php'); ?>
        <!--End Header-->

        <!-- Start Breadcrumb-->
        <div class="container">
            <div class="row mt-3">
                <div class="col-lg-12">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../pages/index.html"><i class="fa-solid fa-house me-1"></i>Trang chủ</a></li>
                            <li class="breadcrumb-item active">Chỉnh sửa tin</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="edit-post">
                        <div class="edit-post__title">
                            <h6>CHỈNH SỬA TIN ĐĂNG</h6>
                        </div>
                        <div class="edit-post__body">
                            <form action="../pages/run_code.php" method="POST" enctype="multipart/form-data">
                                <div class="row g-3 align-items-center my-3 my-3">
                                    <div class="col-3">
                                        <label for="form-name" class="col-form-label">Mã bài viết</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="number" id="id_baiviet" name="id_" class="form-control w-75" disabled>
                                    </div>
                                </div>

                                <div class="row g-3 align-items-center my-3 my-3">
                                    <div class="col-3">
                                        <label for="form-name" class="col-form-label">Tên nhà trọ</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" id="tieude" class="form-control w-75" name="ten_tro" value="<?=$hang['ten_tro']?>" placeholder="Tên nhà trọ">
                                    </div>
                                </div>

                                <div class="row g-3 align-items-center my-3">
                                    <div class="col-3">
                                        <label for="inputPassword6" class="col-form-label">Chọn địa chỉ mới, giữ nguyên nếu không cập nhật</label>
                                    </div>
                                    <div class="col-9">
                                    <select id="provinces" class="w-75 form-select " name="calc_shipping_provinces" required="">
                                        <option value="">Tỉnh / Thành phố</option>
                                    </select>
                                    <input class="billing_address_1" name="" type="hidden" value="">
                                    </div>
                                </div>

                                <div class="row g-3 align-items-center">
                                    <div class="col-3">
                                        <label for="inputPassword6" class="col-form-label"></label>
                                    </div>
                                    <div class="col-9">
                                    <select id="district" class="w-75 form-select " name="calc_shipping_district" required="" onchange="myFunction()">
                                        <option value="">Quận / Huyện</option>
                                    </select>
                                    <input class="billing_address_2" name="" type="hidden" value="">
                                    </div>
                                </div>

                                <div class="row g-3 align-items-center my-3 my-3">
                                    <div class="col-3">
                                        <label for="form-name" class="col-form-label">Địa chỉ là</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" id="dia_chi__" class="form-control w-75" name="dia_chi__" value="<?=$hang['dia_chi']?>" >
                                    </div>
                                </div>

                                <div class="row g-3 align-items-center my-3 my-3">
                                    <div class="col-3">
                                        <label for="form-name" class="col-form-label">Tọa độ trên googile map</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" id="toa_do" class="form-control w-75" name="toa_do" value="<?=explode("&",explode("vung=",$hang['link_map'])[1])[0]?>"  placeholder="Tìm tọa độ vị trí cụ thể của bạn bên dưới">
                                    </div>
                                </div>

                                <div class="row g-3 align-items-center my-3 my-3">
                                    <div class="col-3">
                                        <label for="form-name" class="col-form-label">Mô tả cho tọa độ</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="text" id="mo_ta" class="form-control w-75" name="mo_ta_map" value="<?=explode("mota=",$hang['link_map'])[1]?>" placeholder="Mô tả cho tọa độ" maxlength="30">
                                    </div>
                                    <div class="col-4">
                                        <span style="background-color: silver;color: currentColor;border-radius: 4px;padding: 5px;" onclick="load_map()">Load lại tọa độ</span>
                                    </div>
                                    <div class="col-12">
                                        <span>Bạn có thể chọn chính xác vị trí của mình trên bản đồ bên dưới và dán tọa độ vào ô "tọa độ trên googile map" để khách hàng dễ dàng tìm đến vị trí của bạn.</span>
                                    </div>
                                </div>

                                <div class="row g-3 align-items-center my-3 my-3">
                                    <div class="col-12">
                                        <object id="maps" data="<?=$hang['link_map']?>&width=100%" width="100%" height="420px"></object>
                                    </div>
                                </div>

                                <div class="row g-3 align-items-center my-3 my-3">
                                    <div class="col-3">
                                        <label for="form-name" class="col-form-label">Giá phòng trọ</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="number" id="form-name" class="form-control w-75" name="gia_tro" value="<?=$hang['gia_phong']?>" placeholder="Nhập giá phòng">
                                    </div>
                                </div>


                                <div class="row g-3 align-items-center my-3">
                                    <div class="col-3">
                                        <label for="exampleFormControlTextarea1" class="col-form-label">Mô tả</label>
                                    </div>
                                    <div class="col-9">
                                        <textarea class="form-control w-75" name="mo_ta" id="exampleFormControlTextarea1" rows="3" maxlength="2000" placeholder="Mô tả về tiện nghi phòng trọ, hoặc chi tiết vị trí..."><?=dec_content($hang['mo_ta'])?></textarea>
                                    </div>
                                </div>

                                <div class="row g-3 align-items-center my-3">
                                    <div class="col-3">
                                        <label for="formFileMultiple" class="col-form-label">Hình ảnh</label>
                                    </div>
                                    <div class="col-9">
                                        <input type="file" name="upload[]" id="formFileMultiple" class="form-control w-75 js-get-img" multiple="multiple">
                                        <div class="form-text">Vui lòng chọn ít nhất 4 ảnh - Nhiều nhất 10 ảnh</div>
                                    </div>
                                </div>


                                <div class="row g-3 align-items-center my-3">
                                    <div class="col-3">
                                        <label for="inputPassword6" class="col-form-label"></label>
                                    </div>
                                    <div class="col-9">
                                        <div class="js-show-img show-img">

                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="UPDATE_POSTS" value="<?=$_GET['ID']?>">Cập nhật bài viết</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!--Start footer-->
        <?php require_once('../admin/footer.php'); ?>
        <!-- End footer -->
    </div>
    <script>
        document.getElementById('id_baiviet').value = <?=$_GET['ID']?>;
        function load_map() {
            var index = document.getElementById('provinces').value;
            var tieude = document.getElementById('tieude').value;
            var mota = document.getElementById('mo_ta').value;
            var vung = document.getElementById('district').value + " "+ document.getElementById('provinces').children[index].innerHTML;
            document.getElementById('maps').data = "../pages/getmap.php?width=100%&vung="+encodeURIComponent(vung)+"&tieude="+tieude+"&mota="+mota;
        }
        function myFunction() {
            var index = document.getElementById('provinces').value;
            var tieude = document.getElementById('tieude').value;
            var vung = document.getElementById('district').value + " "+ document.getElementById('provinces').children[index].innerHTML;
            document.getElementById('toa_do').value = vung;
            document.getElementById('dia_chi__').value = document.getElementById('district').value + " | "+ document.getElementById('provinces').children[index].innerHTML;
            document.getElementById('maps').data = "../pages/getmap.php?width=100%&vung="+encodeURIComponent(vung)+"&tieude="+tieude;
        }
        function tong_gia(){
            var songay = document.getElementById('so_ngay').value;
            var giatien = 1000 * songay;
            var giatien =  number_format(giatien,0,'.',',')+" đ";
            document.getElementById('gia_tien').value = giatien;
        }
        function number_format (number, decimals, dec_point, thousands_sep) {
            // Strip all characters but numerical ones.
            number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function (n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }
    </script>
    <script src="../pages/assets/js/jquery-3.6.0.min.js"></script>
    <script src="../pages/assets/js/bootstrap.min.js"></script>
    <script src="../pages/assets/js/main.js"></script>
    <script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'></script>

</body>

</html>