<x-app-layout>
    <div class="slider" id="main-slider">
        <button class="slider-btn prev">&#10094;</button>
        <div class="slider-track">
            <img src="{{ asset('images/slider/1.png') }}" alt="Мебель 1">
            <img src="{{ asset('images/slider/2.png') }}" alt="Мебель 2">
            <img src="{{ asset('images/slider/3.png') }}" alt="Мебель 3">
            <img src="{{ asset('images/slider/4.png') }}" alt="Мебель 4">
            <img src="{{ asset('images/slider/5.png') }}" alt="Мебель 5">
            <img src="{{ asset('images/slider/6.png') }}" alt="Мебель 6">
            <img src="{{ asset('images/slider/7.png') }}" alt="Мебель 7">
            <img src="{{ asset('images/slider/8.png') }}" alt="Мебель 8">
            <img src="{{ asset('images/slider/9.png') }}" alt="Мебель 9">
            <img src="{{ asset('images/slider/10.png') }}" alt="Мебель 10">
            <img src="{{ asset('images/slider/11.png') }}" alt="Мебель 11">
            <img src="{{ asset('images/slider/12.png') }}" alt="Мебель 12">
        </div>
        <button class="slider-btn next">&#10095;</button>
    </div>

    <section class="hero">
        <h1>Реставрация</h1>
        <p>Портал услуг по реставрации мебели</p>
        @guest
            <a href="{{ route('register') }}" class="btn">Зарегистрироваться</a>
            <a href="{{ route('login') }}" class="btn btn-outline">Войти</a>
        @else
            <a href="{{ route('requests.create') }}" class="btn">Подать заявку</a>
        @endguest
    </section>
</x-app-layout>