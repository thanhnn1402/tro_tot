<?php
require_once("../admin/config.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm trọ sinh viên</title>
    <link rel="stylesheet" href="../pages/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../pages/assets/css/style.css">
    <link rel="stylesheet" href="../pages/assets/css/responsive.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pages/assets/css/themify-icons.css">
    <style>
        a{
            text-decoration: none;
            color: #000;
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
                            <li class="breadcrumb-item"><a href="#"><i class="fa-solid fa-house me-1"></i>Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tìm phòng trọ</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="offset-3 col-lg-6">
                    <div class="panel js-modal">
                        <div class="panel__body">
                            <div class="auth-form">
                                <form class="auth-form__container" method="POST" action="../pages/run_code.php">
                                    <div class="auth-form__header">
                                        <a class="auth-form__btn btn-js-register active">Đăng ký</a>
                                        <a class="auth-form__btn btn-js-login">Đăng nhập</a>
                                    </div>

                                    <div class="auth-form__form">
                                        <div class="auth-form__group">
                                            <input class="auth-form__input" name="last-name" type="text"  placeholder="Tên">
                                        </div>

                                        <div class="auth-form__group">
                                            <input class="auth-form__input" name="username" type="text"required  placeholder="Tên tài khoản">
                                        </div>

                                        <div class="auth-form__group">
                                            <input class="auth-form__input" name="email" type="text"  placeholder="Email">
                                        </div>

                                        <div class="auth-form__group">
                                            <input class="auth-form__input" name="phone" type="text"  placeholder="Số điện thoại">
                                        </div>

                                        <div class="auth-form__group">
                                            <input class="auth-form__input" name="password" type="password" required placeholder="Mật khẩu">
                                        </div>

                                        <div class="auth-form__group">
                                            <input class="auth-form__input" name="rpassword" type="password"  placeholder="Nhập lại mật khẩu">
                                        </div>
                                    </div>

                                    <div class="auth-form__aside">
                                        <p class="auth-form__policy-text">
                                            Bằng việc đăng kí, bạn đã đồng ý với chúng tôi về <a class="auth-form__policy-link" href="">Điều khoản dịch vụ</a> & <a class="auth-form__policy-link" href="">Chính sách bảo mật </a>
                                    </div>

                                    <div class="auth-form__controls">
                                        <a class="btn btn-outline-secondary js-btn--close-modal">TRỞ LẠI</a>
                                        <button id="btn-register" class="btn btn-register" type="submit" name="">ĐĂNG KÍ</button>
                                    </div>
                                </form>

                                <div class="auth-form__socials">
                                    <a href="" class="btn btn--with-icon btn--fb">
                                        <i class="fab fa-facebook-square auth-form__social-icon"></i> Kết nối facebook
                                    </a>

                                    <a href="" class="btn btn--with-icon btn--google">
                                        <img class="btn--with-icon-img auth-form__social-icon" src="https://img.icons8.com/fluency/48/000000/google-logo.png" alt=""> Kết nối google
                                    </a>
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
    <?php
        if(isset($_GET['loai'])){
            if($_GET['loai'] == 1){
            ?>
                <script>
                    $('input[name="first-name"]').css('display', 'none');
                    $('input[name="last-name"]').css('display', 'none');
                    $('input[name="email"]').css('display', 'none');
                    $('input[name="phone"]').css('display', 'none');
                    $('input[name="rpassword"]').css('display', 'none');
                    $('.auth-form__policy-text').css('display', 'none');

                    $('.btn-register').html('ĐĂNG NHẬP');
                    document.getElementById('btn-register').name = "DANGNHAP";

                    $('.btn-js-register').removeClass('active')
                    $('.btn-js-login').addClass('active');
                </script>
            <?php
            }
        }
    ?>
    <script>
        $(document).ready(function() {
            $('.btn-js-register').click(function() {
                $('input[name="first-name"]').css('display', 'block');
                $('input[name="last-name"]').css('display', 'block');
                $('input[name="email"]').css('display', 'block');
                $('input[name="phone"]').css('display', 'block');
                $('input[name="rpassword"]').css('display', 'block');
                $('.auth-form__policy-text').css('display', 'block');

                $('.btn-register').html('ĐĂNG KÝ');
                document.getElementById('btn-register').name = "DANGKY";



                $('.btn-js-login').removeClass('active')
                $(this).addClass('active');
            })

            $('.btn-js-login').click(function() {
                $('input[name="first-name"]').css('display', 'none');
                $('input[name="last-name"]').css('display', 'none');
                $('input[name="email"]').css('display', 'none');
                $('input[name="phone"]').css('display', 'none');
                $('input[name="rpassword"]').css('display', 'none');
                $('.auth-form__policy-text').css('display', 'none');

                $('.btn-register').html('ĐĂNG NHẬP');
                document.getElementById('btn-register').name = "DANGNHAP";

                $('.btn-js-register').removeClass('active')
                $(this).addClass('active');
            })
        });
    </script>
</body>

</html>