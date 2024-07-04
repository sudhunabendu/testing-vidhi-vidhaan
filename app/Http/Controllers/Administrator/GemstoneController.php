<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gemstone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GemstoneController extends Controller
{
    public function index(){
        if (Auth::check()) {
            $categories = Gemstone::all();
            return view('administrator.gemstone.index',compact('categories'));
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function create(){
        if (Auth::check()) {
            $categories = Category::where('parent_id',1)->get();
            // return $categories;
            // $categories = Category::where('parent_id', '!=', 0)->get();
            return view('administrator.gemstone.add',compact('categories'));
        } else {
            return redirect()->route('admin.login');
        }
    }


    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'weight' => 'required',
            'category' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,svg',
        ]);

        $data = Gemstone::where('name', $request->name)->first();
        if (empty($data)) {
            $gemstone = new Gemstone();
            $gemstone->name = $request->name ? $request->name : "";
            $gemstone->weight = $request->weight ? $request->weight : "";
            $gemstone->price = $request->price ? $request->price : "";
            $gemstone->category_id = $request->category ? $request->category : "";
            $gemstone->description = $request->description ? $request->description : "";
            if ($request->hasFile('images')) {
                $image_tmp = $request->file('images');
                if ($image_tmp->isValid()) {
                    $time = time();
                    $image_name = $time . '_' . $image_tmp->getClientOriginalName();
                    $extension = $image_tmp->getClientOriginalExtension();
                    request()->images->move('images/product_images', $image_name);
                    $imageName = $image_name;
                    $gemstone->images = $imageName;
                }
            }
            if ($gemstone->save()) {
                return redirect()->route('admin.gemstones')->with('success', 'Gemstone saved successfully');
            } else {
                return back()->with('error', 'Gemstone not saved successfully');
            }
        } else {
            return back()->with('error', 'Gemstone already exists');
        }
    }
}
