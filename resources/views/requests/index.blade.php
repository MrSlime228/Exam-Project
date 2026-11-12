<x-app-layout>
    <div class="container">
        <h1>Мои заявки</h1>
        <a href="{{ route('requests.create') }}" class="btn">+ Новая заявка</a>

        @if ($requests->isEmpty())
            <p>У вас пока нет заявок.</p>
        @else
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Адрес</th><th>Тип ремонта</th><th>Дата/время</th>
                            <th>Оплата</th><th>Статус</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requests as $r)
                            <tr>
                                <td>{{ $r->address }}</td>
                                <td>{{ $r->repair_type_label }}</td>
                                <td>{{ $r->repair_datetime->format('d.m.Y H:i') }}</td>
                                <td>{{ $r->payment_method_label }}</td>
                                <td class="status status-{{ $r->status }}">{{ $r->status_label }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>