<x-app-layout>
    <div class="container">
        <h1>Подать заявку</h1>

        @if ($errors->any())
            <div class="errors">
                @foreach ($errors->all() as $error)<p>{{ $error }}</p>@endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('requests.store') }}">
            @csrf
            
            <label>Тип мебели 
                <select name="repair_type" required>
                    <option value="tabouret">Табурет</option>
                    <option value="chair">Стул</option>
                    <option value="armchair">Кресло</option>
                    <option value="sofa">Диван</option>
                </select>
            </label>
            <label>Количество мебели
                <input type="text" name="how_much" value="{{ old('how_much') }}" required>
            </label>
            <label>Способ оплаты
                <select name="payment_method" required>
                    <option value="cash">Наличными</option>
                    <option value="card">Банковская карта</option>
                    <option value="bank_transfer">Безналичный расчёт</option>
                </select>
            </label>
            <label>Дата и время ремонта
                <input type="datetime-local" name="repair_datetime" required>
            </label>
            <button type="submit" class="btn">Отправить заявку</button>
        </form>
    </div>
</x-app-layout>