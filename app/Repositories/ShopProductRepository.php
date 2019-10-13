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
        return $this->startConditions()->withTrashed()->find($id);
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
     * Получить коллекцию товаров по указанным категориям
     *
     * @param $categoriesId
     * @return Collection
     */
    public function getProductsByCategories($categoriesId)
    {
        $columns = [
            'id',
            'name',
            'slug',
            'category_id',
            'price'
        ];

        $result = collect();

        $products = $this->startConditions()
            ->select($columns)
            ->with('category:id,slug')
            ->get();

        foreach ($products as $product) {
            if ($categoriesId->contains($product->category_id)) {
                $result->push($product);
            }
        }

        return $result;
    }


    /**
     * Получить удалённые записи таблицы
     *
     * @return mixed
     */
    public function getTrashed()
    {
        $columns = ['id', 'name', 'category_id'];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->where('deleted_at', '!=', null)
            ->withTrashed()
            ->with(['category:id,title'])
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
