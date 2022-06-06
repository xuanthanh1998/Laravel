<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostModel;

class PostController extends Controller
{
    public function show(Post $post)
    {
        $this->authorize('view', $post);
        
        // Logic to show post
    }
}
