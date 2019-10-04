<?php


namespace App\Repositories;

use App\Models\Role as Model;

/**
 * Class ShopProductCategoryRepository
 *
 * @package App\Repositories
 */
class RoleRepository extends BaseRepository
{

    /**
     * Возвращает роль с указанным именем
     *
     * @param $roleName
     * @return mixed
     */
    public function getRoleByName($roleName)
    {
        return $this
            ->startConditions()
            ->where('name', $roleName)
            ->first();
    }

    /**
     * Возвращает коллекцию пользователей, имеющих указанную роль
     *
     * @param $roleName
     * @return mixed
     */
    public function getUsersByRole($roleName)
    {
        $role = $this->getRoleByName($roleName);

        return $role->users->sortByDesc('id');
    }


    /**
     * @return mixed|string
     */
    protected function getModelClass()
    {
        return Model::class;
    }
}
