@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
@endpush
@section('content')
    <div class="smudg">
        <img src={{asset('img/top.png') }}>
    </div>
    <main class="my-8">
        <div class="px-6 mx-auto">
            <div class="flex justify-center my-6">
                <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                    <h1 class="text-3xl text-bold">Корзина<br>&#149;&#149;&#149;&#149;&#149;&#149;&#149;&#149;&#149;&#149;&#149;</h1>
                    @if ($message = Session::get('success')) <p class="text-green-800">{{ $message }}</p>
                    @else
                    <div class="remove">
                                <form action="{{ route('cart.clear') }}" method="POST">
                                    @csrf
                                    <button class="px-6 py-2 text-red-800 bg-red-300"><img src={{asset("img/trash.png")}}></button>
                                </form>
                            </div>
                    <div class="flex-1">
                        <table class="w-full text-sm lg:text-base" cellspacing="0">
                            <thead>
                            <tr class="h-12 uppercase">
                                <th class="hidden md:table-cell"></th>
                                <th class="text-left">Название</th>
                                <th class="pl-5 text-left lg:text-right lg:pl-0">
                                    <span class="lg:hidden" title="Quantity">Количество</span>
                                </th>
                                <th class="hidden text-right md:table-cell"> Цена</th>
                                <th class="hidden text-right md:table-cell"> <!--Удалить--> </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($cartItems as $item)
                                <tr>
                                    <td class="hidden pb-4 md:table-cell">
                                            <img src="\storage\{{ $item->attributes->image }}" class="w-20 rounded" alt="Thumbnail">
                                    </td>
                                    <td>
                                            <p class="mb-2 md:ml-4">{!! nl2br($item->name) !!}</p>
                                    </td>

                                    <td class="justify-center mt-6 md:justify-end md:flex">
                                        <div class="h-10 w-28">
                                            <div class="relative flex flex-row w-full h-8">

                                                <form class="form_update" action="{{ route('cart.update') }}" method="POST">
                                                    @csrf
<!--                                                    <input type="hidden" class="id" id="{{ $item->id}}" name="id" value="{{ $item->id}}" >
                                                    --><input type="number" min="1" max="10" name="quantity" id="{{ $item->id }}" value="{{ $item->quantity }}"
                                                           class="w-6 text-center bg-gray-300 quantity-number" />
                                                   </form>
                                            </div>
                                        </div>
                                    </td>


                                    <td class="hidden text-right md:table-cell">
                                <span class="text-sm font-medium lg:text-base">
                                    {{ $item->price }}₽
                                </span>
                                    </td>
                                    <td class="hidden text-right md:table-cell">
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $item->id }}" name="id">
                                            <button class="px-4 py-2 text-white bg-red-600">x</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <br> <br>
                        <div>
                            К оплате: <span class="to-pay">{{ Cart::getTotal() }}</span> ₽
                        </div>
                        <form action="{{route('cart.order')}}" method="POST">
                            @csrf
                            <button class="button_enter">Перейти к оформлению</button>
                        </form>
                        <div class="writeinfo">

                        </div>


                    </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
