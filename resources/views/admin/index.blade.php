<x-app-layout>
    <div class="container">
        <h1>Панель администратора</h1>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ФИО</th><th>Телефон</th><th>Email</th>
                        <th>Адрес</th><th>Тип</th><th>Дата/время</th>
                        <th>Оплата</th><th>Статус</th><th>Действие</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requests as $r)
                        <tr>
                            <td>{{ $r->user->name }}</td>
                            <td>{{ $r->user->phone }}</td>
                            <td>{{ $r->user->email }}</td>
                            <td>{{ $r->address }}</td>
                            <td>{{ $r->repair_type_label }}</td>
                            <td>{{ $r->repair_datetime->format('d.m.Y H:i') }}</td>
                            <td>{{ $r->payment_method_label }}</td>
                            <td>{{ $r->status_label }}</td>
                            <td>
                                <form method="POST" action="{{ route('admin.requests.status', $r) }}">
                                    @csrf @method('PATCH')
                                    <select name="status" onchange="this.form.submit()">
                                        @foreach (['new'=>'Новая','in_progress'=>'В процессе','completed'=>'Завершена','cancelled'=>'Отменена'] as $k=>$v)
                                            <option value="{{ $k }}" @selected($r->status===$k)>{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>