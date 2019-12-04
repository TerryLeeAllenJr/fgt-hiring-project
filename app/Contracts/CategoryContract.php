<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface CategoryContract
{

    public function createCategory(array $data) : Model;

    public function deleteCategory(int $id);

    public function getCategory(int $id, array $options = []) : Model;

    public function getCategories(array $options = []) : LengthAwarePaginator;

    public function updateCategory(int $id, array $data = []) : Model;

}
