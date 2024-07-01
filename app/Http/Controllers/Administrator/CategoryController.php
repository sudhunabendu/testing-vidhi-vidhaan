<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $categories = Category::orderBy('id', 'ASC')->get();
            // return $categories;
            return view('administrator.category.index',compact('categories'));
        }else{
            return redirect()->route('admin.login');
        }
    }


    public function create(){
        if (Auth::check()) {
            $categories = Category::where('parent_id',0)->orderBy('id', 'ASC')->get();
            return view('administrator.category.add',compact('categories'));
        }else{
            return redirect()->route('admin.login');
        }
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,svg',
            'description' => 'required',
        ]);
        
        if (Auth::check()) {
            $categoryName = Category::where('name', '=', $request->name)->first();
            if (empty($categoryName)) {
                $user = Auth::user();
                $created_by = !empty($user->id) ? $user->id : 0;
                $category = new Category();
                $category->name = !empty($request->name) ? $request->name : "";

                // add new feildes to category
                $slugname = str_replace(' ', '-', $request->name);
                $category->slug = !empty($slugname) ? $slugname : "";
                // end of category slug name


                $category->description = !empty($request->description) ? $request->description : "";
                $category->created_by = !empty($created_by) ? $created_by : "";
                $category->	status = "Active";
                if ($request->hasFile('images')) {
                    $image_tmp = $request->file('images');
                    if ($image_tmp->isValid()) {
                        $time = time();
                        $image_name = $time . '_' . $image_tmp->getClientOriginalName();
                        $extension = $image_tmp->getClientOriginalExtension();
                        request()->images->move('images/category_images', $image_name);
                        $imageName = $image_name;
                        $category->images = $imageName;
                    }
                }
                $category->save();
                return redirect()->route('admin.categories')->with('success', 'Category created successfully');
            }else{
                return redirect()->route('admin.categories')->with('error', 'Category name already exists');
            }
            
        } else {
            return redirect()->route('admin.login')->with('error', 'Please login');
        }
    }


    public function storeSubCategory(Request $request){
        $this->validate($request, [
            'parent_category' => 'required',
            'sub_category_name' => 'required',
            'sub_images' => 'required|image|mimes:jpeg,png,jpg,svg',
            'sub_description' => 'required',
        ]);
        
        if (Auth::check()) {
            $categoryName = Category::where('name', '=', $request->name)->first();
            if (empty($categoryName)) {
                $user = Auth::user();
                $created_by = !empty($user->id) ? $user->id : 0;
                $category = new Category();
                $category->parent_id = !empty($request->parent_category) ? $request->parent_category : "";
                $category->name = !empty($request->sub_category_name) ? $request->sub_category_name : "";
                // add new feildes to category
                $slugname = str_replace(' ', '-', $request->sub_category_name);
                $category->slug = !empty($slugname) ? $slugname : "";
                // end of category slug name

                $category->description = !empty($request->sub_description) ? $request->sub_description : "";
                $category->created_by = !empty($created_by) ? $created_by : "";
                $category->	status = "Active";
                if ($request->hasFile('sub_images')) {
                    $image_tmp = $request->file('sub_images');
                    if ($image_tmp->isValid()) {
                        $time = time();
                        $image_name = $time . '_' . $image_tmp->getClientOriginalName();
                        $extension = $image_tmp->getClientOriginalExtension();
                        request()->sub_images->move('images/category_images', $image_name);
                        $imageName = $image_name;
                        $category->images = $imageName;
                    }
                }
                $category->save();
                return redirect()->route('admin.categories')->with('success', 'Category created successfully');
            }else{
                return redirect()->route('admin.categories')->with('error', 'Category name already exists');
            }
            
        } else {
            return redirect()->route('admin.login')->with('error', 'Please login');
        }
    }


    public function editCategory(Request $request, $id){
        if (!empty($id)) {
            $category = Category::all();
            // return $category;
            // $category = Category::where('parent_id', null)->orderby('category', 'asc')->get();
            $categories = Category::findOrFail($id);
            // return $categories;
            return view('Administrator.category.edit', compact('categories','category'));
        }
    }


    public function updateCategory(Request $request, $id)
    {
        // return $request->all();
        $this->validate($request, [
            'sub_category_name' => 'required',
            'parent_category' => 'required',
            'sub_description' => 'required',
            'sub_images' => 'required|image|mimes:jpeg,png,jpg,svg',
        ]);

        
        $data = Category::where('id', $id)->first();
        if (!empty($data)) {
            $category = Category::findOrFail($id);
            $category->name = $request->sub_category_name ? $request->sub_category_name : "";

            $slugname = str_replace(' ', '-', $request->sub_category_name);
            $category->slug = !empty($slugname) ? $slugname : "";

            $category->description = $request->sub_description ? $request->sub_description : "";
            if ($request->hasFile('sub_images')) {
                $imagePath = public_path('images/category_images/'.$data->images);
                if(File::exists($imagePath)){
                    unlink($imagePath);
                }

                $image_tmp = $request->file('sub_images');
                if ($image_tmp->isValid()) {
                    $time = time();
                    $image_name = $time . '_' . $image_tmp->getClientOriginalName();
                    $extension = $image_tmp->getClientOriginalExtension();
                    request()->sub_images->move('images/category_images', $image_name);
                    $imageName = $image_name;
                    $category->images = $imageName;
                }   
            }
            $category->update();
            return redirect()->route('admin.categories')->with('success', 'Category updated successfully.');
        } else {
            return redirect()->redirect()->back()->with('error', 'Category already added.');
        }
    }


    public function deleteCategory(Request $request , $id){
        // return $id;
        $category = Category::find($id);
        if ($category) {
            $status = $category->delete();
            if ($status) {
                return redirect()->back()->with('success', 'Category delete successfully.');
            } else {
                return back()->with('error', 'Somthing went wrong');
            }
        } else {
            return back()->with('error', 'Data Not Found');
        }

    }
}
