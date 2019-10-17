<?php


namespace App\Repositories;

use App\Models\ShopOrder as Model;

/**
 * Class ShopOrderCategoryRepository
 *
 * @package App\Repositories
 */
class ShopOrderRepository extends BaseRepository
{

    /**
     * Получить заказ для редактирования в админке
     *
     * @param int $id
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }


    /**
     * Получить количество заказов (включая архивные)
     *
     * @return mixed
     */
    public function getCount()
    {
        return $this->startConditions()->withTrashed()->count();
    }


    /**
     * Получить заказы (включая удаленные) для редактирования в админке
     *
     * @param int $id
     * @return Model
     */
    public function getEditWithTrashed($id)
    {
        return $this->startConditions()->withTrashed()->find($id);
    }


    /**
     * Получить непроверенные заказы для редактирования в админке
     *
     * @param int $perPage
     * @return Model
     */
    public function getUnchecked($perPage = 10)
    {
        $columns = ['id', 'email', 'order_id', 'price'];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->where('is_checked', false)
            ->paginate($perPage);

        return $result;
    }


    /**
     * Получить проверенные заказы для редактирования в админке
     *
     * @param int $perPage
     * @return Model
     */
    public function getChecked($perPage = 10)
    {
        $columns = ['id', 'email', 'order_id', 'price'];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->where('is_checked', true)
            ->paginate($perPage);

        return $result;
    }


    /**
     * Получить удалённые заказы
     *
     * @return mixed
     */
    public function getTrashed()
    {
        $columns = ['id', 'email', 'order_id', 'price'];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->where('deleted_at', '!=', null)
            ->withTrashed()
            ->paginate(10);

        return $result;
    }


    /**
     * Получить заказы по емейлу пользователя
     *
     * @param $email
     * @return mixed
     */
    public function getOrdersByUserEmail($email)
    {
        $result = $this
            ->startConditions()
            ->with('products:id,name')
            ->where('email', $email)
            ->orderBy('id', 'desc')
            ->get();

        return $result;
    }


    /**
     * Получить последний заказ по емейлу пользователя
     *
     * @param $email
     * @return mixed
     */
    public function getLastOrderByUserEmail($email)
    {
        $result = $this
            ->startConditions()
            ->with('products:id,name')
            ->where('email', $email)
            ->latest()
            ->first();

        return $result;
    }


    /**
     * @return mixed|string
     */
    protected function getModelClass()
    {
        return Model::class;
    }
}
