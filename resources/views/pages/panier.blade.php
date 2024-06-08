@extends('layouts.site.main')

@section('title', 'PANIER')

@section('content')

    <!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>

    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Mon panier</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Cart Section:::... -->
    <div class="cart-section">
        <!-- Start Cart Table -->
        <div class="cart-table-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="table_page table-responsive">
                                <table>
                                    <!-- Start Cart Table Head -->
                                    <thead>
                                        <tr>
                                            <th class="product_remove">Supprimer</th>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Titre</th>
                                            <th class="product-price">Prix</th>
                                            <th class="product_quantity">Quantité</th>
                                            <th class="product_total">Total</th>
                                        </tr>
                                    </thead> <!-- End Cart Table Head -->
                                    <tbody>
                                        @foreach ($panierItems as $panierItem)
                                            <!-- Start Cart Single Item-->
                                            <tr>
                                                <td class="product_remove">
                                                    <form action="{{ route('panier.supprimer', $panierItem->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"><i class="fa fa-trash-o"></i></button>
                                                    </form>
                                                </td>
                                                <td class="product_thumb"><a href="{{ route('annonces.show', $panierItem->annonce->id) }}"><img
                                                            src="{{ asset('storage/' . $panierItem->annonce->image1) }}"
                                                            alt="Image de l'annonce"></a></td>
                                                <td class="product_name"><a href="{{ route('annonces.show', $panierItem->annonce->id) }}">{{ $panierItem->annonce->titre }}</a></td>
                                                <td class="product-price">{{ $panierItem->annonce->prix }} FCFA</td>
                                                <td class="product_quantity">
                                                    <form action="{{ route('panier.update', $panierItem->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <label>Quantité</label>
                                                        <input min="1" max="100" value="{{ $panierItem->quantite }}" type="number" name="quantite">
                                                        <button type="submit">Actualiser</button>
                                                    </form>
                                                </td>
                                                <td class="product_total">{{ $panierItem->annonce->prix * $panierItem->quantite }} FCFA</td>
                                            </tr> <!-- End Cart Single Item-->
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="cart_submit">
                                <form action="#" method="POST">
                                    @csrf
                                    <button class="btn btn-md btn-golden" type="submit">Actualiser le panier</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Cart Table -->

        <!-- Start Coupon Start -->
        <div class="coupon_area">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-md-12">
                        <div class="coupon_code right" data-aos="fade-up" data-aos-delay="400">
                            <h3>Montant</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>Total</p>
                                    <p class="total">{{ $total }} FCFA</p>
                                </div>
                                <div class="checkout_btn">
                                    <a href="#" class="btn btn-md btn-golden">Proceder au paiement</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Coupon Start -->
    </div> <!-- ...:::: End Cart Section:::... -->
@endsection
