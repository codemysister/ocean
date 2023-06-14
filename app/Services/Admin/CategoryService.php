<?php

namespace App\Services\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
class CategoryService
{
    public function handleStore($request)
    {
        $data = $request->validated();
        $data['uuid'] = Str::uuid();
        Category::create($data);
        return true;
    }

    public function handleUpdate($request, $category)
    {
        $data = $request->validated();
        $category->update($data);
        return true;
    }
}
