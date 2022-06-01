@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endpush
@section('content')
    <div class="smudg">
        <img src={{asset('img/top.png') }}>
    </div>
    <section class="about">
        <div class="about_block">
            <img src={{asset('img/about/about.jpg')}}>
            <div class="about_text">
                <h1>О нас</h1>
                <p> Кондитерская студия Mari'O - первая студия, в которой вы встретитесь с настоящим волшебством кулинарного искусства!
                    У нас можно наблюдать не только пирожные и торты, но целую Философию вкусной жизни</p>
            </div>
        </div>
        <div class="master_block">
            <div class="master_text">
                <h1>Мастер классы</h1>
                <p> Мы регулярно проводим мастер-классы для начинающих и опытных кондитеров.</p>
            </div>
            <img src={{asset('img/about/master.jpg')}}>
        </div>

        <div class="owner_block">
            <img src={{asset('img/about/owner.jpg')}}>
            <div class="owner_text">
                <h1>Основатель</h1>
                <p>Меня зовут Марина Панкеева<br>Я прошла более 20 различных курсов от лучших<br>европейских шефов и владельцев крупных кондитерских производств</p>
            </div>
        </div>
    </section>
@endsection
