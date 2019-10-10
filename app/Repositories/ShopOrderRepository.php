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
     * Получить модель для редактирования в админке
     *
     * @param int $id
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }


    /**
     * Получить модель с удаленными записями для редактирования в админке
     *
     * @param int $id
     * @return Model
     */
    public function getEditWithTrashed($id)
    {
        return $this->startConditions()->withTrashed()->find($id);
    }


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
     * @return mixed|string
     */
    protected function getModelClass()
    {
        return Model::class;
    }
}
