<?php


namespace App\Repositories;

use App\Models\User as Model;

/**
 * Class ShopProductCategoryRepository
 *
 * @package App\Repositories
 */
class UserRepository extends BaseRepository
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
     * @return mixed|string
     */
    protected function getModelClass()
    {
        return Model::class;
    }
}
