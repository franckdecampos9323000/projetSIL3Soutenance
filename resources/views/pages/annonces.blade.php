@extends('layouts.site.main')

@section('title', 'ANNONCES')

@section('content')
    <!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>

    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('user-annonces.create') }}" class="btn btn-secondary">
                            <h1 class="title">FAIRE UNE ANNONCE</h1>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Shop Section:::... -->
    <div class="shop-section">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-9">
                    <!-- Start Tab Wrapper -->
                    <div class="sort-product-tab-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="tab-content tab-animate-zoom">
                                        <!-- Start Grid View Product -->
                                        <div class="tab-pane active show sort-layout-single" id="layout-3-grid">
                                            <div class="row">
                                                <!-- Search Form -->
                                                <div class="col-12 mb-4">
                                                    <form action="{{ route('Annonces.index') }}" method="GET">
                                                        <div class="input-group">
                                                            <input type="text" name="search" class="form-control" placeholder="Rechercher par titre">
                                                            <button type="submit" class="btn btn-primary">Rechercher</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                @foreach($annonces as $annonce)
                                                    <div class="col-xl-4 col-sm-6 col-12">
                                                        <!-- Start Product Default Single Item -->
                                                        <div class="product-default-single-item product-color--golden" data-aos="fade-up" data-aos-delay="0">
                                                            <div class="image-box">
                                                                <a href="{{ route('annonces.show', $annonce->id) }}" class="image-link">
                                                                    @if ($annonce->image1)
                                                                        <img src="{{ asset('storage/' . $annonce->image1) }}" alt="Image de l'annonce">
                                                                    @endif
                                                                    @if ($annonce->image2)
                                                                        <img src="{{ asset('storage/' . $annonce->image2) }}" alt="Image de l'annonce">
                                                                    @endif
                                                                </a>
                                                                <div class="action-link">
                                                                    <div class="action-link-left">
                                                                        <form action="{{ route('panier.store') }}" method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="annonce_id" value="{{ $annonce->id }}">
                                                                            <input type="hidden" name="quantite" value="1"> <!-- Vous pouvez ajuster la quantité si nécessaire -->
                                                                            <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                                                                        </form>
                                                                    </div>
                                                                    <div class="action-link-right">
                                                                        <a href="{{ route('annonces.show', $annonce->id) }}" data-bs-toggle="modal" data-bs-target="#modalQuickview">
                                                                            <i class="icon-magnifier"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="content-left">
                                                                    <h6 class="title"><a href="{{ route('annonces.show', $annonce->id) }}">{{ $annonce->titre }}</a></h6>
                                                                </div>
                                                                <div class="content-right">
                                                                    <span class="price">{{ $annonce->prix }} FCFA</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Product Default Single Item -->
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div> <!-- End Grid View Product -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Tab Wrapper -->

                    <!-- Start Pagination -->
                    <div class="page-pagination text-center" data-aos="fade-up" data-aos-delay="0">
                        <ul>
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="ion-ios-skipforward"></i></a></li>
                        </ul>
                    </div> <!-- End Pagination -->
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Shop Section:::... -->
@endsection
