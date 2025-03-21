<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu.php'; ?>
    <main>
        <!-- hero slider area start -->
        <section class="slider-area">
            <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
                <!-- single slider item start -->
                <div class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="assets/img/slider/slider1.png">
                        <div class="container">
                            <div class="row">
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="assets/img/slider/slider2.png">
                        <div class="container">
                            <div class="row">
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hero-single-slide hero-overlay">
                    <div class="hero-slider-item bg-img" data-bg="assets/img/slider/slider3.png">
                        <div class="container">
                            <div class="row">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- hero slider area end -->

        <!-- service policy area start -->
        <div class="service-policy section-padding">
            <div class="container">
                <div class="row mtn-30">
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-plane"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Giao hàng</h6>
                                <p>Miễn phí giao hàng</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-help2"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Hỗ trợ</h6>
                                <p>Hỗ trợ 24/7</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-back"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Hoàn tiền</h6>
                                <p>Hoàn tiền trong 30 ngày</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-credit"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Thanh toán</h6>
                                <p>Bảo mật thanh toán</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- service policy area end -->

        <!-- banner statistics area start -->
        <div class="banner-statistics-area">
            <div class="container">
                <div class="row row-20 mtn-20">
                    <div class="col-sm-6">
                        <figure class="banner-statistics mt-20">
                            <a href="#">
                                <img src="assets/img/banner/dog_banner_1370x.webp" alt="product banner">
                            </a>
                            <!-- <div class="banner-content text-right">
                                <h5 class="banner-text1">BEAUTIFUL</h5>
                                <h2 class="banner-text2">Wedding<span>Rings</span></h2>
                                <a href="shop.html" class="btn btn-text">Shop Now</a>
                            </div> -->
                        </figure>
                    </div>
                    <div class="col-sm-6">
                        <figure class="banner-statistics mt-20">
                            <a href="#">
                                <img src="assets/img/banner/cat_banner_1370x.webp" alt="product banner">
                            </a>
                            <!-- <div class="banner-content text-center">
                                <h5 class="banner-text1">EARRINGS</h5>
                                <h2 class="banner-text2">Tangerine Floral <span>Earring</span></h2>
                                <a href="shop.html" class="btn btn-text">Shop Now</a>
                            </div> -->
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner statistics area end -->

        <!-- product area start -->
        <section class="product-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">Sản phẩm mới của chúng tôi</h2>
                            <p class="sub-title">Sản phẩm được cập nhật liên tục</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-container">
                            <!-- product tab content start -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab1">
                                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                        <?php foreach($listSanPhamNew as $key => $sanPham) { ?>
                                        <!-- product item start -->
                                            <div class="product-item">
                                                <figure class="product-thumb">
                                                    <a href="<?= BASE_URL . '?act=chitietsanpham&id=' . $sanPham['id'] ?>">
                                                        <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                                                    </a>
                                                    <div class="product-badge">
                                                        <?php 
                                                            $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                                            $ngayHienTai = new DateTime();
                                                            $tinhNgay = $ngayHienTai -> diff($ngayNhap);

                                                            if ($tinhNgay -> days <= 7) {
                                                        ?>
                                                                <div class="product-label new">
                                                                    <span>new</span>
                                                                </div>
                                                        <?php
                                                            }
                                                            if ($sanPham['gia_khuyen_mai']) {
                                                        ?>
                                                            <div class="product-label discount">
                                                                <span>Giảm giá</span>
                                                            </div>
                                                        <?php 
                                                            }
                                                        ?>
                                                    </div>
                                                    <div class="cart-hover">
                                                        <a href="<?= BASE_URL . '?act=chitietsanpham&id=' . $sanPham['id'] ?>"><button class="btn btn-cart">Chi tiết</button></a>
                                                    </div>
                                                </figure>
                                                <div class="product-caption text-center">
                                                    <div class="product-identity">
                                                        <p class="manufacturer-name"><a href="<?= BASE_URL . '?act=chitietsanpham&id=' . $sanPham['id'] ?>"><?= $sanPham['ten_danh_muc']?></a></p>
                                                    </div>
                                                    <h6 class="product-name">
                                                        <a href="<?= BASE_URL . '?act=chitietsanpham&id=' . $sanPham['id'] ?>"><?= $sanPham['ten_san_pham'] ?></a>
                                                    </h6>
                                                    <div class="price-box">
                                                        <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                                            <span class="price-regular"><?= number_format($sanPham['gia_khuyen_mai']) ?> VNĐ</span>
                                                            <span class="price-old"><del><?= number_format($sanPham['gia_san_pham']) ?> VNĐ</del></span>
                                                        <?php }else { ?>
                                                            <span class="price-regular"><?= number_format($sanPham['gia_san_pham']) ?> VNĐ</span>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- product item end -->
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <!-- product tab content end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product area end -->

        <!-- product banner statistics area start -->
        <section class="product-banner-statistics">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="product-banner-carousel slick-row-10">
                            <!-- banner single slide start -->
                            <div class="banner-slide-item">
                                <figure class="banner-statistics">
                                    <a href="#">
                                        <img src="https://kpethouse.com/wp-content/uploads/2023/06/poodle-trang-an-gi.jpg" alt="product banner" style="max-height: 238.5px">
                                    </a>
                                    <div class="banner-content banner-content_style2">
                                        <h5 class="banner-text3"><a href="#">Chó Poodle</a></h5>
                                    </div>
                                </figure>
                            </div>
                            <!-- banner single slide start -->
                            <!-- banner single slide start -->
                            <div class="banner-slide-item">
                                <figure class="banner-statistics">
                                    <a href="#">
                                        <img src="https://vethospital.vnua.edu.vn/wp-content/uploads/2019/12/long-coat-2.jpg" alt="product banner">
                                    </a>
                                    <div class="banner-content banner-content_style2">
                                        <h5 class="banner-text3"><a href="#">Chó Chi Hua Hua</a></h5>
                                    </div>
                                </figure>
                            </div>
                            <!-- banner single slide start -->
                            <!-- banner single slide start -->
                            <div class="banner-slide-item">
                                <figure class="banner-statistics">
                                    <a href="#">
                                        <img src="https://dreampet.com.vn/wp-content/uploads/2018/08/meo-anh-long-dai.jpg" alt="product banner">
                                    </a>
                                    <div class="banner-content banner-content_style2">
                                        <h5 class="banner-text3"><a href="#">Mèo Anh lông dài</a></h5>
                                    </div>
                                </figure>
                            </div>
                            <!-- banner single slide start -->
                            <!-- banner single slide start -->
                            <div class="banner-slide-item">
                                <figure class="banner-statistics">
                                    <a href="#">
                                        <img src="https://images.kienthuc.net.vn/zoom/800/Uploaded/quocquan/2022_12_29/Calico-cat-01_JXAF.jpg" alt="product banner">
                                    </a>
                                    <div class="banner-content banner-content_style2">
                                        <h5 class="banner-text3"><a href="#">Mèo tam thể</a></h5>
                                    </div>
                                </figure>
                            </div>
                            <!-- banner single slide start -->
                            <!-- banner single slide start -->
                            <div class="banner-slide-item">
                                <figure class="banner-statistics">
                                    <a href="#">
                                        <img src="https://vuongquocloaivat.com/wp-content/uploads/2020/07/rua-Sulcata-compressed.jpg" alt="product banner" style="min-height: 238.5px">
                                    </a>
                                    <div class="banner-content banner-content_style2">
                                        <h5 class="banner-text3"><a href="#">Rùa cạn Châu Phi</a></h5>
                                    </div>
                                </figure>
                            </div>
                            <!-- banner single slide start -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product banner statistics area end -->

        <!-- featured product area start -->
        <section class="feature-product section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">Sản phẩm của chúng tôi</h2>
                            <p class="sub-title">Danh sách thú cưng</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
                        <?php foreach($listSanPham as $key => $sanPham) { ?>
                                        <!-- product item start -->
                                            <div class="product-item">
                                                <figure class="product-thumb">
                                                    <a href="<?= BASE_URL . '?act=chitietsanpham&id=' . $sanPham['id'] ?>">
                                                        <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="product">
                                                    </a>
                                                    <div class="product-badge">
                                                        <?php 
                                                            $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                                            $ngayHienTai = new DateTime();
                                                            $tinhNgay = $ngayHienTai -> diff($ngayNhap);

                                                            if ($tinhNgay -> days <= 7) {
                                                        ?>
                                                                <div class="product-label new">
                                                                    <span>new</span>
                                                                </div>
                                                        <?php
                                                            }
                                                            if ($sanPham['gia_khuyen_mai']) {
                                                        ?>
                                                            <div class="product-label discount">
                                                                <span>Giảm giá</span>
                                                            </div>
                                                        <?php 
                                                            }
                                                        ?>
                                                    </div>
                                                    <div class="cart-hover">
                                                        <a href="<?= BASE_URL . '?act=chitietsanpham&id=' . $sanPham['id'] ?>"><button class="btn btn-cart">Chi tiết</button></a>
                                                    </div>
                                                </figure>
                                                <div class="product-caption text-center">
                                                    <div class="product-identity">
                                                        <p class="manufacturer-name"><a href="<?= BASE_URL . '?act=chitietsanpham&id=' . $sanPham['id'] ?>"><?= $sanPham['ten_danh_muc']?></a></p>
                                                    </div>
                                                    <h6 class="product-name">
                                                        <a href="<?= BASE_URL . '?act=chitietsanpham&id=' . $sanPham['id'] ?>"><?= $sanPham['ten_san_pham'] ?></a>
                                                    </h6>
                                                    <div class="price-box">
                                                        <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                                            <span class="price-regular"><?= number_format($sanPham['gia_khuyen_mai']) ?> VNĐ</span>
                                                            <span class="price-old"><del><?= number_format($sanPham['gia_san_pham']) ?> VNĐ</del></span>
                                                        <?php }else { ?>
                                                            <span class="price-regular"><?= number_format($sanPham['gia_san_pham']) ?> VNĐ</span>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- product item end -->
                                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- featured product area end -->

        <!-- testimonial area start -->
        <!-- testimonial area end -->

        <!-- group product start -->
        <!-- group product end -->

        <!-- latest blog area start -->
        <!-- latest blog area end -->

        <!-- brand logo area start -->
        <div class="brand-logo section-padding pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="brand-logo-carousel slick-row-10 slick-arrow-style">
                            <!-- single brand start -->
                            <div class="brand-item">
                                <a href="#">
                                    <img src="assets/img/brand/1.png" alt="">
                                </a>
                            </div>
                            <!-- single brand end -->

                            <!-- single brand start -->
                            <div class="brand-item">
                                <a href="#">
                                    <img src="assets/img/brand/2.png" alt="">
                                </a>
                            </div>
                            <!-- single brand end -->

                            <!-- single brand start -->
                            <div class="brand-item">
                                <a href="#">
                                    <img src="assets/img/brand/3.png" alt="">
                                </a>
                            </div>
                            <!-- single brand end -->

                            <!-- single brand start -->
                            <div class="brand-item">
                                <a href="#">
                                    <img src="assets/img/brand/4.png" alt="">
                                </a>
                            </div>
                            <!-- single brand end -->

                            <!-- single brand start -->
                            <div class="brand-item">
                                <a href="#">
                                    <img src="assets/img/brand/5.png" alt="">
                                </a>
                            </div>
                            <!-- single brand end -->

                            <!-- single brand start -->
                            <div class="brand-item">
                                <a href="#">
                                    <img src="assets/img/brand/6.png" alt="">
                                </a>
                            </div>
                            <!-- single brand end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand logo area end -->
    </main>

    <?php require_once 'layout/miniCart.php' ?>                                                        

    <?php require_once 'layout/footer.php'; ?>