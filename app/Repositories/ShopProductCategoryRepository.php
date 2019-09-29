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
     * Получить список категорий для вывода в выпадающем списке
     *
     * @return mixed
     */
    public function getForComboBox()
    {
        $columns = ['id', 'title'];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->toBase()
            ->get();

        return $result;
    }


    /**
     * Получить пагинацию всех записей таблицы
     *
     * @param int|null $perPage
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate($perPage = 10)
    {
        $columns = ['id', 'title', 'parent_id'];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->with(['parent:id,title'])
            ->paginate($perPage);

        return $result;
    }


    /**
     * Получить вложенные категории
     *
     * @param $id
     * @return mixed
     */
    public function getChildren($id)
    {
        $result = $this
            ->startConditions()
            ->where('parent_id', $id)
            ->get();

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
