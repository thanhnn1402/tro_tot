<?php
error_reporting(0);
require_once("../admin/config.php");




if(isset($_GET['id'])){
    $hang = [];
    $idhh = $_GET['id'];
    $hang = $ketnoi->query("SELECT * FROM `posts` WHERE `id` = '".$idhh."'")->fetch_array();
    $like = $ketnoi->query("SELECT * FROM `likes` WHERE `username` = '".$user['usename']."' AND `id_baidang` = '".$idhh."'")->fetch_array();
    $class_like_1 = "btn-like-product active";
    $class_like_2 = "fa-solid fa-heart";
    $link_like = "../pages/run_code.php?LIKES=unlike&ID=".$idhh;
    if(empty($like)){
        $class_like_1 = "btn-like-product";
        $class_like_2 = "fa-regular fa-heart";
        $link_like = "../pages/run_code.php?LIKES=like&ID=".$idhh;
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
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="../pages/assets/css/themify-icons.css">
    <style>
        .btn-like-product {
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

        <!--Start content-->

        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="slider">
                                    <?php
                                    for($i = 0; $i <= 10; $i++){
                                        $anh = explode(",",$hang['hinh_anh'])[$i];
                                        if(strlen($anh) < 5){
                                            break;
                                        }
                                    ?>
                                    <div class="slider__item set-bg set-bg--70" data-setbg="<?=$anh?>">
                                        
                                    </div>
                                    <?php } ?>
                                </div>

                                <!----------------------------------------------------------------------------->

                                <div class="thumbnail__slider">
                                    <?php
                                    for($i = 0; $i <= 10; $i++){
                                        $anh = explode(",",$hang['hinh_anh'])[$i];
                                        if(strlen($anh) < 5){
                                            break;
                                        }
                                    ?>
                                    <div class="thumbnail__item set-bg set-bg--70" style="max-width: 98%" data-setbg="<?=$anh?>"></div>
                                    <?php } ?>
                                </div>

                                <!----------------------------------------------------------------------------->
                    
                                <div class="product-detail">
                                    <a hre="" class="product-detail__name">
                                        <?=$hang['ten_tro']?>
                                        <span class="text-success text-decoration-underline fs-6 ms-2">Còn phòng</span>
                                        <span class="text-danger text-decoration-underline fs-6 ms-2">Hết phòng</span>
                                    </a>
                                    <div class="product-detail__address"><i class="fa-solid fa-location-dot me-1"></i><?=str_replace("|","-",$hang['dia_chi'])?>  <a href="#bando">Xem bản đồ</a> </div>
                                    <div class="product-detail__price">
                                        <span><?=tien($hang['gia_phong'])."đ";?></span>
                                        <a class="<?=$class_like_1?>" href="<?=$link_like?>"><i class="<?=$class_like_2?>"></i></a>
                                    </div>


                                    <h6 class="product-detail__title-info">Giới thiệu</h6>
                                    <p>
                                    <?=$hang['mo_ta']?>
                                    </p>

                                    <span class="separate"></span>
                                </div>

                                <!----------------------------------------------------------------------------->

                                <div id="bando" class="col-lg-12">
                                    <h6 class="fs-4 mt-4">Tiện ích xung quanh</h6>
                                    <iframe  src="<?=$hang['link_map']."&width=100%&height=560"?>"
                                        width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>

                                <!----------------------------------------------------------------------------->

                                <div class="comment">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h6 class="fs-4 mt-4">Nhận xét</h6>
                                            <div class="comment__heading">
                                                <img src="../pages/assets/img/icon-256x256.png" alt="">
                                                <form action="" class="form-comment">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="comment" aria-describedby="emailHelp">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Bình luận</button>
                                                </form>
                                            </div>
                                            <div class="comment__body">
                                                <ul class="comment__list">
                                                    <li class="comment__item mt-4">
                                                        <a href="" class="comment__link">
                                                            <img src="../pages/assets/img/icon-256x256.png" alt="">
                                                        </a>
                                                        <div class="comment__content ms-3">
                                                            <div class="comment__content-top">
                                                                <h6 class="comment__user-name">Phạm Văn Lâm</h6>
                                                                <p>“Lorem Ipsum” xuất phát từ cụm từ Latin dolorem ipsum</p>
                                                                <div class="comment__action">
                                                                    <div class="comment__action-left">
                                                                        <span>1 ngày</span>
                                                                        <button type="button" class="comment__btn-like"><i class="fa-regular fa-thumbs-up"></i> Thích</button>
                                                                        <button type="button" class="comment__btn-reply ms-2"><i class="fa-brands fa-rocketchat"></i> Phản hồi</button>
                                                                    </div>
                                                                    <div class="comment__action-right">
                                                                        <button type="button" class="comment__btn-option"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <form class="form-rep-comment">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" id="comment" aria-describedby="emailHelp"  placeholder="Nhập bình luận của bạn...">
                                                                    <button type="button" class="btn btn-primary">Bình luận</button>
                                                                </div>
                                                            </form>

                                                            <ul class="comment__sub-list">
                                                                
                                                            </ul>
                                                        </div>
                                                    </li>

                                                    <li class="comment__item mt-4">
                                                        <a href="" class="comment__link">
                                                            <img src="../pages/assets/img/icon-256x256.png" alt="">
                                                        </a>
                                                        <div class="comment__content ms-3">
                                                            <div class="comment__content-top">
                                                                <h6 class="comment__user-name">Phạm Văn Mách</h6>
                                                                <p>“Lorem Ipsum” xuất phát từ cụm từ Latin dolorem ipsum</p>
                                                                <div class="comment__action">
                                                                    <div class="comment__action-left">
                                                                        <span>3 ngày</span>
                                                                        <button type="button" class="comment__btn-like mx-2"><i class="fa-regular fa-thumbs-up"></i> Thích</button>
                                                                        <button type="button" class="comment__btn-reply"><i class="fa-brands fa-rocketchat"></i> Phản hồi</button>
                                                                    </div>
                                                                    <div class="comment__action-right">
                                                                        <button type="button" class="comment__btn-option"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <form class="form-rep-comment">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" id="comment" aria-describedby="emailHelp"  placeholder="Nhập bình luận của bạn...">
                                                                    <button type="button" class="btn btn-primary">Bình luận</button>
                                                                </div>
                                                            </form>

                                                            <ul class="comment__sub-list">
                                                                

                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div class="user">
                                    <div class="user__heading">
                                        <img src="../pages/assets/img/50127432aa0c9d5facfc5dee29208f66.jpg" alt="">
                                        <h6>Hệ Thống Cho Thuê Căn Hộ & Phòng Trọ Giá Rẻ Nhất Thị Trường <span><i class="fa-solid fa-circle-check"></i></span></h6>

                                    </div>
                                    <div class="user__body">
                                        <a href="tel: 0903 430 577" class="user__btn btn"><i class="fa-solid fa-phone me-1"></i> Liên hệ:  0903 430 577</a>
                                        <a href="mailto:thanh.ledah@gmail.com" class="user__btn btn active"><i class="fa-solid fa-envelope me-1"></i>Liên hệ hỗ trợ</a>
                                        <a href="" class="btn btn-outline-secondary"><i class="fa-solid fa-flag me-1"></i> Báo cáo</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <!--Start Related Product-->
                        <h6 class="fs-4 mt-4">Nhà trọ xung quanh</h6>
                        <div class="row related-products my-4">
                        <?php
                                    $page = 1;
                                    if(isset($_GET['page'])){
                                        $page = $_GET['page'];
                                    }
                                    if($page == "" or $page < 1){
                                        $page = 1;
                                    }
                                    $so_tab = $page * 10;
                                    $i = 0;
                                    $querryy = $ketnoi->query("SELECT * FROM `posts` WHERE `ngay_het_han` >= CURRENT_DATE AND dia_chi = '".$hang['dia_chi']."'");
                                    while ($row = mysqli_fetch_array($querryy)) {
                                        $id = $row['id'];
                                        $ten_tro = $row['ten_tro'];
                                        $dia_chi = $row['dia_chi'];
                                        $mo_ta = substr($row['mo_ta'],0,100).'... <a href="../product-detail?id='.$id.'">Xem thêm</a>';
                                        $luot_thich = $row['thich'];
                                        $gia_phong = tien($row['gia_phong'])."đ";
                                        $ngay_dang_tin = $row['ngay_dang_tin'];
                                        $hinh_anh = explode(",",$row['hinh_anh'])[0];
                                        $i++;
                                        if($i < 10){
                                    ?>


                            <div class="col-lg-3">
                                <a href="" class="related-products__item mx-2">
                                    <div class="related-products__img set-bg set-bg--50" data-setbg="<?=$hinh_anh?>"></div>
                                    <div class="related-products__text">
                                        <h6><?=$ten_tro?></h6>
                                        <span><?=$gia_phong?></span>
                                    </div>
                                </a>
                            </div>

                            <?php }
                            } ?>
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
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.js"></script>
    <script src="../pages/assets/js/main.js"></script>
    <script>
        $(document).ready(function() {
            /* Slider product */
            $('.slider').slick({
                autoplay: true,
                Speed: 1000,
                arrows: true,
                prevArrow: '<button type="button" class="slick-prev"><i class="fa-solid fa-chevron-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="fa-solid fa-chevron-right"></i></button>',
                cssEase: 'linear',
                asNavFor: '.thumbnail__slider',
            });

            $('.thumbnail__slider').slick({
                slidesToShow: 3,
                Speed: 1000,
                arrows: false,
                asNavFor: '.slider',
                focusOnSelect: true
            });


            /*Slider related product */
            $('.related-products').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                Speed: 1000,
                infinite: true,
                arrows: true,
                prevArrow: '<button type="button" class="slick-prev"><i class="fa-solid fa-angle-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="fa-solid fa-angle-right"></i></button>'

            })

            /*----------- end slider---------------*/
        })

        function getParent(element, selector)  {
            while(element.parentElement) {
                if(element.parentElement.matches(selector)) {
                    return element.parentElement;
                } else {
                    element = element.parentElement;
                }
            }

            return element;
        }

        function handleRepComment(event) {
            let parentFormSub = getParent(event.target, '.comment__sub-item');
            let formSubRepComment = parentFormSub.querySelector('.form-rep-comment');
            formSubRepComment.style.display = 'block';
            let nameUser = parentFormSub.querySelector('.comment__user-name');

            let inputForm = formSubRepComment.querySelector('input[type="text"]');
                let btnRepComment = formSubRepComment.querySelector('button');
                inputForm.value = nameUser.innerText;
                inputForm.onkeyup = function() {
                    if(this.value !== '') {
                        btnRepComment.className = 'btn btn-primary';
                        btnRepComment.removeAttribute("disabled");

                    } else {
                        const att = document.createAttribute("disabled");
                        att.value = "disabled";
                        btnRepComment.setAttributeNode(att);
                        btnRepComment.className = 'btn btn-secondary';
                    }
                }

                btnRepComment.onclick = function() {
                    if(inputForm.value !== '') {
                        let html = `
                                <div class="comment__sub-item-content">
                                    <a href="" class="comment__link">
                                        <img src="../pages/assets/img/icon-256x256.png" alt="">
                                    </a>
                                    <div class="comment__content ms-3">
                                        <h6 class="comment__user-name" >Phạm Văn Lâm</h6>
                                        <p>${inputForm.value}</p>
                                        <div class="comment__action">
                                            <div class="comment__action-left">
                                            <span>Bây giờ</span>
                                                <button type="button" class="comment__btn-like mx-2"><i class="fa-regular fa-thumbs-up"></i> Thích</button>
                                                <button type="button" class="comment__btn-reply" onclick="handleRepComment(event)"><i class="fa-brands fa-rocketchat"></i> Phản hồi</button>
                                            </div>
                                            <div class="comment__action-right">
                                                <button type="button" class="comment__btn-option"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment__sub-item-form">
                                    <form class="form-rep-comment">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="comment" aria-describedby="emailHelp"  placeholder="Nhập bình luận của bạn...">
                                            <button type="button" class="btn btn-primary">Bình luận</button>
                                        </div>
                                    </form>
                                </div>
                            `;
                            formSubRepComment.style.display = 'none';
                            let liItem = document.createElement('li');
                            liItem.className = 'comment__sub-item mt-3';
                            liItem.innerHTML = html;
                            let listUlParent = getParent(parentFormSub, '.comment__sub-list');
                            listUlParent.appendChild(liItem);
                    }
                }
            
        }

        let repCommentBtn = document.querySelectorAll('.comment__btn-reply');
        for(let item of repCommentBtn) {
            item.onclick = function() {
                let formRepComment;
                let nameUser;
                let parent = getParent(item, '.comment__item');

                nameUser = parent.querySelector('.comment__user-name');
                formRepComment = parent.querySelector('.form-rep-comment');
                formRepComment.style.display = 'block';
                

                let inputForm = formRepComment.querySelector('input[type="text"]');
                let btnRepComment = formRepComment.querySelector('button');
                inputForm.value = nameUser.innerText;
                inputForm.onkeyup = function() {
                    if(this.value !== '') {
                        btnRepComment.className = 'btn btn-primary';
                        btnRepComment.removeAttribute("disabled");

                    } else {
                        const att = document.createAttribute("disabled");
                        att.value = "disabled";
                        btnRepComment.setAttributeNode(att);
                        btnRepComment.className = 'btn btn-secondary';
                    }
                }

                btnRepComment.onclick = function() {
                    if(inputForm.value !== '') {
                        let html = `
                                <div class="comment__sub-item-content">
                                    <a href="" class="comment__link">
                                        <img src="../pages/assets/img/icon-256x256.png" alt="">
                                    </a>
                                    <div class="comment__content ms-3">
                                        <h6 class="comment__user-name" >Phạm Văn Lâm</h6>
                                        <p>${inputForm.value}</p>
                                        <div class="comment__action">
                                            <div class="comment__action-left">
                                            <span>Bây giờ</span>
                                                <button type="button" class="comment__btn-like mx-2"><i class="fa-regular fa-thumbs-up"></i> Thích</button>
                                                <button type="button" class="comment__btn-reply" onclick="handleRepComment(event)"><i class="fa-brands fa-rocketchat"></i> Phản hồi</button>
                                            </div>
                                            <div class="comment__action-right">
                                                <button type="button" class="comment__btn-option"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment__sub-item-form">
                                    <form class="form-rep-comment">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="comment" aria-describedby="emailHelp"  placeholder="Nhập bình luận của bạn...">
                                            <button type="button" class="btn btn-primary">Bình luận</button>
                                        </div>
                                    </form>
                                </div>
                            `;
                            formRepComment.style.display = 'none';
                            let liItem = document.createElement('li');
                            liItem.className = 'comment__sub-item mt-3';
                            liItem.innerHTML = html;
                            parent.querySelector('.comment__sub-list').appendChild(liItem);
                    }
                }
            }

        }
    </script>
</body>

</html>