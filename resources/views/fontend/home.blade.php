@extends('layout')

@section('slider')
    <div class="row">
      <div class="col-md-8">
        <section class="slide-swp">
          <div class="swiper-container gallery-top">
            <div class="swiper-wrapper">
                @foreach ($get_slider as $slider)      
              <div class="swiper-slide">
                <img class="img-slide" src="{{URL('storage/'.$slider->slider_image)}}">
              </div>
              @endforeach
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
          </div>
          <div class="swiper-container gallery-thumbs" id="border-swiper">
            <div class="swiper-wrapper">
                @foreach ( $get_slider as $slider)
              <div class="swiper-slide"><a>{{$slider->slider_desc}}</a></div>
              @endforeach
            </div>
          </div>

    </section>

      </div>
      <div class="col-md-4">
        <h3 class="title">
          <a href="">
            Mua MacBook Air M1 16GB đi – Khuyến mại mê ly
          </a>
        </h3>
        <h3 class="title">
          <a href="">
            Phụ kiện chất – Ưu đãi khủng tại ThinkPro              </a>
        </h3>
        <h3 class="title">
          <a href="">
            ThinkPad Tháng 3: Quà bao la – Giảm giá cực đã              </a>
        </h3>
        <div class="tin-tuc"><a href="" class="flex items-center space-x-1"><span>Tất cả tin tức</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
              class="bi bi-chevron-right" viewBox="0 0 16 16">
              <path fill-rule="evenodd"
                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
            </svg>
          </a></div>
      </div>
    </div>
@endsection

@section('giam_gia')
<div class="relative">
    <h2 class="title_cate"><span>Giảm giá sốc
      </span></h2>
    <div class="swiper-container">
      <div class="swiper-wrapper">
          @foreach ($get_product as $product)
        <div class="swiper-slide">
          <div class="item-grid">
            <div class="contain">
              <div class="image-container">
                <a href="item-detail.html">
                  <img src="{{URL('storage/'.$product->product_image)}}" class="img-fluid">
                </a>
              </div>
              <div class="content-bottom">
                <a href="item-detail.html" class="tensp">
                    {{$product->product_name}}
                </a>
                <div class="items-center">
                  <strong>2</strong>
                  <span>cấu hình tùy chọn</span>
                </div>
                <div class="product-price">
                  <div class="items-center">
                    <span>Giá từ</span>
                    <span class="vnd">{{number_format($product->product_price,0,',','.') }}đ}   
                    </span>
                  </div>
                </div>
                <div class="quatang">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-gift" viewBox="0 0 16 16">
                    <path
                      d="M3 2.5a2.5 2.5 0 0 1 5 0 2.5 2.5 0 0 1 5 0v.006c0 .07 0 .27-.038.494H15a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 14.5V7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h2.038A2.968 2.968 0 0 1 3 2.506V2.5zm1.068.5H7v-.5a1.5 1.5 0 1 0-3 0c0 .085.002.274.045.43a.522.522 0 0 0 .023.07zM9 3h2.932a.56.56 0 0 0 .023-.07c.043-.156.045-.345.045-.43a1.5 1.5 0 0 0-3 0V3zM1 4v2h6V4H1zm8 0v2h6V4H9zm5 3H9v8h4.5a.5.5 0 0 0 .5-.5V7zm-7 8V7H2v7.5a.5.5 0 0 0 .5.5H7z" />
                  </svg>
                  Quà tặng kèm
                </div>
                <div class="content-more">
                  <div class="desc-global">
                    <div>
                      <p>Intel Core i5-1035G1, RAM 8GB, 512GB m.2 Sata, 15.6" FHD TN (1920x1080), Intel UHD G1,
                        35Wh,
                        Platinum Grey</p>
                    </div>
                  </div>
                  <div class="text-center p-4 them">
                    <a href="javascript:;" class="themgiohang">
                      Thêm vào giỏ hàng
                    </a> <a href="javascript:;" class="themsosanh">
                      Thêm vào so sánh
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
            @endforeach
      </div>

      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>

    </div>

</div>
@endsection
