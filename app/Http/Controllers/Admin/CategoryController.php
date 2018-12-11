<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this -> middleware(
            'auth.admin',
            [
                'except' => [],
            ]
        );
    }

    public function index()
    {
        xyHasRole('article');
        $categories = Category::paginate(10);
        return view('admin.category.index',compact('categories'));
    }






    public function store(CategoryRequest $request)
    {
        xyHasRole('article');
        Category::create($request->all());
        return redirect()->route('admin.category.index')->with('success','操作成功');

    }




    public function edit(Category $category)
    {
        xyHasRole('article');
        return view('admin.category.edit',compact('category'));
    }


    public function update(CategoryRequest $request, Category $category)
    {
        xyHasRole('article');
        $category->update($request->all());
        return redirect()->route('admin.category.index')->with('success','操作成功');
    }

    public function destroy(Category $category)
    {
        xyHasRole('article');
        $category->delete();
        return redirect()->route('admin.category.index')->with('success','操作成功');
    }
}
