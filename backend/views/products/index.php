<?php
//views/products/index.php
require_once 'helpers/Helper.php';
?>
<!--
Xây dựng 1 form tìm kiếm sản phẩm, tìm kiếm dựa vào các thông
tin sau: tên sp, giá sp, tên danh mục, chia 1 hàng -> 3 cột
có độ rộng bằng nhau
+ Chú ý: khi sử dụng phương thức GET cho form, với mô hình MVC
hiện tại -> bị mất tham số controller và action, do theo tính
chất của phương thức GET chỉ truyền lên url các thuộc tính name
hiện tại của form mà thôi. Để giữ lại đc tham số controller và
action -> khai báo thêm 2 input trong form ở dạng hidden
-->
<?php
$controller = isset($_GET['controller']) ?
    $_GET['controller'] : 'product';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
?>
<!--<form action="" method="get">-->
<!--    <input type="hidden" name="controller"-->
<!--   value="--><?php //echo $controller; ?><!--" />-->
<!--    <input type="hidden" name="action"-->
<!--   value="--><?php //echo $action; ?><!--" />-->
<!--    index.php?controller=product&action=index-->

<!--    <div class="row form-group">-->
<!--        <div class="col-md-4">-->
<!--            <label for="category_id">Chọn category</label>-->
<!--            <select name="category_id"-->
<!--                    class="form-control" id="category_id">-->
<!--                <option value="-1">--Chọn danh mục--</option>-->
<!--                --><?php //foreach($categories AS $category): ?>
<!--                    <option value="--><?php //echo $category['id']; ?><!--">-->
<!--                        --><?php //echo $category['name']; ?>
<!--                    </option>-->
<!--                --><?php //endforeach; ?>
<!--            </select>-->
<!--        </div>-->
<!--        <div class="col-md-4">-->
<!--            <label for="name">Nhập tên sp</label>-->
<!--            <input type="text" name="name" id="name"-->
<!--                   class="form-control" />-->
<!--        </div>-->
<!--        <div class="col-md-4">-->
<!--            <label for="price">Nhập giá</label>-->
<!--            <input type="number" name="price" id="price"-->
<!--            class="form-control" />-->
<!--        </div>-->
<!--    </div>-->
<!--    <input type="submit" name="search" value="Tìm kiếm">-->
<!--  Nếu cần cầu kỳ về HTML của nút submit, có thể dùng thẻ
  button thay thế -->
<!--    <button type="submit" name="search" class="btn btn-primary">-->
<!--        <i class="fa fa-search"></i> Tìm kiếm-->
<!--    </button>-->
<!--</form>-->

<h2>Danh sách sản phẩm</h2>
    <a href="index.php?controller=product&action=create" >
        <i class="fa fa-plus"></i> Thêm mới
    </a>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Category name</th>
        <th>Title</th>
        <th>Avatar</th>
        <th>Price</th>
        <th>Amount</th>
        <th>Status</th>
        <th>Created_at</th>
        <th>Updated_at</th>
        <th></th>
    </tr>
    <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['id'] ?></td>
                <td><?php echo $product['category_name'] ?></td>
                <td><?php echo $product['title'] ?></td>
                <td>
                    <?php if (!empty($product['avatar'])): ?>
                        <img height="80" src="assets/uploads/<?php echo $product['avatar'] ?>"/>
                    <?php endif; ?>
                </td>
                <td><?php echo number_format($product['price']) ?></td>
                <td><?php echo $product['amount'] ?></td>
                <td><?php echo Helper::getStatusText($product['status']) ?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($product['created_at'])) ?></td>
                <td><?php echo !empty($product['updated_at']) ? date('d-m-Y H:i:s', strtotime($product['updated_at'])) : '--' ?></td>
                <td>
                    <?php
                    $url_detail = "index.php?controller=product&action=detail&id=" . $product['id'];
                    $url_update = "index.php?controller=product&action=update&id=" . $product['id'];
                    $url_delete = "index.php?controller=product&action=delete&id=" . $product['id'];
                    ?>
                    <a title="Chi tiết" href="<?php echo $url_detail ?>"><img class="left__iconDown" src="assets/assets/icon-edit.svg" alt="Chi tiết"></a>
                    <a title="Update" href="<?php echo $url_update ?>"><img class="left__iconDown" src="assets/assets/refresh.svg" height="35px" alt="Sửa"></a>
                    <a title="Xóa" href="<?php echo $url_delete ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?')">
                        <img class="left__iconDown" src="assets/assets/icon-trash-black.svg" alt="Xóa"></a>
                </td>
            </tr>
        <?php endforeach; ?>

    <?php else: ?>
        <tr>
            <td colspan="9">Không Có Dữ Liệu</td>
        </tr>
    <?php endif; ?>
</table>