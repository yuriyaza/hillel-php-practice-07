<?php

namespace App\Http\Controllers;

use App\Models\Interfaces\PostInterface;
use Illuminate\Http\Request;

class BlogPostController
{
    public function getPostWithComments($postId, PostInterface $blogPost)
    {
        dump(
            $blogPost->getPostWithComments($postId)
        );
    }

    public function updatePost(Request $request, PostInterface $blogPost)
    {
        $id = $request->get('id');
        $title = $request->get('title');
        $content = $request->get('content');

        dump(
            $blogPost->updatePost($id, $title, $content)
        );
    }

    public function viewPostWithComments(Request $request, PostInterface $blogPost)
    {
        $postId = $request->get('id');
        $dataset = $blogPost->getPostWithComments($postId);

        $postTitle = $dataset[0]['title'];
        $postContent = $dataset[0]['content'];

        $commentsCount = count($dataset[0]['comments'])>5 ? 5 : count($dataset[0]['comments']);
        $commentsList = [];
        for ($i = 0; $i < $commentsCount; $i += 1) {
            $commentsList[] = $dataset[0]['comments'][$i];
        }

        return view('blog', compact('postTitle', 'postContent', 'commentsList'));
    }
}
