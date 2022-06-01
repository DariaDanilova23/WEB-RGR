@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
@endpush
@section('content')
    <div class="smudg">
        <img src={{asset('img/top.png') }}>
    </div>
    <form action="{{route('cart.order')}}" method="POST">
        @csrf
        <fieldset>
            <legend>Choose your monster's features:</legend>
            <div>
                <input type="radio" id="delivery"
                       name="choice" checked value="Доставка">
                <label for="delivery">Доставка</label>

                <input type="radio" id="fromstore"
                       name="choice" value="Самовывоз">
                <label for="fromstore">Самовывоз</label>
            </div>
        </fieldset>
        <fieldset>
            <legend>Choose your monster's features:</legend>
            <div>
                <input type="radio" id="tarasSzew"
                       name="address" checked value="Доставка">
                <label for="delivery">Тараса Шевченко 49</label>

                <input type="radio" id="seamall"
                       name="address" value="seamall">
                <label for="fromstore">ТЦ "Sea Mall", просп. Генерала Острякова 260</label>
            </div>
        </fieldset>
        <label for="comment">Комментарий к заказу:</label>
        <textarea id="comment" name="comment" rows="5" cols="70"></textarea>
        <button type="submit">Оформить заказ</button>
    </form>
@endsection
