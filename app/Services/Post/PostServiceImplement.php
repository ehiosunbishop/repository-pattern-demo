<?php

namespace App\Services\Post;

use App\Models\Post;
use LaravelEasyRepository\ServiceApi;
use App\Repositories\Post\PostRepository;
use Exception;
use Illuminate\Http\Request;

class PostServiceImplement extends ServiceApi implements PostService
{

    /**
     * set title message api for CRUD
     * @param string $title
     */
    protected $title = "post";
    /**
     * uncomment this to override the default message
     * protected $create_message = "";
     * protected $update_message = "";
     * protected $delete_message = "";
     */

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;

    public function __construct(PostRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    /**
     * getAllPosts
     *
     * @return PostService
     */
    public function getAllPosts(): PostService
    {
        $posts = $this->mainRepository->all();

        return $this->setCode(200)
            ->setMessage("Posts Fetched Successfully")
            ->setData($posts);
    }

    /**
     * createPost
     *
     * @param  mixed $request
     * @return PostService
     */
    public function createPost(Request $request): PostService
    {
        try {
            $post = $this->mainRepository->create([
                "title" => $request->title,
                "content" => $request->content
            ]);

            return $this->setCode(200)->setMessage("Post Created Successfully")->setData($post);
        } catch (Exception $e) {
            return $this->setCode(400)->setMessage("Failed To Create Post")->setError($e->getMessage());
        }
    }

    /**
     * updatePost
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return PostService
     */
    public function updatePost(Request $request, Post $post): PostService
    {
        try {
            $updatedPost = [
                "title"=> $request->title,
                "content"=> $request->content
            ];

            if(!$post->update($updatedPost)){
                return $this->setCode(400)->setMessage("Failed to update post.");
            }

            return $this->setCode(201)->setMessage("Post updated Successfully")
                ->setData($post);
        } catch (Exception $e) {
            return $this->setCode(400)->setMessage("Failed To update Post")
                ->setError($e->getMessage());
        }
    }

    /**
     * search
     *
     * @param  mixed $request
     * @return PostService
     */
    public function search(Request $request): PostService
    {
        try {
            $posts = $this->mainRepository->search($request->keyword);

            return $this->setCode(200)
                ->setMessage("Posts Fetched Successfully")
                ->setData($posts);
        } catch (Exception $e) {
            return $this->setCode(400)->setMessage("Failed To update Post")
                ->setError($e->getMessage());
        }
    }
}
