<?php
require_once("../admin/config.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nạp tiền</title>
    <link rel="stylesheet" href="../pages/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../pages/assets/css/style.css">
    <link rel="stylesheet" href="../pages/assets/css/responsive.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pages/assets/css/themify-icons.css">
    <style>
        ._close{
            max-width: 0px;
            max-height: 0px;
        }
    </style>
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
                            <li class="breadcrumb-item active" aria-current="page">Nạp tiền</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>


        <!-- Start Content-->
        <div class="profile">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="profile-left">
                            <div class="profile-left__heading">
                                <img src="../pages/assets/img/icon-256x256.png" alt="" id="avatar">
                                <div>
                                    <span><?=$_name?><i class="fa-solid fa-circle-check"></i></span>
                                    <span><?=$level?></span>
                                </div>
                            </div>
                            <div class="profile-left__body">
                            <a href="../profile" class="profile-left__tabs "><i class="fa-regular fa-user me-2"></i>Thông tin cá nhân</a>
                                
                                <a href="../nha-tro-yeu-thich" class="profile-left__tabs "><i class="fa-regular fa-heart me-2"></i> Nhà trọ đã lưu</a>
                                <a href="../thay-doi-mat-khau" class="profile-left__tabs  "><i class="fa-solid fa-gear me-2"></i> Thay đổi mật khẩu</a>
                                <a href="../pages/nap-tien.php" class="profile-left__tabs active"><i class="fa-solid fa-coins me-2"></i> Nạp tiền</a>
                                <a href="../loguot" class="profile-left__tabs "><i class="fa-solid fa-right-from-bracket me-2"></i>Đăng xuất</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <!--Thông tin cá nhân-->
                        <div class="profile-right active" id="tab-add-money">
                            <h6 class="profile-right__title ">NẠP TIỀN</h6>
                            <div class="profile-right__body p-0 mt-4">
                                <div class="profile-right__body-tabs">
                                    <a href="#ngan-hang" class="tabs active">Ngân Hàng</a>
                                    <a href="#momo" class="tabs">MoMo</a>
                                </div>
                                <p class="profile-right__title mt-4"></p>
                                <div class="profile-right__body-tabs-content mt-2 p-3">
                                    <div class="tab-content active" id="ngan-hang">
                                        <div class="row">
                                            <p class="text-lg-start fw-none">Nội dung chuyển khoản: <span class="fw-bold"><?=$user['username']?></span></p>
                                            <p class="text-lg-start fw-none">Chủ tài khoản: <span class="fw-bold">TRẦN HOÀI THƯƠNG</span></p>
                                            <p class="text-lg-start fw-none">Vietcombank: <span class="fw-bold">1017649334</span></p>
                                            <p class="text-lg-start fw-none">Agribank: <span class="fw-bold">7006281006801</span></p>
                                            <p class="text-lg-start text-danger fw-bold">* Nạp tự động, ghi đúng nội dung, tiền vào sau 3 - 5 phút </p>
                                        </div>
                                    </div>

                                    <div class="tab-content" id="momo">
                                        <div class="row">
                                            <p class="text-lg-start fw-none">Nội dung chuyển khoản: <span class="fw-bold"><?=$user['username']?></span></p>
                                            <p class="text-lg-start fw-none">Chủ tài khoản: <span class="fw-bold">TRẦN HOÀI THƯƠNG</span></p>
                                            <p class="text-lg-start fw-none">Số điện thoại: <span class="fw-bold">0776893780</span></p>
                                            <p class="text-lg-start text-danger fw-bold">* Nạp tự động, ghi đúng nội dung, tiền vào sau 3 - 5 phút </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Start footer-->
        <?php require_once('../admin/footer.php'); ?>
        <!-- End footer -->
    </div>
    <script src="../pages/assets/js/jquery-3.6.0.min.js"></script>
    <script src="../pages/assets/js/bootstrap.min.js"></script>
    <script src="../pages/assets/js/main.js"></script>
    <script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'></script>
    <script>
        var name_ = "<?= $user['name']; ?>";
        var email_ = "<?= $user['email']; ?>";
        var phone_ = "<?= $user['tel']; ?>";
        var tinh_tp_ = "<?= $user['diachi']; ?>";
        var quan_huyen_ = "<?= $user['diachi']; ?>";
        var link_avt_ = "<?= $user['link_avt']; ?>";
        document.getElementById('avatar_').src = link_avt_;
        document.getElementById('avatar').src = link_avt_;
        document.getElementById('avatar_1').src = link_avt_;
        document.getElementById('avatar_2').src = link_avt_;
        document.getElementById('avatar_3').src = link_avt_;

        document.getElementById('name').value = name_;
        document.getElementById('email').value = email_;
        document.getElementById('phone').value = phone_;
        document.getElementById('quan_huyen').value = quan_huyen_;

        document.getElementById('tinh_tp').value = " Tỉnh / Thành phố";
        if (tinh_tp_ != '') {
            document.getElementById('tinh_tp').value = tinh_tp;
        }
        document.getElementById('quan_huyen').value = "Quận / Huyện";
        if (quan_huyen_ != '') {
            document.getElementById('quan_huyen').value = quan_huyen;
        }
        document.getElementById("tinh_tp").innerHTML = "";



        
        $(document).ready(function() {
            var reader = new FileReader();
            const gridAva = $('.update-ava-label-1');
            $('.js-get-ava').change(function(e) {
                var files = e.target.files;
                var file = files[0];

                reader.readAsDataURL(file);

                reader.addEventListener('load', function(e) {
                    gridAva.children('img').attr('src', this.result);
                })
            })


        })
    </script>
</body>

</html>