//assets/js/script.js
$(document).ready(function () {
  var closeNavigate = function () {
    $('.overlay').hide();
    $('.sidebar').removeClass('opened');
    $('body').removeClass('fixed');
  }

  //close sidebar panel, clicked overlay and close sidebar button.
  $('.overlay, .sidebar-toggle-button').on('click', function () {
    closeNavigate();
  });

//sidebar navigation close method.
  var openNavigate = function () {
    if ($(window).width() < 760)
      $('body').addClass('fixed');
    $('.overlay').show();
    $('.sidebar').addClass('opened');
  }

  //sidebar menu click event. open when clicked.
  $('.toggle-sidebar').on('click', function () {
    openNavigate();
  });

  $('.material-button').on('click', function (e) {
    $('.material-button').not($(this)).next('.header-submenu').hide();
    // addWaveEffect($(this), e);
    $(this).next('.header-submenu').toggleClass('active');
  });

  //Gọi ajax để xử lý thêm vào giỏ hàng khi click Thêm vào
  // giỏ, class add-to-cart
  $('.add-to-cart').click(function () {
    //nhớ xóa cache trình duyệt: ctrl + Shift + R
    // alert('clicked');
    // LẤy giá trị của thuộc tính data-id đã khai báo trong
    // class hiện tại, data-id chính là product_id của sản
    //phẩm
    // + Sử dụng $(this) để tham chiếu đến chính selector
    // hiện tại
    var product_id = $(this).attr('data-id');
    console.log(product_id);
    // + Gọi ajax, truyền vào 1 đối tượng
    $.ajax({
      method: 'GET',
      // + Url theo mô hình MVC sẽ xử lý ajax
      url: 'index.php?controller=cart&action=add',
      // + Dữ liệu gửi lên, là 1 object
      data: {
        product_id: product_id
      },
      // + Nơi đón kết quả trả về từ url, biến data chứa toàn
      //bộ kết quả trả về
      success: function (data) {
        //Set message hiển thị cho class ajax-message
        $('.ajax-message').html('Thêm vào giỏ hàng thành công');
        //add class này dể set opacity = 1, vì mặc định ban đầu
        //message đang có opacity = 0 -> ẩn
        $('.ajax-message').addClass('ajax-message-active');
        //Sau khi hiển thị message thì sẽ xóa message này đi
        //, chờ khoảng 5s r mới xóa, sử dụng hàm setTimeout
        setTimeout(function () {
          // Remove class ajax-message-active đi
          $('.ajax-message').removeClass('ajax-message-active');
        }, 3000);

          var cart_total = $('.cart-amount').text();
          cart_total++;
          $('.cart-amount').text(cart_total);
          $('.cart-amount-mobile').text(cart_total);
      }
      // + Xem thông tin ajax: xem trong tab Network của
      // trình duyệt
    });
  })

});