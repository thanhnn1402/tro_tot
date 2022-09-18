<?php


?>
<header class="header">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-2 col-4">
                        <div class="logo">
                            <a href="../trang-chu"><img src="../pages/assets/img/logo/logo1.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-10 col-8">
                        <div class="nav">
                            <div class="nav__item">
                                <a href="../trang-chu" class="nav__link"><i class="fa-solid fa-house me-1"></i> Trang chủ</a>
                            </div>
                            <div class="nav__item">
                                <a href="../lien-he-ho-tro" class="nav__link"> <i class="fa-solid fa-headset me-1"></i> Liên hệ - Hỗ trợ</a>
                            </div>
                            <div class="nav__item">
                                <a href="" class="nav__link"><i class="fa-solid fa-house-user me-1"></i>Thuê trọ</a>
                            </div>
                            <!-- <div class="nav__item">
                                <a href="" class="nav__link">Đăng nhập / Đăng ký</a>
                            </div>
                            <div class="nav__item">
                                <a href="" class="nav__link">Đăng ký</a>
                            </div> -->
                            <!--Đăng nhập thành công-->
                            <div class="nav__item js-info-menu">
                                <button>
                                    <img src="" alt="" id="avatar_1">
                                    <span><?=$_name;?></span>
                                </button>
                                <div class="nav-sub info-user">
                                    <div class="nav-sub__heading">
                                        <img src="" alt="" id="avatar_2">
                                        <div class="nav-sub__heading-text">
                                            <span><?=$_name;?><i class="fa-solid fa-circle-check me-2"></i></span>
                                            <span><?=$level?></span>
                                        </div>
                                    </div>
                                    <div class="nav-sub__body">
                                        <?php
                                        if($_name != "Bạn chưa đăng nhập"){
                                        ?>
                                        <a href="../profile" class="nav-sub__item"><i class="fa-solid fa-id-card me-2"></i> Thông tin tài khoản</a>
                                        <a href="../nha-tro-yeu-thich" class="nav-sub__item"><i class="fa-regular fa-heart me-2"></i> Nhà trọ yêu thích</a>
                                        <?php
                                        }
                                        ?>
                                        
                                        <?php
                                        if($_name != "Bạn chưa đăng nhập"){
                                        ?>
                                        <a href="../thay-doi-mat-khau" class="nav-sub__item"><i class="fa-solid fa-gear me-2"></i> Thay đổi mật khẩu</a>
                                        <a href="../nap-tien" class="nav-sub__item"><i class="fa-solid fa-coins me-2"></i> Nạp tiền</a>
                                        <?php
                                        if($user['level'] == 1){
                                        ?>
                                            <a href="../quan-ly-don-ho-tro" class="nav-sub__item"><i class="fa-solid fa-house-circle-check me-2"></i>Quản lý đơn hỗ trợ</a>
                                        <?php
                                        }
                                        ?>
                                        <a href="../quan-ly-tin" class="nav-sub__item"><i class="fa-solid fa-house-circle-check me-2"></i>Quản lý tin đăng</a>
                                        <?php
                                        }
                                        if($_name == "Bạn chưa đăng nhập"){
                                        ?>
                                        <a href="../login" class="nav-sub__item"><i class="fa-solid fa-right-from-bracket me-2"></i>Đăng nhập / Đăng ký</a>
                                        <?php }else{?>
                                        <a href="../logout" class="nav-sub__item"><i class="fa-solid fa-right-from-bracket me-2"></i>Đăng xuất</a>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                            <div class="nav__item active">
                                <a href="../dang-tin-moi" class="nav__link">Đăng tin mới</a>
                            </div>
                        </div>

                        <div class="offcanvas-container float-end">
                            <button class="btn pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                                <i class="fa-solid fa-bars"></i>
                            </button>

                            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                                <div class="offcanvas-header">
                                    <a href="../trang-chu"><img src="../pages/assets/img/logo/logo1.jpg" alt="" class="w-25"></a>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <div class="nav-mobile">
                                        <div class="nav-mobile__heading">
                                            <img src="" alt="" id="avatar_3">
                                            <div class="nav-mobile__heading-text">
                                                <h6><?=$_name;?><i class="fa-solid fa-circle-check ms-2"></i></h6>
                                                <span>Thành viên mới</span>
                                            </div>
                                        </div>
                                        <div class="nav-mobile__body">
                                            <div class="nav-mobile__item">
                                                <a href="../trang-chu"><i class="fa-solid fa-house me-1"></i> Trang chủ</a>
                                            </div>
                                            <div class="nav-mobile__item">
                                                <a href="../lien-he-ho-tro"><i class="fa-solid fa-headset me-1"></i> Liên hệ - Hỗ trợ</a>
                                            </div>
                                            <?php
                                            if($_name != "Bạn chưa đăng nhập"){
                                            ?>
                                            <div class="nav-mobile__item">
                                                <a href="../profile"><i class="fa-solid fa-id-card me-2"></i> Thông tin tài khoản</a>
                                            </div>
                                            <div class="nav-mobile__item">
                                                <a href="../nha-tro-yeu-thich"><i class="fa-regular fa-heart me-2"></i> Nhà trọ yêu thích</a>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if($_name != "Bạn chưa đăng nhập"){
                                            ?>
                                            <div class="nav-mobile__item">
                                                <a href="../thay-doi-mat-khau"><i class="fa-solid fa-gear me-2"></i> Thay đổi mật khẩu</a>
                                            </div>
                                            <div class="nav-mobile__item">
                                                <a href="../nap-tien"><i class="fa-solid fa-coins me-2"></i> Nạp tiền</a>
                                            </div>
                                            <?php
                                            if($user['level'] == 1){
                                            ?>
                                            <div class="nav-mobile__item">
                                                <a href="../quan-ly-don-ho-tro"><i class="fa-solid fa-house-circle-check me-2"></i>Quản lý đơn hỗ trợ</a>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                            <div class="nav-mobile__item">
                                                <a href="../quan-ly-tin"><i class="fa-solid fa-house-circle-check me-2"></i>Quản lý tin đăng</a>
                                            </div>
                                            <div class="nav-mobile__item">
                                                <a href="../dang-tin-moi"><i class="fa-solid fa-clipboard-check me-1"></i> Đăng tin mới</a>
                                            </div>
                                            <?php }?>
                                            <div class="nav-mobile__item">
                                                <?php
                                                if($_name == "Bạn chưa đăng nhập"){
                                                ?>
                                                <a href="../login"><i class="fa-solid fa-right-from-bracket me-2"></i>Đăng nhập / Đăng ký</a>
                                                <?php }else{?>
                                                <a href="../logout"><i class="fa-solid fa-right-from-bracket me-2"></i>Đăng xuất</a>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <script>
        var link_avt_ = "<?php 
            if(isset($user['link_avt'])){
                echo $user['link_avt'];
            }else{
                echo "../pages/assets/img/icon-256x256.png";
            }
             ?>";
        
        document.getElementById('avatar_1').src = link_avt_;
        document.getElementById('avatar_2').src = link_avt_;
        document.getElementById('avatar_3').src = link_avt_;
        </script>