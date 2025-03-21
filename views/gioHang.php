<?php require_once 'layout/header.php' ?>
<?php require_once 'layout/menu.php' ?>

<main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">cart</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- cart main wrapper start -->
        <div class="cart-main-wrapper section-padding">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Cart Table Area -->
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="pro-thumbnail">Ảnh sản phẩm</th>
                                            <th class="pro-title">Tên sản phẩm</th>
                                            <th class="pro-price">Giá tiền</th>
                                            <th class="pro-quantity">Số lượng</th>
                                            <th class="pro-subtotal">Tổng tiền</th>
                                            <th class="pro-remove">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $tongGioHang = 0; 
                                        foreach($chiTietGioHang as $key => $sanPham) { ?>
                                            <tr>
                                                <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="<?= BASE_URL.$sanPham['hinh_anh'] ?>" alt="Product" /></a></td>
                                                <td class="pro-title"><a href="#"><?= $sanPham['ten_san_pham'] ?></a></td>
                                                <td class="pro-price"><span>
                                                    <?php if($sanPham['gia_khuyen_mai']) { ?>
                                                        <?= number_format($sanPham['gia_khuyen_mai']) ?>
                                                    <?php } else { ?>
                                                        <?= number_format($sanPham['gia_san_pham']) ?>
                                                    <?php } ?>
                                                </span></td>
                                                <td class="pro-quantity">
                                                    <div class="pro-qty"><input type="text" value="<?= $sanPham['so_luong']?>"></div>
                                                </td>
                                                <td class="pro-subtotal"><span>
                                                    <?php 
                                                        $tongtien = 0;
                                                        if($sanPham['gia_khuyen_mai']) {
                                                            $tongtien = $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'];
                                                        } else {
                                                            $tongtien = $sanPham['gia_san_pham'] * $sanPham['so_luong'];
                                                        } $tongGioHang += $tongtien;
                                                        echo number_format($tongtien);
                                                    ?> VNĐ
                                                </span></td>
                                                <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Cart Update Option -->
                            <div class="cart-update-option d-block d-md-flex justify-content-between">
                                <div class="apply-coupon-wrapper">
                                    <form action="#" method="post" class=" d-block d-md-flex">
                                        <input type="text" placeholder="Enter Your Coupon Code" required />
                                        <button class="btn btn-sqr">Apply Coupon</button>
                                    </form>
                                </div>
                                <div class="cart-update">
                                    <a href="#" class="btn btn-sqr">Update Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 ml-auto">
                            <!-- Cart Calculation Area -->
                            <div class="cart-calculator-wrapper">
                                <div class="cart-calculate-items">
                                    <h6>Tổng tiền</h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td>Tổng tiền</td>
                                                <td><?= number_format($tongGioHang)  ?> VNĐ</td>
                                            </tr>
                                            <tr>
                                                <td>Vận chuyển</td>
                                                <td>30,000 VNĐ</td>
                                            </tr>
                                            <tr class="total">
                                                <td>Tổng cộng</td>
                                                <td class="total-amount"><?= number_format($tongGioHang + 30000)  ?> VNĐ</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <a href="<?= BASE_URL.'?act=' ?>" class="btn btn-sqr d-block">Đặt hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart main wrapper end -->
    </main>
<?php require_once 'layout/miniCart.php' ?>
<?php require_once 'layout/footer.php' ?>