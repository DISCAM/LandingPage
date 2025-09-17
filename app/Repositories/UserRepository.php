<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;


class UserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }
    public function getAllUsers(): Collection
    {
        ///return $this->model->where('status', 'Active')->orderBy('name', 'asc')->get();
        ///// Query builder stosujemy zamiast odwoływania sie do modelu
        return DB::table('users')
            ->where('status', '=', 'Active')
            ->orderBy('name', 'asc')
            ->get();
    }
    public function getUserStatistics() :Collection
    {
        return DB::table('users')
            ->select(DB::raw('count(*) as user_count, status'))
            ->groupBy('status')->get();

    }
}
