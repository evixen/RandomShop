<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Models\ShopOrder;
use App\Repositories\ShopOrderRepository;
use Illuminate\Http\Request;

class OrderController extends AdminBaseController
{

    protected $orders;

    public function __construct(ShopOrderRepository $orders)
    {
        parent::__construct();

        $this->orders = $orders;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Response
     */
    public function index()
    {
        $unchecked = $this->orders->getUnchecked(15);

        $checked = $this->orders->getChecked(15);

        return view('Shop.Admin.orders.index', compact('unchecked', 'checked'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Response
     */
    public function edit($id)
    {
        $order = $this->orders->getEdit($id);

        if (empty($order)) {
            return redirect()
                ->route('shop.admin.orders.index')
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        return view('Shop.Admin.orders.edit', compact('order'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Response
     */
    public function update(Request $request, $id)
    {
        $order = $this->orders->getEdit($id);

        $data = $request->input();

        if (empty($data['is_checked']))
            $data['is_checked'] = false;

        // Сохраняем обновленные данные
        $result = $order
            ->fill($data)
            ->save();

        if ($result) {
            return redirect()
                ->route('shop.admin.orders.edit', $order->id)
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
     * @return \Response
     */
    public function destroy($id)
    {
        $result = $this->orders->getEdit($id)->forceDelete();

        if ($result) {
            return redirect()
                ->route('shop.admin.orders.index')
                ->with(['success' => "Запись id[$id] удалена"]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка удаления']);
        }
    }


    /**
     * Перенос заказа в архив
     *
     * @param int $id
     * @return \Response
     */
    public function toArchive($id)
    {
        $result = ShopOrder::destroy($id);

        if ($result) {
            return redirect()
                ->route('shop.admin.orders.index')
                ->with(['success' => "Запись id[$id] перенесена в архив"]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка переноса']);
        }
    }


    /**
     * Показывает архивные записи
     *
     * @return \Response
     */
    public function archived()
    {
        $archived = $this->orders->getTrashed();

        return view('Shop.Admin.orders.archived', compact('archived'));
    }


    /**
     * Восстанавливает архивную запись
     *
     * @param int $id
     * @return \Response
     */
    public function restore($id)
    {
        $order = $this->orders->getEditWithTrashed($id);

        $order->deleted_at = null;

        if ($order->save()) {
            return redirect()
                ->route('shop.admin.orders.edit', $order->id)
                ->with(['success' => "Запись id[$id] восстановлена"]);
        } else {
            return back()
                ->withErrors(['msg' => "Ошибка востановления"])
                ->withInput();
        }
    }
}
