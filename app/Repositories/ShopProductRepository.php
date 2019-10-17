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
     * Получить общее количество товаров
     *
     * @return mixed
     */
    public function getCount()
    {
        return $this->startConditions()->count();
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
     * Получить коллекцию товаров одной категории
     *
     * @param $catSlug
     * @return mixed
     */
    public function getProductsByCategory($catSlug)
    {
        $columns = [
            'id',
            'name',
            'slug',
            'category_id',
            'price'
        ];

        $products = $this->startConditions()
            ->select($columns)
            ->with('category:id,slug')
            ->whereHas('category', function ($query) use ($catSlug) {
                $query->where('slug', $catSlug);
            })
            ->inRandomOrder()
            ->get();

        return $products;
    }


    /**
     * Получить товар по полю slug
     *
     * @param $slug
     * @return mixed
     */
    public function getOneBySlug($slug)
    {
        $products = $this->startConditions()
            ->where('slug', $slug)
            ->with('category:id,slug')
            ->first();

        return $products;
    }


    /**
     * Получить коллекцию товаров по указанным категориям
     *
     * @param $categoriesId
     * @return Collection
     */
    public function getProductsByCategoriesIdArray($categoriesId)
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


    public function getSeeAlso($categoryId, $productId)
    {
        $columns = [
            'id',
            'name',
            'slug',
            'category_id',
            'price'
        ];

        $products = $this->startConditions()
            ->select($columns)
            ->with('category:id,slug')
            ->whereHas('category', function ($query) use ($categoryId) {
                $query->where('id', $categoryId); })
            ->where('id', '!=', $productId)
            ->take(4)
            ->inRandomOrder()
            ->get();

        return $products;
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
