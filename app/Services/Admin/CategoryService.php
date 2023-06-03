<?php

namespace App\Services\Admin;

use App\Models\Category;

class CategoryService
{
    public function handleStore($request)
    {
        $data = $request->validated();
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
