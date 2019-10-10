<div class="row justify-content-center">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">Информация о заказе</div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="name">E-mail</label>
                            <input value="{{ $order->email }}"
                                   type="text"
                                   name="email"
                                   id="email"
                                   class="form-control"
                                   readonly>
                        </div>

                        <div class="form-group">
                            <label for="name">Имя получателя</label>
                            <input value="{{ $order->receiver_name }}"
                                   type="text"
                                   name="receiver_name"
                                   id="receiver_name"
                                   class="form-control"
                                   readonly>
                        </div>

                        <div class="form-group">
                            <label for="slug">Адрес</label>
                            <input value="{{ $order->address }}"
                                   type="text"
                                   name="address"
                                   id="address"
                                   class="form-control"
                                   readonly>
                        </div>

                        <div class="form-group">
                            <label for="slug">Номер телефона</label>
                            <input value="{{ $order->phone }}"
                                   type="text"
                                   name="phone"
                                   id="phone"
                                   class="form-control"
                                   readonly>
                        </div>

                        <div class="form-group">
                            <label for="price">Сумма заказа</label>
                            <input value="{{ $order->price }}"
                                   type="text"
                                   name="price"
                                   id="price"
                                   class="form-control"
                                   minlength="1"
                                   readonly>
                        </div>

                        <div class="form-group">
                            <label for="details">Комментарий</label>
                            <textarea name="comment"
                                      id="comment"
                                      rows="3"
                                      class="form-control">{{ $order->comment }}</textarea>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="is_checked" class="form-check-label">Проверено?</label>
                                </div>
                                <div class="col-sm-1">
                                    <input type="checkbox"
                                           name="is_checked"
                                           class="form-check-input"
                                           value="1"
                                           @if($order->is_checked)
                                           checked="checked"
                                        @endif>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="is_checked" class="form-check-label">Оплачено?</label>
                                </div>
                                <div class="col-sm-1">
                                    <input type="checkbox"
                                           name="is_paid"
                                           class="form-check-input"
                                           value="1"
                                           @if($order->is_paid)
                                           checked="checked"
                                        @endif>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
