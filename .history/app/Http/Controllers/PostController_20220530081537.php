<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostModel;

class PostController extends Controller
{
        public function __construct()
        {
            $this->middleware('can:view,post')->only('show');
        }
        public function show(PostModel $post)
        {
            $this->authorize('view', $post);
            
            // Logic to show post
        }
}
