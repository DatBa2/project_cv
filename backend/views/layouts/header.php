<?php
$year = '';
$username = '';
$jobs = '';
$avatar = '';
?>
<div class="wrapper">
    <div class="container">
        <div class="dashboard">
            <div class="left">
                    <span class="left__icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                <div class="left__content">
                    <div class="left__logo">Web Của Ba Đạt</div>
                    <div class="left__profile">
                        <div class="left__image">
                            <a href="index.php?controller=product"><?php if (!empty($_SESSION['user']['avatar'])): ?>
                                <img height="160" src="assets/uploads/<?php echo $_SESSION['user']['avatar']; ?>"/>
                                <?php endif; ?> </a>
                        </div>
                        <a href="index.php?controller=product"><p class="left__name"><?php echo $_SESSION['user']['username']; ?></p></a>
                    </div>
                    <ul class="left__menu">
                        <li class="left__menuItem">
                            <a href="index.php" class="left__title"><img src="assets/assets/icon-dashboard.svg" alt="">Bảng Điều Khiển</a>
                        </li>
                        <li class="left__menuItem">
                            <div class="left__title"><img src="assets/assets/icon-tag.svg" alt="">Sản Phẩm<img class="left__iconDown" src="assets/assets/arrow-down.svg" alt=""></div>
                            <div class="left__text">
                                <a class="left__link" href="<?php echo "index.php?controller=product&action=create"; ?>">Thêm Sản Phẩm</a>
                                <a class="left__link" href="<?php echo "index.php?controller=product"; ?>">Xem Sản Phẩm</a>
                            </div>
                        </li>
                        <li class="left__menuItem">
                            <div class="left__title"><img src="assets/assets/icon-edit.svg" alt="">Danh Mục SP<img class="left__iconDown" src="assets/assets/arrow-down.svg" alt=""></div>
                            <div class="left__text">
                                <a class="left__link" href="<?php echo "index.php?controller=category&action=create"; ?>">Thêm Danh Mục</a>
                                <a class="left__link" href="<?php echo "index.php?controller=category"; ?>">Xem Danh Mục</a>
                            </div>
                        </li>
                        <li class="left__menuItem">
                            <a href="<?php echo "#"; ?>" class="left__title"><img src="assets/assets/icon-users.svg" alt="">Khách Hàng</a>
                        </li>
                        <li class="left__menuItem">
                            <a href="<?php echo "#"; ?>" class="left__title"><img src="assets/assets/icon-book.svg" alt="">Đơn Đặt Hàng</a>
                        </li>
                        <li class="left__menuItem">
                            <a href="<?php echo "#"; ?>" class="left__title"><img src="assets/assets/icon-pencil.svg" alt="">Chỉnh CSS</a>
                        </li>
                        <li class="left__menuItem">
                            <div class="left__title"><img src="assets/assets/icon-user.svg" alt="">Admin<img class="left__iconDown" src="assets/assets/arrow-down.svg" alt=""></div>
                            <div class="left__text">
                                <a class="left__link" href="<?php echo "index.php?controller=user&action=register"; ?>">Thêm Admin</a>
<!--                                <a class="left__link" href="--><?php //echo "index.php?controller=user&action=upload"; ?><!--">Upload Admin</a>-->
                                <a class="left__link" href="<?php echo "index.php?controller=user&action=index"; ?>">Xem Admins</a>
                            </div>
                        </li>
                        <li class="left__menuItem">
                            <a href="<?php echo "index.php?controller=user&action=logout"; ?>" class="left__title"><img src="assets/icon-logout.svg" alt="">Đăng Xuất</a>
                        </li>
                    </ul>
                </div>
            </div>