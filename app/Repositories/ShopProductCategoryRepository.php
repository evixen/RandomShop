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
     * Получить массив категорий для формирования вложенного меню
     *
     * @return array
     */
    public function getMenu()
    {
        $menu = [];

        $columns = ['id', 'title', 'parent_id', 'menu_level'];

        $categories = $this
            ->startConditions()
            ->with('parent:id,title,parent_id')
            ->select($columns)
            ->get();

        foreach ($categories as $cat) {
            if ($cat->menu_level == 3) {

                $catLevelOneTitle = $categories[$cat->parent->parent_id - 1]['title'];

                $menu[$catLevelOneTitle][$cat->parent->title][] = $cat->title;
            }

            // Проверяем наличие "пустых" категорий первого и второго уровня
            if ($cat->menu_level == 1 AND array_key_exists($cat->title, $menu) == false) {
                $menu[$cat->title] = [];
            }

            if ($cat->menu_level == 2) {
                foreach ($menu as $menuLevelTwo) {
                    if (array_key_exists($cat->title, $menuLevelTwo))
                        continue;

                    $menu[$cat->parent->title][$cat->title] = [];
                }
            }
        }

        return $menu;
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
