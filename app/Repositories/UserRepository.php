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
     * Получить общее количество пользователей
     *
     * @return mixed
     */
    public function getCount()
    {
        return $this->startConditions()->count();
    }


    /**
     * @return mixed|string
     */
    protected function getModelClass()
    {
        return Model::class;
    }
}
