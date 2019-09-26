<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Requests\ShopProductCategoryCreateRequest;
use App\Http\Requests\ShopProductCategoryUpdateRequest;
use App\Models\ShopProductCategory;
use Illuminate\Http\Request;

class CategoryController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = ShopProductCategory::with('parent:id,title')->paginate(10);

        return view('Shop.Admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new ShopProductCategory();

        $categoryList = ShopProductCategory::select(['id', 'title'])->get();

        return view('Shop.Admin.categories.create', compact('category', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShopProductCategoryCreateRequest $request)
    {
        $data = $request->input();

        if (empty($data['slug'])) {
            $data['slug'] = \Str::slug($data['title']);
        }

        // Добавляем menu_level категории
        $parentCategory = ShopProductCategory::select('menu_level')
            ->where('id', $request->parent_id)
            ->first();

        if ($parentCategory) {
            $data['menu_level'] = $parentCategory->menu_level + 1;
        } else {
            $data['menu_level'] = 1;
        }

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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = ShopProductCategory::where('id', $id)->first();

        $categoryList = ShopProductCategory::select(['id', 'title'])->get();

        return view('Shop.Admin.categories.edit', compact('category', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShopProductCategoryUpdateRequest $request, $id)
    {
        $category = ShopProductCategory::where('id', $id)->first();

        if (empty($category)) {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        // Изменяем menu_level категории
        $data = $request->all();

        $parentCategory = ShopProductCategory::select('menu_level')
            ->where('id', $request->parent_id)
            ->first();


        if ($parentCategory) {
            $data['menu_level'] = $parentCategory->menu_level + 1;
        } else {
            $data['menu_level'] = 1;
        }


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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
