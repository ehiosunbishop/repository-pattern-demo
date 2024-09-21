<?php

namespace App\Services\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use LaravelEasyRepository\BaseService;

interface PostService extends BaseService{

    /**
     * getAllPosts
     *
     * @return PostService
     */
    public function getAllPosts(): PostService;

    /**
     * createPost
     *
     * @param  mixed $request
     * @return PostService
     */
    public function createPost(Request $request): PostService;

    /**
     * updatePost
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return PostService
     */
    public function updatePost(Request $request, Post $post): PostService;

    /**
     * search
     *
     * @param  mixed $request
     * @return PostService
     */
    public function search(Request $request): PostService;
}
