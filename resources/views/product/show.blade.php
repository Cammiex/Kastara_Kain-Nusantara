@php use App\Models\Product; @endphp
@extends('layouts.apps')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')

  <!-- Product Detail -->
  <section class="sec-product-detail bg0 p-t-25 p-b-55">
    <div class="container">
      <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-5 p-b-35 p-lr-0-lg">
        <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
          Home
          <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <a href="/products" class="stext-109 cl8 hov-cl1 trans-04">
          Products
          <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4 user-select-none">
          {{ $viewData['product']->name  }}
        </span>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-7 p-b-30">
          <div class="p-l-25 p-r-30 p-lr-0-lg">
            <div class="wrap-slick3 flex-sb flex-w">
              <div class="wrap-slick3"></div>
              <div class="wrap-slick3 flex-sb-m flex-w"></div>

              <div class="slick3 gallery-lb">
                <div class="wrap-pic-w pos-relative">
                  <img src="{{ asset('/storage/'. $viewData['product']->getImage()) }}"
                       alt="IMG-PRODUCT">

                  <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                     href="{{ asset('/storage/'. $viewData['product']->getImage()) }}">
                    <i class="fa fa-expand"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-5 p-b-30">
          <div class="p-r-50 p-t-5 p-lr-0-lg">
            <h4 class="mtext-105 cl2 js-name-detail p-b-14">
              {{ $viewData['product']->getName() }}
            </h4>

            <span class="mtext-106 cl2">
							${{ $viewData['product']->getPrice() }}
						</span>

            <!--  -->
            <div class="p-t-33">
              <form method="POST" action="{{ route('cart.add', ['id'=> $viewData['product']->getId()]) }}">
                <div class="flex-w flex-r-m p-b-10">
                  <div class="size-204 flex-w flex-m respon6-next">
                    @csrf
                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                      <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                        <i class="fs-16 zmdi zmdi-minus"></i>
                      </div>
                      <input class="mtext-104 cl3 txt-center num-product" type="number" name="quantity" value="1"
                             min="1" max="24">
                      <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                        <i class="fs-16 zmdi zmdi-plus"></i>
                      </div>
                    </div>

                    <button
                      class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                      Add to cart
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!--  -->
          <div class="flex-w flex-m p-l-100 p-t-40 respon7">
            <div class="flex-m bor9 p-r-10 m-r-11">
            </div>

            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
               data-tooltip="Facebook">
              <i class="fa fa-facebook"></i>
            </a>

            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
               data-tooltip="Twitter">
              <i class="fa fa-twitter"></i>
            </a>

            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
               data-tooltip="Google Plus">
              <i class="fa fa-google-plus"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="bor10 m-t-50 p-t-43 p-b-40">
      <!-- Tab01 -->
      <div class="tab01">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item p-b-10 fs-5 mtext-105">
            Description
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content p-t-33">
          <!-- - -->
          <div class="tab-pane fade show active" id="description" role="tabpanel">
            <div class="how-pos2 p-lr-15-md">
              <p class="stext-102 cl6">
                {{ $viewData['product']->getDescription() }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
            <span class="stext-107 cl6 p-lr-25 user-select-none">
              {{ $viewData['product']->getKode() }}
            </span>

      <span class="stext-107 cl6 p-lr-25">
              Categories: Pulau <a class="text-decoration-none stext-107 cl6"
                                   href="/category/{{ $viewData['product']->category->name }}">
          {{ $viewData['product']->category->name }}
          </a>
            </span>
    </div>
  </section>

  <!-- Related Products -->
  <section class="sec-relate-product bg0 p-t-15 p-b-35">
    <div class="container">
      <div class="p-b-45">
        <h3 class="ltext-106 cl5 txt-center">
          Related Products
        </h3>
      </div>

      <!-- Slide2 -->
      <div class="wrap-slick2">
        <div class="slick2">
          @foreach($viewData['recomends'] as $recomend)
            <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
              <div class="block2">
                <div class="block2-pic hov-img0">
                  <a href="/products/{{ $recomend->slug }}">
                  <img src="/storage/{{ $recomend->image }}" alt="IMG-PRODUCT">
                  </a>
                </div>

                <div class="block2-txt flex-w flex-t p-t-14">
                  <div class="block2-txt-child1 flex-col-l ">
                    <a href="/products/{{ $recomend->slug }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                      {{ $recomend->name }}
                    </a>

                    <span class="stext-105 cl3">
										${{ $recomend->price }}
									</span>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
@endsection
