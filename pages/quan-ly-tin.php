
<?php
error_reporting(0);
require_once("../admin/config.php");
kiem_tra_user();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tin đăng</title>
    <link rel="stylesheet" href="../pages/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../pages/assets/css/style.css">
    <link rel="stylesheet" href="../pages/assets/css/responsive.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pages/assets/css/themify-icons.css">
    <style>

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
                            <li class="breadcrumb-item active">Quản lý tin</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="post-content">
                        <h6 class="post-content__title">QUẢN LÝ TIN ĐĂNG</h6>
                        <!--div class="post-content__heading">
                            <div class="row mx-0">
                                <div class="col-lg-2 col-md-3 col-4 px-0 ">
                                    <a href="#post-success" class="tabs active">Đăng thành công (1)</a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-4 px-0">
                                    <a href="#post-waiting" class="tabs">Chờ xử lý (0)</a>
                                </div>
                                <div class="col-lg-2 col-md-2 col-4 px-0">
                                    <a href="#post-error" class="tabs">Tin lỗi (0)</a>
                                </div>
                                <div class="col-lg-6 col-md-5 col-12">
                                    <div class="post-search">
                                        <form action="">
                                            <input type="text" placeholder="Nhập mã tin">
                                            <input type="submit" name="" value="Tìm kiếm">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div-->
                        <div class="post-content__body">
                            <!--Tin đăng thành công-->
                            <div class="tab-content active" id="post-success">
                                <table>
                                    <tr>
                                        <th>Mã tin</th>
                                        <th>Tên nhà trọ</th>
                                        <th>Hình ảnh</th>
                                        <th>Ngày đăng</th>
                                        <th>Ngày hết hạn</th>
                                        <th>Còn phòng</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                    $SQL = "SELECT * FROM `posts` WHERE `username` = '".$user['username']."' ORDER BY `id` DESC";
                                    // echo($SQL);
                                    $querryy = $ketnoi->query($SQL);
                                    while ($row = mysqli_fetch_array($querryy)) {
                                        $id = $row['id'];
                                        $ten_tro = $row['ten_tro'];
                                        $dia_chi = str_replace("|",",",$row['dia_chi']);
                                        $mo_ta = substr($row['mo_ta'], 0, 50) . '... <a href="../product-detail?id=' . $id . '">Xem thêm</a>';
                                        $gia_phong = tien($row['gia_phong'])."đ";
                                        $ngay_dang_tin = $row['ngay_dang_tin'];
                                        $ngay_het_han = $row['ngay_het_han'];
                                        $hinh_anh = explode(",", $row['hinh_anh'])[0];
                            
                                    ?>
                                    <tr>
                                        <td><?=$id?></td>
                                        <td><a href="../product-detail?id=<?=$id?>" style="text-decoration: none; background-color:#fff; color:black;"><?=$ten_tro?></a></td>
                                        <td><img src="<?=$hinh_anh?>" alt=""></td>
                                        <td><?=$ngay_dang_tin?></td>
                                        <td><?=$ngay_het_han?></td>
                                        <td>
                                        <form>
                                            <div class="form-check d-flex align-items-center justify-content-center">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                                            </div>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="../chinh-sua-tin?ID=<?=$id?>"><i class="fa-solid fa-pen-to-square me-1"></i>Sửa</a>
                                            <a href="../pages/run_code.php?DELETE_POSTS&ID=<?=$id?>"><i class="fa-solid fa-trash-can me-1"></i>Xóa</a>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>


                            <!--Tin đang xử lý-->
                            <div class="tab-content" id="post-waiting">
                                <table class="w-100 ">
                                    <tr>
                                        <th>Mã tin</th>
                                        <th>Tên nhà trọ</th>
                                        <th>Giá tiền</th>
                                        <th>Hình ảnh</th>
                                        <th>Ngày đăng</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>


                            <!--Tin lỗi-->
                            <div class="tab-content" id="post-error">
                                <table class="w-100 ">
                                    <tr>
                                        <th>Mã tin</th>
                                        <th>Tên nhà trọ</th>
                                        <th>Giá tiền</th>
                                        <th>Hình ảnh</th>
                                        <th>Ngày đăng</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <nav class="mt-4" aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#"><i class="fa-solid fa-angles-left"></i></a></li>
                            <li class="page-item"><a class="page-link active" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fa-solid fa-angles-right"></i></a></li>
                        </ul>
                    </nav>
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
</body>

</html>