<?php
require_once("../admin/config.php");

$CODE_TIM_KIEM = "";
if(isset($_POST['timkiem'])){
    $tim_ten_tro = "";
    if(strlen($_POST['tentro'])> 2){
        $tim_ten_tro = "`ten_tro` LIKE '%".$_POST['tentro']."%' AND";
    }
    $tim_vung = "";
    if(strlen(so_tinh(trim($_POST['calc_shipping_provinces'])))> 2 and strlen($_POST['calc_shipping_district'])> 2){
        $tim_vung = " `dia_chi` LIKE '%".$_POST['calc_shipping_district']." | ".so_tinh(trim($_POST['calc_shipping_provinces']))."%' AND";
    }
    $tim_gia = " `gia_phong` >= '1'";
    if(strlen($_POST['gia_phong'])> 0){
        if($_POST['gia_phong'] != "all"){
            if($_POST['gia_phong'] == "1"){
                $tim_gia = " `gia_phong` < '1000000'";
            }elseif($_POST['gia_phong'] == "2"){
                $tim_gia = " `gia_phong` >= '1000000' AND `gia_phong` <= '2000000'";
            }elseif($_POST['gia_phong'] == "3"){
                $tim_gia = " `gia_phong` >= '2000000' AND `gia_phong` <= '3000000'";
            }elseif($_POST['gia_phong'] == "4"){
                $tim_gia = " `gia_phong` >= '3000000' AND `gia_phong` <= '4000000'";
            }elseif($_POST['gia_phong'] == "5"){
                $tim_gia = " `gia_phong` > '4000000'";
            }
        }
    }
    $CODE_TIM_KIEM = "AND ".$tim_ten_tro.$tim_vung.$tim_gia;
}elseif(isset($_GET['vung'])){
    $tim_vung = "";
    if(strlen($_GET['vung'])> 2){
        $tim_vung = "AND `dia_chi` LIKE '%".urldecode($_GET['vung'])."%'";
        $CODE_TIM_KIEM = $tim_vung;
    }
}




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
</head>

<body>
    <div class="main">
        <!--  Header  -->
        <?php require_once('../admin/header.php'); ?>
        <!--End Header-->

        <!--start filter-->
        <div class="filter mt-4">
            <div class="container">
                <form class="form-filter" method="POST" action="">
                    <div class="row">
                        <div class="form-group-search col-lg-3 col-sm-12 mt-2">
                            <input class="form-control me-2" type="search" name="tentro" placeholder="Tên nhà trọ, Đường, Quận..." aria-label="Search">
                            <div class="history">
                                <h6 class="history__title">Lịch sử tìm kiếm</h6>                                
                                <ul class="history__list">
                                    <li><a href="">Lịch sử tìm kiếm1</a></li>
                                    <li><a href="">Lịch sử tìm kiếm1</a></li>
                                    <li><a href="">Lịch sử tìm kiếm1</a></li>
                                    <li><a href="">Lịch sử tìm kiếm1</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-12 mt-2">
                            <select class="w-100 form-select " name="calc_shipping_provinces" required="">
                                <option value="">Tỉnh / Thành phố</option>
                            </select>
                            <input class="billing_address_1" name="" type="hidden" value="">
                        </div>
                        <div class="col-lg-3 col-sm-12 mt-2">
                            <select class="w-100 form-select " name="calc_shipping_district" required="">
                                <option value="">Quận / Huyện</option>
                            </select>
                            <input class="billing_address_2" name="" type="hidden" value="">
                        </div>
                        <div class="col-lg-2 col-sm-12 mt-2">
                            <select class="form-select form-select mb-3" aria-label=".form-select-lg example" name="gia_phong">
                                <option selected value="">Giá tiền</option>
                                <option value="all">Tất cả</option>
                                <option value="1">Dưới 1 triệu</option>
                                <option value="2">Từ 1 - 2 triệu</option>
                                <option value="3">Từ 2 - 3 triệu</option>
                                <option value="4">Từ 3 - 4 triệu</option>
                                <option value="5">Trên 4 triệu</option>
                            </select>
                        </div>
                        <div class="col-lg-1 col-sm-12 mt-2">
                            <button class="btn btn-outline-primary" type="submit" name="timkiem" style="width: 100%;"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>

        <!-- Start Breadcrumb-->
        <div class="container">
            <div class="row mt-3">
                <div class="col-lg-12">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../trang-chu"><i class="fa-solid fa-house me-1"></i>Trang chủ</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Start Content-->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-sm-12">
                        <?php
                        $SQL = "SELECT * FROM `posts` WHERE `ngay_het_han` >= CURRENT_DATE ".$CODE_TIM_KIEM;
                        //echo $SQL;
                        $tong_kq = mysqli_num_rows($ketnoi->query($SQL));
                        if($tong_kq > 10){
                            $count_show = "10";
                        }else{
                            $count_show = $tong_kq;
                        }
                        ?>
                        <div class="result-detail">
                            <span>1 - <?=$count_show?></span> Trong <span><?=$tong_kq?></span> kết quả
                        </div>

                        <div class="row">
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
                            
                            //echo($SQL);
                            $querryy = $ketnoi->query($SQL);
                            while ($row = mysqli_fetch_array($querryy)) {
                                $id = $row['id'];
                                $ten_tro = $row['ten_tro'];
                                $dia_chi = str_replace("|",",",$row['dia_chi']);
                                $mo_ta = substr($row['mo_ta'], 0, 100) . '... <a href="../product-detail?id=' . $id . '">Xem thêm</a>';
                                $gia_phong = tien($row['gia_phong'])."đ";
                                $ngay_dang_tin = $row['ngay_dang_tin'];
                                $hinh_anh = explode(",", $row['hinh_anh'])[0];

                                $luot_thich = mysqli_num_rows($ketnoi->query("SELECT * FROM `likes` WHERE  `id_baidang` = '" . $id . "'"));


                                $i++;
                                if ($i >= ($so_tab - 10) and $i < $so_tab) {
                            ?>
                                    <div class="col-lg-12 col-12">
                                        <div class="product">
                                            <div class="row">
                                                <div class="product__img col-lg-5 col-sm-5 col-12">
                                                    <a href="../product-detail?id=<?= $id ?>"><img src="<?= $hinh_anh ?>" alt=""></a>
                                                </div>
                                                <div class="product__infor col-lg-7 col-sm-7 col-12">
                                                    <a href="../product-detail?id=<?= $id ?>" class="product__name"><?= $ten_tro ?></a>
                                                    <div class="product__review my-1">
                                                        <span class="product__address"><i class="fa-solid fa-thumbs-up me-1"></i> Có <?= $luot_thich ?> người thích địa điểm này</span>
                                                    </div>
                                                    <span class="product__address"><?= $dia_chi; ?></span><br />
                                                    <span class="product__des my-1"><?= $mo_ta ?></span><br />
                                                    <span class="product__price"><?= $gia_phong ?></span><br />
                                                    <span class="product__time">Ngày đăng: <?= $ngay_dang_tin ?></span><br />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            } ?>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="category">
                            <h6 class="category__title">Khu vực</h6>
                            <a href="../trang-chu?vung=Thành phố Hồ Chí Minh" class="category__link"><i class="fa-solid fa-angles-right me-2"></i>TPHCM<span>(<?=cout_vung($ketnoi,"Thành phố Hồ Chí Minh")?>)</span></a>
                            <a href="../trang-chu?vung=Hà Nội" class="category__link"><i class="fa-solid fa-angles-right me-2"></i>Hà Nội<span>(<?=cout_vung($ketnoi,"Hà Nội")?>)</span></a>
                            <a href="../trang-chu?vung=Đà Nẵng" class="category__link"><i class="fa-solid fa-angles-right me-2"></i>Đà Nẵng<span>(<?=cout_vung($ketnoi,"Đà Nẵngi")?>)</span></a>
                            <a href="../trang-chu?vung=Cần Thơ" class="category__link"><i class="fa-solid fa-angles-right me-2"></i>Cần Thơ<span>(<?=cout_vung($ketnoi,"Cần Thơ")?>)</span></a>
                            <a href="../trang-chu?vung=Hải Phòng" class="category__link"><i class="fa-solid fa-angles-right me-2"></i>Hải Phòng<span>(<?=cout_vung($ketnoi,"Hải Phòng")?>)</span></a>
                        </div>


                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <nav class="mt-4" aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="../trang-chu?page=<?= $page - 3 ?>"><i class="fa-solid fa-angles-left"></i></a></li>
                                <?php
                                if ($page == 1) { ?>
                                    <li class="page-item"><a class="page-link active" href="../trang-chu?page=1">1</a></li>
                                    <li class="page-item"><a class="page-link" href="../trang-chu?page=2">2</a></li>
                                    <li class="page-item"><a class="page-link" href="../trang-chu?page=3">3</a></li>
                                <?php } else { ?>
                                    <li class="page-item"><a class="page-link" href="../trang-chu?page=<?= $page - 1 ?>"><?= $page - 1 ?></a></li>
                                    <li class="page-item"><a class="page-link active" href="../trang-chu?page=<?= $page ?>"><?= $page ?></a></li>
                                    <li class="page-item"><a class="page-link" href="../trang-chu?page=<?= $page + 1 ?>"><?= $page + 1 ?></a></li>
                                <?php }
                                ?>

                                <li class="page-item"><a class="page-link" href="../trang-chu?page=<?= $page + 3 ?>"><i class="fa-solid fa-angles-right"></i></a></li>
                            </ul>
                        </nav>
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