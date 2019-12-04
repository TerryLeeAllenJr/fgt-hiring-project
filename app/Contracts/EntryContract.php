<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface EntryContract
{

    public function createEntry(array $data) : Model;

    public function deleteEntry(int $id);

    public function getEntry(int $id, array $options = []) : Model;

    public function getEntries(array $options = []) : LengthAwarePaginator;

    public function updateEntry(int $id, array $data = []) : Model;

}
