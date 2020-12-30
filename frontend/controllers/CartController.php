<?php
//frontend/controllers/CartController.php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class CartController extends Controller {

    //Giỏ hàng của bạn
    //Có thể truy cập thông qua url mvc như sau:
    //index.php?controller=cart&action=index
  // Url dạng rewrite đang là: gio-hang-cua-ban.html
  //Thao tác với file .htaccess, ngang hàng với file
  //index.php gốc của ứng dụng
    public function index() {
      // Xử lý Cập nhật lại giá
//      echo "<pre>";
//      print_r($_POST);
//      echo "</pre>";
      if (isset($_POST['submit'])) {
        // Check thêm trường hợp nếu như số lượng là giá trị âm
        //thì báo lỗi và ko update
        foreach ($_SESSION['cart'] AS $product_id => $cart) {
          if ($_POST[$product_id] < 0) {
            $_SESSION['error'] = 'Số lượng phải > 0';
//            $url_redirect = $_SERVER['SCRIPT_NAME'] . '/gio-hang-cua-ban';
            header("Location: gio-hang-cua-ban.html");
            exit();
          }
        }

        //Lặp các phần tử trong giỏ hàng, và gán lại số lương
        //tương ứng cho từng phần tử theo id của sản phẩm
        foreach ($_SESSION['cart'] AS $product_id => $cart) {
          //truy cập phần tử mảng theo product_id
          $_SESSION['cart'][$product_id]['quantity']
              = $_POST[$product_id];
        }
        $_SESSION['success'] = 'Cập nhật giỏ hàng thành công';
      }

        $this->content =
            $this->render('views/carts/index.php');
        require_once 'views/layouts/main.php';
    }


    //Phương thức nhận request từ ajax để xử lý thêm vào
    // giỏ hàng
    public function add() {
        //Debug mảng dựa vào method truyền lên từ ajax
//        echo "<pre>";
//        print_r($_GET);
//        echo "</pre>";
        //+ Đã nhận đc product_id từ ajax truyền lên
        // + Lấy thông tin sản phẩm tương ứng với id truyền
//        lên
        $product_id = $_GET['product_id'];
        $product_model = new Product();
        $product = $product_model->getById($product_id);
//        echo "<pre>";
//        print_r($product);
//        echo "</pre>";
        // + Tạo 1 mảng để chứa các thông tin cần thiết của
        //giỏ hàng là name, price, avatar
        $cart = [
            'name' => $product['title'],
            'price' => $product['price'],
            'avatar' => $product['avatar'],
            //mặc định số lượng ban đầu = 1
            'quantity' => 1
        ];
        // + Xây dựng giỏ hàng sử dụng SESSION, với key=cart
        // - Nếu giỏ hàng chưa từng tồn tại trước đó, khi click
//        Thêm vào giỏ -> thêm mới 1 giỏ hàng
        if (!isset($_SESSION['cart'])) {
            //Thêm phần tử vào giỏ hàng luôn có format:
            //product_id => thông-tin-giỏ-hàng-tương-ứng
            $_SESSION['cart'][$product_id] = $cart;
        } else {
            // - Nếu giỏ hàng đã tồn tại rồi thì sẽ tồn tại 2
            // trường hơp, sử dụng ham array_key_exists để
            //kiểm tra xem key có tồn tại trong 1 mảng hay ko

            // + Thêm sản phẩm chưa từng tồn tại trong giỏ:
            //xử lý tương tự trường hợp thêm mới sp vào giỏ
            if (!array_key_exists($product_id, $_SESSION['cart'])) {
                $_SESSION['cart'][$product_id] = $cart;
            } else {
                $_SESSION['cart'][$product_id]['quantity']++;
                // + Thêm sản phẩm đã tồn tại trong giỏ rồi: ko
                //thêm mới sản phẩm mà update lại số lượng sản phẩm
                //dang có sẵn, bằng cách cộng thêm 1
            }
        }

    }

    //Phương thức xóa sản phẩm khỏi giỏ hàng
    public function delete() {
      //Nếu trong rewrite đã có valiate bằng regex, ví dụ
      //phải là số, thì bên PHP ko cần valiate lại nữa
      echo "<pre>";
      print_r($_GET);
      echo "</pre>";
      $product_id = $_GET['id'];
      //Xóa sản phẩm trong giỏ hàng dựa theo id bắt đc
      unset($_SESSION['cart'][$product_id]);
      //Kiểm tra nếu xóa hết toàn bộ sản phẩm trong giỏ hàng r
      // thì xóa luôn cái giỏ hàng đó đi
      if (empty($_SESSION['cart'])) {
        unset($_SESSION['cart']);
      }
      $_SESSION['success'] =
          "Xóa sản phẩm có id = $product_id thành công";
      header("Location: gio-hang-cua-ban.html");
      exit();
    }
}