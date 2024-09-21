<?php

namespace App\Repositories\Post;

use LaravelEasyRepository\Repository;

interface PostRepository extends Repository{

    public function search(String $keyword): mixed;
}
