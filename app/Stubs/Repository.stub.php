<?php

namespace App;

use App\DummyModel;

class DummyRepository
{
    protected $model;
    /**
     * Instantiate reporitory
     *
     * @param DummyModel $model
     */
    public function __construct(DummyModel $model)
    {
        $this->model = $model;
    }

    // Your methods for repository
}
