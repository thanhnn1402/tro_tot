<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông báo</title>
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
                            <li class="breadcrumb-item active" aria-current="page">Thông tin tài khoản</li>
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
                                <img src="../pages/assets/img/icon-256x256.png" alt="">
                                <div>
                                    <span>Thanh</span>
                                    <span>Thành viên mới <i class="fa-solid fa-circle-check"></i></span>
                                </div>
                            </div>
                            <div class="profile-left__body">
                                <a href="../profile" class="profile-left__tabs "><i class="fa-regular fa-user me-2"></i>Thông tin cá nhân</a>
                                <a href="../thong-bao" class="profile-left__tabs active"><i class="fa-regular fa-bell me-2"></i> Thông báo & tìm kiếm</a>
                                <a href="../nha-tro-yeu-thich" class="profile-left__tabs"><i class="fa-regular fa-heart me-2"></i> Nhà trọ đã lưu</a>
                                <a href="../thay-doi-mat-khau" class="profile-left__tabs"><i class="fa-solid fa-gear me-2"></i> Thay đổi mật khẩu</a>
                                <a href="../loguot" class="profile-left__tabs"><i class="fa-solid fa-right-from-bracket me-2"></i>Đăng xuất</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">

                        <!--Danh sách thông báo-->
                        <div class="profile-right active" id="tab-notify">
                            <h6 class="profile-right__title">DANH SÁCH THÔNG BÁO</h6>
                            <div class="profile-right__body">
                                <a href="" class="notify__item">
                                    <h6>Thông báo 1</h6>
                                    <p>11/07/2022</p>
                                </a>
                                <a href="" class="notify__item">
                                    <h6>Thông báo 1</h6>
                                    <p>11/07/2022</p>
                                </a>
                                <a href="" class="notify__item">
                                    <h6>Thông báo 1</h6>
                                    <p>11/07/2022</p>
                                </a>
                                <a href="" class="notify__item">
                                    <h6>Thông báo 1</h6>
                                    <p>11/07/2022</p>
                                </a>
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