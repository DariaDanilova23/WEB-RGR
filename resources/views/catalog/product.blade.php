@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endpush
@section('content')
    <div class="smudg">
        <img src={{asset('img/top.png') }}>
    </div>
    <aside class="back"><a href="{{route('catalog.index')}}"><img src="https://pngimage.net/wp-content/uploads/2018/06/seta-branca-png-.png"></a></aside>
    <div class="add-product">
        <div class="bx-info">
            <p class="inform"></p>
        </div>
    </div>
    <h1>{{strip_tags($catalog['name'])}}<br>&#149;&#149;&#149;&#149;&#149;&#149;&#149;&#149;&#149;&#149;&#149;&#149;&#149;&#149;&#149;&#149;&#149;</h1>
    <section class="products_section">
        <div class="img-product">
                    <div class="products">
                        @foreach ($product as $productItem)
                            <div class="product-item">
                            <form onsubmit="add()" id="add-tocard" action="{{route('cart.store')}}" enctype="multipart/form-data" method="post">
                                @csrf
                                    <img class="pic_product" src="\storage\{{ $productItem['image'] }}">
                                <div class="info">
                                <p>{{ $productItem['price'].' ₽' }}</p>

                                <input type="hidden" id="{{ $productItem['id'] }}" value="{{ $productItem['id'] }}" name="id">
                                <input type="hidden" id="{{ $productItem['name'] }}" value="{{ $productItem['name'] }}" name="name">
                                <input type="hidden" id="{{ $productItem['price'] }}" value="{{ $productItem['price'] }}" name="price">
                                <input type="hidden" id="{{ $productItem['image'] }}" value="{{ $productItem['image'] }}"  name="image">
                                <input type="hidden" id="{{ $productItem['quantity'] }}" value="1" name="quantity">
                                <button class="px-4 addpx-4 py-2 text-white bg-blue-800 rounded">Добавить+</button>
                                </div>
                            </form>
                            </div>
                        @endforeach
                    </div>
        </div>
    </section>
@endsection
