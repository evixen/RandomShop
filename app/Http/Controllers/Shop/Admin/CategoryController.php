<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Requests\ShopProductCategoryCreateRequest;
use App\Http\Requests\ShopProductCategoryUpdateRequest;
use App\Models\ShopProductCategory;
use App\Repositories\ShopProductCategoryRepository;
use Illuminate\Http\Response;

class CategoryController extends AdminBaseController
{

    /**
     * @var ShopProductCategoryRepository
     */
    protected $categories;


    public function __construct(ShopProductCategoryRepository $categories)
    {
        parent::__construct();

        $this->categories = $categories;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $paginator = $this->categories->getAllWithPaginate(10);

        return view('Shop.Admin.categories.index', compact('paginator'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $category = new ShopProductCategory();

        $categoryList = $this->categories->getForComboBox();

        return view('Shop.Admin.categories.create', compact('category', 'categoryList'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param ShopProductCategoryCreateRequest $request
     * @return Response
     */
    public function store(ShopProductCategoryCreateRequest $request)
    {
        $data = $request->input();

        // Сохраняем объект с введенными данными
        $category = new ShopProductCategory($data);

        $result = $category->save();

        if ($result) {
            return redirect()
                ->route('shop.admin.categories.edit', $category->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => "Ошибка сохранения"])
                ->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->categories->getEdit($id);

        if (empty($category)) {
            return redirect()
                ->route('shop.admin.categories.index')
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        $categoryList = $this->categories->getForComboBox();

        return view('Shop.Admin.categories.edit', compact('category', 'categoryList'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param ShopProductCategoryUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(ShopProductCategoryUpdateRequest $request, $id)
    {
        $category = $this->categories->getEdit($id);

        if (empty($category)) {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->input();

        // Сохраняем обновленные данные
        $result = $category
            ->fill($data)
            ->save();

        if ($result) {
            return redirect()
                ->route('shop.admin.categories.edit', $category->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => "Ошибка сохранения"])
                ->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        // Запрещаем удаление, если есть вложенные категории
        $children = $this->categories->getChildren($id);

        if (!$children->isEmpty()) {
            return back()->withErrors(['msg' => 'Перед удалением необходимо удалить вложенные категории']);
        }

        // Удаляем запись
        $result = ShopProductCategory::destroy($id);

        if ($result) {
            return redirect()
                ->route('shop.admin.categories.index')
                ->with(['success' => "Запись id[$id] удалена"]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка удаления']);
        }
    }


    /**
     * Показывает удаленные записи
     *
     * @return Response
     */
    public function deleted()
    {
        $deleted = $this->categories->getTrashed();

        return view('Shop.Admin.categories.deleted', compact('deleted'));
    }


    /**
     * Восстанавливает удаленную запись
     *
     * @param int $id
     * @return Response
     */
    public function restore($id)
    {
        $category = $this->categories->getEdit($id);

        $category->deleted_at = null;

        if ($category->save()) {
            return redirect()
                ->route('shop.admin.categories.edit', $category->id)
                ->with(['success' => "Запись id[$id] восстановлена"]);
        } else {
            return back()
                ->withErrors(['msg' => "Ошибка востановления"])
                ->withInput();
        }
    }
}
