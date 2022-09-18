<?php
require_once("../admin/config.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ hỗ trợ</title>
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
                            <li class="breadcrumb-item active">Liên hệ hỗ trợ</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>


        <div class="support-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h6 class="support-content__tile">LIÊN HỆ VỚI CHÚNG TÔI</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="support-content__body-left">
                            <div class="support-content__body-left__item">
                                <span>Điện thoại:</span>
                                <a href="tel: 0966480302"><i class="fa-solid fa-phone me-2"></i>0966.480.302</a>
                            </div>
                            <div class="support-content__body-left__item">
                                <span>Email:</span>
                                <a href="mailto: thanh.ledah@gmail.com"><i class="fa-regular fa-envelope me-2"></i>thanh.ledah@gmail.com</a>
                            </div>
                            <div class="support-content__body-left__item">
                                <span>Fanpage:</span>
                                <a href=""><i class="fa-brands fa-facebook-square me-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="support-content__body-right">
                            <form action="../pages/run_code.php" method="POST">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputText1" class="form-label">Tiêu đề</label>
                                    <input type="text" name="tieude" class="form-control" id="exampleInputText1">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlTextarea1">Nội dung</label>
                                    <textarea class="form-control" name="noidung" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <button type="submit" name="POSTS_SUPPORT" class="btn btn-primary">Xác nhận</button>
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

    <script src="../pages/assets/js/jquery-3.6.0.min.js"></script>
    <script src="../pages/assets/js/bootstrap.min.js"></script>
    <script src="../pages/assets/js/main.js"></script>
    <script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'></script>

</body>

</html>