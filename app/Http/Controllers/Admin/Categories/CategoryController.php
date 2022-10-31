<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class CategoryController extends Controller {

    public function index() {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function create(Request $request) {
        if($request->isMethod('post')) {
            try {
                $req = Validator::make($request->all(), [
                    'name' => 'required|string',
                    'name_en' => 'required|string',
                    'position' => 'numeric'
                ]);
                if ($req->fails()) {
                    return response()->json([
                        "status" => false,
                        "errors" => $req->errors()->toJson()
                    ], 200);
                }

                Category::create(array_merge($req->validated(), ['url' => str_slug($request->name)]));
                return response()->json([
                    "status" => true,
                    "redirect" => route('admin.categories')
                ]);
            } catch (ValidationException $e) {
                return response()->json([
                    "status" => false,
                    "errors" => json_encode(['Auth error' => ['Упс.. Что-то пошло не так!']])
                ], 200);
            }
        }

        return view('admin.categories.create');
    }

    public function edit(Request $request, Category $category) {
        if($request->isMethod('post')) {
            try {
                $req = Validator::make($request->all(), [
                    'name' => 'required|string',
                    'name_en' => 'required|string',
                    'position' => 'numeric'
                ]);
                if ($req->fails()) {
                    return response()->json([
                        "status" => false,
                        "errors" => $req->errors()->toJson()
                    ], 200);
                }

                $category->update(array_merge($req->validated(), ['url' => str_slug($request->name)]));
                return response()->json([
                    "status" => true,
                    "redirect" => route('admin.categories.edit', ['category' => $category->id])
                ]);
            } catch (ValidationException $e) {
                return response()->json([
                    "status" => false,
                    "errors" => json_encode(['Auth error' => ['Упс.. Что-то пошло не так!']])
                ], 200);
            }
        }
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function destroy(Category $category) {
        $category->delete();
        return redirect()->route('admin.categories');
    }

}