<p>Имя: {{ $order['name'] }}</p>
<p>Телефон: {{ $order['phone'] }}</p>
<p>E-mail: {{ $order['email'] }}</p>
<p>Модель автомобиля: {{ $order['car'] }}</p>
@if($order['type'] == "calculate")
    <p>Время работы авто: {{ $order['time'] }}</p>
@endif
<p>Сообщение: {{ $order['comment'] }}</p>
@if($order['driver'] === "true")
    <p>Дата заказа: {{ date('d-m-Y', strtotime($order['date'])) }}</p>
    <p>Время аренды: {{ isset($order['time']) ? $order['time'] : "Не указано" }}</p>
    <p>Адрес подачи авто: {{ isset($order['start_address']) ? $order['start_address'] : "Не указано" }}</p>
    <p>Адрес окончания заказа: {{ isset($order['end_address']) ? $order['end_address'] : "Не указано" }}</p>
    <p>Выезд за город: {{ isset($order['out_city']) ? $order['out_city'] : "Не указано" }}</p>
    @if($order['type'] == "order")
        <p>С водителем</p>
    @endif
@else
    <p>Дата выдачи: {{ date('d-m-Y', strtotime($order['date'])) }}</p>
    @if(isset($order['end_date']))
        <p>Дата возврата: {{ date('d-m-Y', strtotime($order['end_date'])) }}</p>
    @endif
    @if(isset($order['start_time']) && isset($order['end_time']))
        <p>Время выдачи: {{ $order['start_time'] ? $order['start_time'] : 'Не указано' }}</p>
        <p>Время возврата: {{ $order['end_time'] ? $order['end_time'] : 'Не указано' }}</p>
    @endif
    @if($order['type'] == "order")
        <p>Без водителя</p>
    @endif
@endif