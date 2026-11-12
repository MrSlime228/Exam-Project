<x-app-layout>
    <div class="slider" id="main-slider">
        <button class="slider-btn prev">&#10094;</button>
        <div class="slider-track">
            <img src="{{ asset('images/slider/1.png') }}" alt="Мебель 1">
            <img src="{{ asset('images/slider/2.png') }}" alt="Мебель 2">
            <img src="{{ asset('images/slider/3.png') }}" alt="Мебель 3">
            <img src="{{ asset('images/slider/4.png') }}" alt="Мебель 4">
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