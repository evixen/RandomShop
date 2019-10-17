<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Информация о товаре</div>
            <div class="card-body">
                <div class="form-group">
                    <input value="{{ $product->id }}"
                           type="hidden"
                           name="id"
                           id="id">
                </div>

                <div class="form-group">
                    <label for="name">Имя</label>
                    <input value="{{ $product->name }}"
                           type="text"
                           name="name"
                           id="name"
                           class="form-control"
                           minlength="4"
                           required>
                </div>

                <div class="form-group">
                    <label for="slug">Идентификатор (slug)</label>
                    <input value="{{ $product->slug }}"
                           type="text"
                           name="slug"
                           id="slug"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label for="category_id">Категория</label>
                    <select placeholder="Выберите категорию"
                            name="category_id"
                            id="category_id"
                            class="form-control"
                            required>
                        @foreach($categoryList as $categoryOption)
                            <option value="{{ $categoryOption->id }}"
                                    @if($categoryOption->id == $product->category_id) selected @endif>
                                {{ $categoryOption->id }} . {{$categoryOption->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="details">Описание</label>
                    <textarea name="details"
                              id="details"
                              rows="3"
                              class="form-control">{{ old('details', $product->details) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="price">Цена</label>
                    <input value="{{ $product->price }}"
                           type="text"
                           name="price"
                           id="price"
                           class="form-control"
                           minlength="1"
                           required>
                </div>
            </div>
        </div>
    </div>
</div>
