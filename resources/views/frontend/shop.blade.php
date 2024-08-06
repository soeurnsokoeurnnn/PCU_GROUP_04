@extends('frontend.layout')
@section('title')
    Shop
@endsection
@section('content')
<main class="shop">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-9">
                    <div class="row">
    
                        <div class="col-4">
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

                        {{-- pagination product --}}
                        <div class="col-12">
                            <ul class="pagination">
                                <li>
                                    <a href="">1</a>
                                </li>
                                <li>
                                    <a href="">2</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-3 filter">
                    <h4 class="title">Category</h4>
                    <ul>
                        <li>
                            <a href="/shop">ALL</a>
                        </li>
                        
                        <li>
                            <a href="/shop">Women</a>
                        </li>
                    </ul>
                    
                    <h4 class="title mt-4">Price</h4>
                    <div class="block-price mt-4">
                        <a href="">High</a>
                        <a href="">Low</a>
                    </div>

                    <h4 class="title mt-4">Promotion</h4>
                    <div class="block-price mt-4">
                        <a href="">Promotion Product</a>
                    </div>

                </div>
            </div>
        </div>
    </section>

</main>
@endsection