<?php


namespace App\Repositories;

use App\Models\ShopProductCategory as Model;

/**
 * Class ShopProductCategoryRepository
 *
 * @package App\Repositories
 */
class ShopProductCategoryRepository extends BaseRepository
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
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }
}
