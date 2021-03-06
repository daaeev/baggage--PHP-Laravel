<?php

namespace App\Services\interfaces;

use App\Models\Bag;
use ViewComponents\ViewComponents\Input\InputSource;

interface BagsRepositoryInterface
{
    /**
     * Метод возвращает список всех товаров,
     * используя библиотеку для построения таблицы (view-components/grid)
     * @param InputSource $input
     * @param int $pageSize количество элементов на странице
     * @return mixed
     */
    public function getAllUsingGrid(InputSource $input, int $pageSize = 15);

    /**
     * Метод возвращает экземпляр товара с id = $id,
     * если такой имеется - иначе null
     * @param int $id идентификатор товара в таблице
     * @return \App\Models\Bag|Null
     */
    public function getFirstOrNull(int $id): Bag|null;

    /**
     * Метод получает все последние товары из таблицы с использыванием пагинации
     *
     * @param int $pageSize количество элементов на страницу
     * @return mixed
     */
    public function getAllWithPag(int $pageSize = 15);

    /**
     * Метод получает все последние товары, названия которых похожи переданной строке
     * из таблицы с использыванием пагинации
     *
     * @param string $search строка, по которой производится поиск
     * @param int $pageSize количество элементов на страницу
     * @return mixed
     */
    public function getAllBySearchWithPag(string $search, int $pageSize = 15);

    /**
     * Метод возвращает экземпляр товара, который соответствует условию $where
     *
     * @param array $where условное выражение в виде массива для метода where()
     * @return Bag|Null
     */
    public function getFirstWhereOrNull(array $where);

    /**
     * Метод возвращает последние рекомендации для товара $bag
     *
     * @param Bag $bag экземпляр товара
     * @param int $count количество получаемых элементов
     * @return mixed
     */
    public function getBagsLimitCond(Bag $bag, int $count = 4);
}
