<?php
/**
 * views/layouts/main_login.php
 * Xây dựng 1 cấu trúc layout dạng HTML, tích hợp bootstrap
 */
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <title>
        <?php echo $this->title_page; ?>
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
<div class="header"></div>
<div class="main-content">
    <div class="container">
        <!--      Hiển thị tập trung tất cả lỗi như validate,
              session, thông báo thành công ở file layout
              -->
        <?php if (!empty($this->error)): ?>
            <div class="alert alert-danger">
                <?php echo $this->error; ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['error'])):?>
            <div class="alert alert-danger">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['success'])):?>
            <div class="alert alert-success">
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </div>
        <?php endif; ?>
    </div>

    <?php echo $this->content; ?>
</div>
<div class="footer"></div>
</body>
</html>


