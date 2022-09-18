

<?php
require_once("../admin/config.php");
kiem_tra_user();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhà trọ đã lưu</title>
    <link rel="stylesheet" href="../pages/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../pages/assets/css/style.css">
    <link rel="stylesheet" href="../pages/assets/css/responsive.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pages/assets/css/themify-icons.css">
    <style>
        .profile-right__link {
            display: block;
        }
        .btn-like-product {
            color: #000;
        }
        .profile-right__link-text a {
            display: inline-flex;
            flex-direction: column;
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
                                <img src="../pages/assets/img/icon-256x256.png" alt="" id="avatar">
                                <div>
                                    <span><?=$_name?><i class="fa-solid fa-circle-check"></i></span>
                                    <span><?=$level?></span>
                                </div>
                            </div>
                            <div class="profile-left__body">
                            <a href="../profile" class="profile-left__tabs "><i class="fa-regular fa-user me-2"></i>Thông tin cá nhân</a>
                                
                                <a href="../nha-tro-yeu-thich" class="profile-left__tabs active"><i class="fa-regular fa-heart me-2"></i> Nhà trọ đã lưu</a>
                                <a href="../thay-doi-mat-khau" class="profile-left__tabs  "><i class="fa-solid fa-gear me-2"></i> Thay đổi mật khẩu</a>
                                <a href="../pages/nap-tien.php" class="profile-left__tabs"><i class="fa-solid fa-coins me-2"></i> Nạp tiền</a>
                                <a href="../loguot" class="profile-left__tabs "><i class="fa-solid fa-right-from-bracket me-2"></i>Đăng xuất</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <!--NHÀ TRỌ YÊU THÍCH-->
                        <div class="profile-right tab-content active" id="tab-like">
                            <h6 class="profile-right__title">NHÀ TRỌ YÊU THÍCH</h6>

                            <div class="profile-right__body p-0">
                                <div class="profile-right__list">
                                    <?php
                                    $page = 1;
                                    if (isset($_GET['page'])) {
                                        $page = $_GET['page'];
                                    }
                                    if ($page == "" or $page < 1) {
                                        $page = 1;
                                    }
                                    $so_tab = $page * 10;
                                    $i = 0;

                                    $SQL = "SELECT * FROM `likes` WHERE `username` = '".$user['username']."' ORDER BY `id` DESC";
                                    // echo($SQL);
                                    $querryy = $ketnoi->query($SQL);
                                    while ($row = mysqli_fetch_array($querryy)) {
                                        $id = $row['id_baidang'];
                                        $posts = $ketnoi->query("SELECT * FROM `posts` WHERE `id` = '".$id."'")->fetch_array();
                                        $ten_tro = $posts['ten_tro'];
                                        $dia_chi = str_replace("|",",",$posts['dia_chi']);
                                        $mo_ta = substr($posts['mo_ta'], 0, 50) . '... <a href="../product-detail?id=' . $id . '">Xem thêm</a>';
                                        $gia_phong = tien($posts['gia_phong'])."đ";
                                        $ngay_dang_tin = $posts['ngay_dang_tin'];
                                        $hinh_anh = explode(",", $posts['hinh_anh'])[0];

                                        $i++;
                                        if ($i >= ($so_tab - 10) and $i < $so_tab) {
                                    ?>
                                        <div class="profile-right__link">
                                            <div class="row">
                                                <div class="col-lg-4 col-4">
                                                    <a href="product-detail?id=<?=$id?>">
                                                        <img src="<?=$hinh_anh?>" alt="">
                                                    </a>
                                                </div>
                                                <div class="col-lg-8 col-8">
                                                    <div class="profile-right__link-text">
                                                        <a href="product-detail?id=<?=$id?>" class="text-decoration-none">
                                                            <h6 class="profile-right__link-text__name"><?=$ten_tro?></h6>
                                                            <span class="profile-right__link-text__address"><?=$dia_chi?></span>
                                                            <span class="profile-right__link-text__price"><?=$gia_phong?></span>
                                                            <span class="profile-right__link-text__desc"><?=$mo_ta?></span>
                                                            <span class="profile-right__link-text__time"><?=$ngay_dang_tin?></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        }
                                    }
                                    ?>

                                </div>

                                <div class="row">
                                    <div class="col-lg-12 d-flex justify-content-center">
                                        <nav class="mt-4" aria-label="Page navigation example">
                                            <ul class="pagination">
                                            <li class="page-item"><a class="page-link" href="./nha-tro-yeu-thich?page=<?= $page - 3 ?>"><i class="fa-solid fa-angles-left"></i></a></li>
                                            <?php
                                            if ($page == 1) { ?>
                                                <li class="page-item"><a class="page-link active" href="./nha-tro-yeu-thich?page=1">1</a></li>
                                                <li class="page-item"><a class="page-link" href="./nha-tro-yeu-thich?page=2">2</a></li>
                                                <li class="page-item"><a class="page-link" href="./nha-tro-yeu-thich?page=3">3</a></li>
                                            <?php } else { ?>
                                                <li class="page-item"><a class="page-link" href="./nha-tro-yeu-thich?page=<?= $page - 1 ?>"><?= $page - 1 ?></a></li>
                                                <li class="page-item"><a class="page-link active" href="./nha-tro-yeu-thich?page=<?= $page ?>"><?= $page ?></a></li>
                                                <li class="page-item"><a class="page-link" href="./nha-tro-yeu-thich?page=<?= $page + 1 ?>"><?= $page + 1 ?></a></li>
                                            <?php }
                                            ?>

                                            <li class="page-item"><a class="page-link" href="./nha-tro-yeu-thich?page=<?= $page + 3 ?>"><i class="fa-solid fa-angles-right"></i></a></li>
                                            </ul>
                                        </nav>
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