@extends('frontend.layout')
@section('title')
    Product Detail
@endsection
@section('content')
<main class="product-detail">

    <section class="review">
        <div class="container">
            <div class="row">
                <div class="col-5">
                    <div class="thumbnail">
                        <img src="https://placehold.co/450x670" alt="">
                    </div>
                </div>
                <div class="col-7">
                    <div class="detail">
                        <div class="price-list">
                                <div class="regular-price"><strike> US 12</strike></div>
                                <div class="sale-price">US 8</div>
                                <div class="price d-none">US 12</div>
                        </div>
                        <h5 class="title">T Shirt 001</h5>
                        <div class="group-size">
                            <span class="title">Color Available</span>
                            <div class="group">Black, Blue, Green</div>
                        </div>
                        <div class="group-size">
                            <span class="title">Size Available</span>
                            <div class="group">S, M, L</div>
                        </div>
                        <div class="group-size">
                            <span class="title">Description</span>
                            <div class="description">Description</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="main-title">
                        RELATED PRODUCTS
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <figure>
                        <div class="thumbnail">
                            <div class="status">
                                Promotion
                            </div>
                            <a href="/product/t-shirt">
                                <img src="https://placehold.co/450x670" alt="">
                            </a>
                        </div>
                        <div class="detail">
                            <div class="price-list">
                                <div class="price d-none">US 12</div>
                                <div class="regular-price "><strike> US 12</strike></div>
                                <div class="sale-price ">US 8</div>
                            </div>
                            <h5 class="title">T Shirt 001</h5>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection