<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }


    public function productsList()
    {
        if (Auth::check()) {
            $products = Product::orderBy('id', 'DESC')->get();
            return view('Administrator.products.index', compact('products'));
        } else {
            return redirect()->route('admin.login');
        }
    }


    public function productsAdd()
    {
        if (Auth::check()) {
            return view('Administrator.products.add');
        } else {
            return redirect()->route('admin.login');
        }
    }


    public function storeProduct(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,svg',
        ]);

        $data = Product::where('name', $request->name)->first();
        if (empty($data)) {
            $product = new Product();
            $product->name = $request->name ? $request->name : "";
            $product->price = $request->price ? $request->price : "";
            $product->description = $request->description ? $request->description : "";
            if ($request->hasFile('images')) {
                $image_tmp = $request->file('images');
                if ($image_tmp->isValid()) {
                    $time = time();
                    $image_name = $time . '_' . $image_tmp->getClientOriginalName();
                    $extension = $image_tmp->getClientOriginalExtension();
                    request()->images->move('images/product_images', $image_name);
                    $imageName = $image_name;
                    $product->images = $imageName;
                }
            }
            if ($product->save()) {
                return redirect()->route('admin.products')->with('success', 'Product saved successfully');
            } else {
                return back()->with('error', 'Product not saved successfully');
            }
        } else {
            return back()->with('error', 'Product already exists');
        }
    }


    public function productStatusChange(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('products')->where('id', $request->id)->update(['status' => 'Active']);
        } else {
            DB::table('products')->where('id', $request->id)->update(['status' => 'Inactive']);
        }
        return response()->json(['msg' => 'Successfully status updated', 'status' => true]);
    }

    public function editProduct($id)
    {
        if (!empty($id)) {
            $product = Product::find($id);
            return view('Administrator.products.edit', compact('product'));
        }
    }


    public function updateProduct(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,svg',
        ]);
        $data = Product::where('id', $id)->first();
        
        if (!empty($data)) {
            $product = Product::findOrFail($id);
            $product->name = $request->name ? $request->name : "";
            $product->description = $request->description ? $request->description : "";
            $product->price = $request->price ? $request->price : "";
            // return $data->images;
            if ($request->hasFile('images')) {
                $imagePath = public_path('images/product_images/'.$data->images);
                if(File::exists($imagePath)){
                    unlink($imagePath);
                }

                $image_tmp = $request->file('images');
                if ($image_tmp->isValid()) {
                    $time = time();
                    $image_name = $time . '_' . $image_tmp->getClientOriginalName();
                    $extension = $image_tmp->getClientOriginalExtension();
                    request()->images->move('images/product_images', $image_name);
                    $imageName = $image_name;
                    $product->images = $imageName;
                }   
            }
            $product->update();
            return redirect()->route('admin.products')->with('success', 'Product updated successfully.');
        } else {

            return redirect()->route('admin.products')->with('error', 'Product already added.');
        }
    }


    public function deleteProduct(Request $request,$id){
        // return $id;
        $product = Product::find($id);
        if ($product) {
            $status = $product->delete();
            if ($status) {
                return redirect()->back()->with('success', 'Product delete successfully.');
            } else {
                return back()->with('error', 'Somthing went wrong');
            }
        } else {
            return back()->with('error', 'Data Not Found');
        }


        // $product->delete();
        // return redirect()->back()->with('success', 'Product deleted successfully.');



    }
}
