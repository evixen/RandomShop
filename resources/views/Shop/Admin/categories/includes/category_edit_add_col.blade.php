@php
    /** \App\Models\BlogCategory $category */
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </div>
</div>
</form>
<br>
@if($category->exists)
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li><strong>ID: {{ $category->id }}</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br>
    <form method="post" action="{{ route('shop.admin.categories.destroy', $category->id) }}">
        @method('DELETE')
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endif

