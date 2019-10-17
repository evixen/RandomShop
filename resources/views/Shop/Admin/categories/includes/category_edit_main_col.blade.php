<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Информация о категории</div>
            <div class="card-body">
                <div class="form-group">
                    <input value="{{ $category->id }}"
                           type="hidden"
                           name="id"
                           id="id">
                </div>

                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input value="{{ $category->title }}"
                           type="text"
                           name="title"
                           id="title"
                           class="form-control"
                           minlength="3"
                           required>
                </div>

                <div class="form-group">
                    <label for="slug">Идентификатор</label>
                    <input value="{{ $category->slug }}"
                           type="text"
                           name="slug"
                           id="slug"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label for="parent_id">Родитель</label>
                    <select placeholder="Выберите категорию"
                            name="parent_id"
                            id="parent_id"
                            class="form-control"
                            required>
                        <option value="0"
                                @if($category->parent_id == 0) selected @endif>
                            Нет
                        </option>
                        @foreach($categoryList as $categoryOption)
                            @if($categoryOption->id != $category->id)
                                <option value="{{ $categoryOption->id }}"
                                        @if($categoryOption->id == $category->parent_id) selected @endif>
                                    {{ $categoryOption->id }} . {{$categoryOption->title }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea name="description"
                              id="description"
                              rows="3"
                              class="form-control">{{ old('description', $category->description) }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
