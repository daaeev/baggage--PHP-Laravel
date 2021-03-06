<?php

namespace App\Services\interfaces;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use ViewComponents\ViewComponents\Input\InputSource;

interface UserRepositoryInterface
{
    /**
     * Метод возвращает экземпляр аутентифицированного пользователя
     * @return mixed
     */
    public function getAuthenticated();

    /**
     * Метод возвращает экземпляр пользователя с id = $id,
     * если такой имеется - иначе null
     * @return \App\Models\User|Null
     */
    public function getFirstOrNull(int $id): User|null;

    /**
     * Метод возвращает список всех пользователей,
     * используя библиотеку для построения таблицы (view-components/grid)
     * @param InputSource $input
     * @param int $pageSize количество элементов на странице
     * @return mixed
     */
    public function getAllUsingGrid(InputSource $input, int $pageSize = 15);
}
