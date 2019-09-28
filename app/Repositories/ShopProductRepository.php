<?php


namespace App\Repositories;

use App\Models\ShopProduct as Model;

/**
 * Class ShopProductCategoryRepository
 *
 * @package App\Repositories
 */
class ShopProductRepository extends BaseRepository
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
     * Получить пагинацию всех записей таблицы
     *
     * @param int|null $perPage
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate($perPage = 10)
    {
        $columns = [
            'id',
            'name',
            'slug',
            'category_id',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->with(['category:id,title'])
            ->paginate($perPage);

        return $result;
    }


    /**
     * Удалить запись с указанным идентификатором
     *
     * @param $id
     * @return mixed
     */
    public function deleteRecord($id)
    {
        return $this->getModelClass()::destroy($id);
    }


    /**
     * @return mixed|string
     */
    protected function getModelClass()
    {
        return Model::class;
    }
}
