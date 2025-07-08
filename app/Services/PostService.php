<?php

namespace App\Services;

use App\Models\Post;
use App\Rules\ValidPostRule;
use Illuminate\Support\Facades\Validator;

class PostService
{
    public function all()
    {
        return Post::all();
    }

    public function create(array $data)
    {
        Validator::make($data, (new ValidPostRule())->rules())->validate();
        return Post::create($data);
    }
}
