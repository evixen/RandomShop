<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Requests\ShopProductCreateRequest;
use App\Http\Requests\ShopProductUpdateRequest;
use App\Models\ShopProduct;
use App\Repositories\ShopProductCategoryRepository;
use App\Repositories\ShopProductRepository;
use Illuminate\Http\Response;

class ProductController extends AdminBaseController
{

    /*
     * @var ShopProductRepository
     */
    protected $products;

    /*
     * @var ShopProductCategoryRepository
     */
    protected $categories;


    public function __construct(ShopProductRepository $products, ShopProductCategoryRepository $categories)
    {
        parent::__construct();

        $this->products = $products;
        $this->categories = $categories;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $paginator = $this->products->getAllWithPaginate(20);

        return view('Shop.Admin.products.index', compact('paginator'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $product = new ShopProduct();

        $categoryList = $this->categories->getForComboBox();

        return view('Shop.Admin.products.create', compact('product', 'categoryList'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  ShopProductCreateRequest  $request
     * @return Response
     */
    public function store(ShopProductCreateRequest $request)
    {
        $data = $request->input();

        // Сохраняем объект с введенными данными
        $product = new ShopProduct($data);

        $result = $product->save();

        if ($result) {
            return redirect()
                ->route('shop.admin.products.edit', $product->id)
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
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->products->getEdit($id);

        if (empty($product)) {
            return redirect()
                ->route('shop.admin.products.index')
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        $categoryList = $this->categories->getForComboBox();

        return view('Shop.Admin.products.edit', compact('product', 'categoryList'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ShopProductUpdateRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ShopProductUpdateRequest $request, $id)
    {
        $product = $this->products->getEdit($id);

        $data = $request->input();

        // Сохраняем обновленные данные
        $result = $product
            ->fill($data)
            ->save();

        if ($result) {
            return redirect()
                ->route('shop.admin.products.edit', $product->id)
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
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $result = ShopProduct::destroy($id);

        if ($result) {
            return redirect()
                ->route('shop.admin.products.index')
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
        $deleted = $this->products->getTrashed();

        return view('Shop.Admin.products.deleted', compact('deleted'));
    }


    /**
     * Восстанавливает удаленную запись
     *
     * @param int $id
     * @return Response
     */
    public function restore($id)
    {
        $product = $this->products->getEdit($id);

        $product->deleted_at = null;

        if ($product->save()) {
            return redirect()
                ->route('shop.admin.products.edit', $product->id)
                ->with(['success' => "Запись id[$id] восстановлена"]);
        } else {
            return back()
                ->withErrors(['msg' => "Ошибка востановления"])
                ->withInput();
        }
    }
}
