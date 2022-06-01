@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
@endpush
@section('content')
    <section class="master-section">
        <div class="smudg">
            <img src={{asset('img/top.png') }}>
        </div>
        <h2>Запись на мастер-класс<br> +7(978) 006-50-51</h2>
        <h1 align="center">Мастер-классы<br>&#149;&#149;&#149;&#149;&#149;&#149;&#149;&#149;&#149;&#149;&#149;&#149;&#149;</h1>
        <section class="master">
            <table>
            @foreach ($masters as $master)
                <tr>
                    <td class="left">
                       {!! $master['date']!!};
                        <br>
                        {!! $master['time']!!}
                    </td>
                    <td class="right">
                        <h1>{!! $master['tittle']!!}</h1>
                        {!! $master['info']!!}
                    </td>
                </tr>
            @endforeach
            </table>
        </section>
    </section>
@endsection
