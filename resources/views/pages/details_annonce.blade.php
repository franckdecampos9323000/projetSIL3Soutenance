@extends('layouts.site.main')

@section('title', 'DETAILS')

@section('content')
    <!-- Start Product Details Section -->
    <br><br><br><br>
    <div class="product-details-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6">
                    <div class="product-details-gallery-area" data-aos="fade-up" data-aos-delay="0">
                        <!-- Start Large Image -->
                        <div class="product-large-image product-large-image-horaizontal swiper-container">
                            <div class="swiper-wrapper">
                                @if ($annonce->image1)
                                    <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                        <img src="{{ asset('storage/' . $annonce->image1) }}" alt="Image de l'annonce">
                                    </div>
                                @endif
                                @if ($annonce->image2)
                                    <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                        <img src="{{ asset('storage/' . $annonce->image2) }}" alt="Image de l'annonce">
                                    </div>
                                @endif
                                @if ($annonce->image3)
                                    <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                        <img src="{{ asset('storage/' . $annonce->image3) }}" alt="Image de l'annonce">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- End Large Image -->
                        <!-- Start Thumbnail Image -->
                        <div class="product-image-thumb product-image-thumb-horizontal swiper-container pos-relative mt-5">
                            <div class="swiper-wrapper">
                                @if ($annonce->image1)
                                    <div class="product-image-thumb-single swiper-slide">
                                        <img class="img-fluid" src="{{ asset('storage/' . $annonce->image1) }}" alt="Image de l'annonce">
                                    </div>
                                @endif
                                @if ($annonce->image2)
                                    <div class="product-image-thumb-single swiper-slide">
                                        <img class="img-fluid" src="{{ asset('storage/' . $annonce->image2) }}" alt="Image de l'annonce">
                                    </div>
                                @endif
                                @if ($annonce->image3)
                                    <div class="product-image-thumb-single swiper-slide">
                                        <img class="img-fluid" src="{{ asset('storage/' . $annonce->image3) }}" alt="Image de l'annonce">
                                    </div>
                                @endif
                            </div>
                            <!-- Add Arrows -->
                            <div class="gallery-thumb-arrow swiper-button-next"></div>
                            <div class="gallery-thumb-arrow swiper-button-prev"></div>
                        </div>
                        <!-- End Thumbnail Image -->
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
                    <div class="product-details-content-area product-details--golden" data-aos="fade-up" data-aos-delay="200">
                        <!-- Start  Product Details Text Area-->
                        <div class="product-details-text">
                            <h4 class="title">{{ $annonce->titre }}</h4>
                            <div class="d-flex align-items-center">
                                <ul class="review-star">
                                    <li class="fill"><i class="ion-android-star"></i></li>
                                    <li class="fill"><i class="ion-android-star"></i></li>
                                    <li class="fill"><i class="ion-android-star"></i></li>
                                </ul>
                            </div>
                            <div class="price">{{ $annonce->prix }} FCFA</div>
                            <p>{{ $annonce->description }}</p>
                        </div> <!-- End  Product Details Text Area-->
                        <!-- Start Product Variable Area -->
                        <div class="product-details-variable">
                            <div class="variable-single-item">
                                <div class="product-stock"> État: <span class="product-stock-in"><i class="ion-checkmark-circled"></i></span> {{ $annonce->etat }}</div>
                            </div>
                            <div class="variable-single-item">
                                <div class="product-stock"> Type: <span class="product-stock-in"><i class="ion-checkmark-circled"></i></span> {{ $annonce->type }}</div>
                            </div>
                            <!-- Product Variable Single Item -->
                            <div class="d-flex align-items-center ">
                                <div class="product-add-to-cart-btn">
                                    <a href="#" class="btn btn-block btn-lg btn-black-default-hover" data-bs-toggle="modal" data-bs-target="#modalAddcart">Acheter</a>
                                </div>
                            </div>
                        </div> <!-- End Product Variable Area -->

                        <!-- Start  Product Details Catagories Area-->
                        <div class="product-details-catagory mb-2">
                            <span class="title">Nom de l'annonceur:<h1> {{ $annonce->user->name }}</span> </h1>
                        </div> <!-- End  Product Details Catagories Area-->
                        <div class="product-details-catagory mb-2">
                            <span class="title">Contact de l'annonceur:<h1> {{ $annonce->user->phone }}</span> </h1>
                        </div> <!-- End  Product Details Catagories Area-->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Product Details Section -->
@endsection
