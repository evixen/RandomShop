<div class="row justify-content-center">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </div>
</div>
</form>
<br>
<div class="row justify-content-center">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header"><strong>ID:</strong></div>
            <div class="card-body">{{ $order->id }}</div>
            <div class="card-header"><strong>Код заказа:</strong></div>
            <div class="card-body">{{ $order->order_id }}</div>
        </div>
    </div>
</div>

<form method="post" action="{{ route('shop.admin.orders.toArchive', $order->id) }}" class="mt-3">
    @method('DELETE')
    @csrf
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-warning">В архив</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form method="post" action="{{ route('shop.admin.orders.destroy', $order->id) }}" class="mt-3">
    @method('DELETE')
    @csrf
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </div>
            </div>
        </div>
    </div>
</form>

