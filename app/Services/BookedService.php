<?php
namespace App\Services;
use App\Models\BookedSeat;
class BookedService
{
    protected $model;
    public function __construct()
    {
        $this->model = new BookedSeat();
    }

    public function store($data)
    {
        $this->model->create($data);
    }
}

