<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends AdminBaseController
{
    /**
     * @var UserRepository
     */
    protected $users;

    /**
     * @var RoleRepository
     */
    protected $roles;


    public function __construct(UserRepository $users, RoleRepository $roles)
    {
        parent::__construct();

        $this->users = $users;
        $this->roles = $roles;
    }


    /**
     * Выводит сортированный по ролям список пользователей
     *
     * @return Response
     */
    public function index()
    {
        $usersByRole = [];

        $admins = $this->roles->getUsersByRole('Admin');

        $managers = $this->roles->getUsersByRole('Manager');

        $users = $this->roles->getUsersByRole('User');

        $usersByRole[] = ['Администраторы' => $admins];
        $usersByRole[] = ['Менеджеры' => $managers];
        $usersByRole[] = ['Пользователи' => $users];

        return view('Shop.Admin.users.index', compact('usersByRole'));
    }


    /**
     * Добавляет пользователю указанную роль
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function addRole(Request $request)
    {
        $user = $this->users->getEdit($request->id);

        $role = $this->roles->getRoleByName($request->role);

        $now = Carbon::now();

        $user->roles()->attach($role->id, ['created_at' => $now, 'updated_at' => $now]);

        return redirect()->route('shop.admin.users');
    }


    /**
     * Удаляет у пользователю указанную роль
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function deleteRole(Request $request)
    {
        $user = $this->users->getEdit($request->id);

        $role = $this->roles->getRoleByName($request->role);

        $user->roles()->detach($role->id);

        return redirect()->route('shop.admin.users');
    }
}
