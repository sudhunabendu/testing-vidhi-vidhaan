<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Karmkand;
use Illuminate\Http\Request;

class KarmkandController extends Controller
{
   /**
    * The index function returns a view for the Administrator.karmkand.index page in PHP.
    * 
    * @return A view named 'Administrator.karmkand.index' is being returned.
    */
    public function index(){
        $karmkands = Karmkand::all();
        return view('Administrator.karmkand.index',compact('karmkands'));
    }

    /**
     * The function `createKarmkand` returns a view for creating a new Karmkand in a PHP application.
     * 
     * @return A view for creating a "karmkand" in the Administrator section.
     */
    public function createKarmkand(){
        $categories = Category::where('parent_id',2)->get();
        return view('Administrator.karmkand.add',compact('categories'));
    }


    public function storeKarmkand(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,svg',
        ]);

        $data = Karmkand::where('name', $request->name)->first();

        if (empty($data)) {
            $karmkand = new Karmkand();
            $karmkand->name = $request->name ? $request->name : "";
            $karmkand->price = $request->price ? $request->price : "";
            $karmkand->category_id = $request->category ? $request->category : "";
            $karmkand->description = $request->description ? $request->description : "";
            if ($request->hasFile('images')) {
                $image_tmp = $request->file('images');
                if ($image_tmp->isValid()) {
                    $time = time();
                    $image_name = $time . '_' . $image_tmp->getClientOriginalName();
                    $extension = $image_tmp->getClientOriginalExtension();
                    request()->images->move('images/karmkand_images', $image_name);
                    $imageName = $image_name;
                    $karmkand->images = $imageName;
                }
            }
            if ($karmkand->save()) {
                return redirect()->route('admin.karmkands')->with('success', 'Karmkand saved successfully');
            } else {
                return back()->with('error', 'Karmkand not saved successfully');
            }
        } else {
            return back()->with('error', 'Karmkand already exists');
        }
    }

}
