<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index () {
        return view ('admin.category.category-add');
    }

    public function saveCategory (Request $request) {
        $this->validate($request, [
            'category_name' => 'required|regex:/^[\pL\s\&\-]+$/u|min:3|max:30',
            'category_description' => 'required',
            'publication_status' => 'required',
        ]);
        $category = new Category;
        $category->category_name         = $request->category_name;
        $category->category_description  = $request->category_description;
        $category->publication_status    = $request->publication_status;
        $category->save();

        return redirect ('/category/add')->with('message', 'Category Add Successfully');
    }

    public function manageCategory () {
        $categories = Category::all();
        return view ('admin.category.category-manage', ['categories'=>$categories]);
    }

    public function unpublishedCategory ($id) {
        $categories = Category::find($id);
        $categories->publication_status = 0;
        $categories->save();

        return redirect ('/category/manage')->with('message', 'Category Unpublished');;
    }
    public function publishedCategory ($id) {
        $categories = Category::find($id);
        $categories->publication_status = 1;
        $categories->save();

        return redirect ('/category/manage')->with('message', 'Category Published');
    }

    public function editCategory ($id) {
        $category = Category::find($id);
        return view ('admin.category.category-edit', ['category' => $category ]);
    }

    public function updateCategory (Request $request) {
        $category = Category::find($request->category_id);
        $category->category_name        = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status   = $request->publication_status;
        $category->save();

        return redirect ('/category/manage')->with('message', 'Category Updated Successfully');
    }

    public function deleteCategory ($id) {
        $category = Category::find($id);
        $category->delete();

        return redirect ('/category/manage')->with('message', 'Category Deleted Successfully');
    }
}
