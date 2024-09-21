<?php

namespace App\Repositories\Post;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Post;

class PostRepositoryImplement extends Eloquent implements PostRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    /**
     * search
     *
     * @param  mixed $keyword
     * @return void
     */
    public function search(string $keyword): mixed
    {
        return $this->model->where('title', 'like', "%{$keyword}%")
            ->orwhere('content', 'like', "%{$keyword}%")->get();
    }
}
