<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Karmkand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KarmkandController extends Controller
{
   /**
    * The index function returns a view for the Administrator.karmkand.index page in PHP.
    * 
    * @return A view named 'Administrator.karmkand.index' is being returned.
    */
    public function index(){
        $karmkands = Karmkand::orderBy('id', 'asc')->get();
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


    public function storeKarmkand(Request $request)
    {
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
            $karmkand->name = !empty($request->name) ? $request->name : "";
            $slugname = str_replace(' ', '_', $request->name);
            $karmkand->slug = !empty($slugname) ? $slugname  : "";
            $karmkand->price = !empty($request->price) ? $request->price : "";
            $karmkand->category_id = !empty($request->category) ? $request->category : "";
            $karmkand->description = !empty($request->description) ? $request->description : "";
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


    public function editKarmkand($id)
    {
        if (!empty($id)) {
            $karmkand = Karmkand::find($id);
            if(!empty($karmkand)){
                $categories = Category::where('parent_id',2)->get();
                return view('Administrator.karmkand.edit', compact('karmkand','categories'));
            }else{
                return redirect()->back()->with('error', 'Invalid karmkand ID');
            }
            
        }
    }


    public function updateKarmkand(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,svg',
        ]);

        $data = Karmkand::where('id', $id)->first();
        
        if (!empty($data)) {
            $karmkand = Karmkand::findOrFail($id);

            $karmkand->name = !empty($request->name) ? $request->name : "";
            $slugname = str_replace(' ', '-', $request->name);
            $karmkand->slug = !empty($slugname) ? $slugname : "";
            $karmkand->description = !empty($request->description) ? $request->description : "";
            $karmkand->price = !empty($request->price) ? $request->price : "";
            if ($request->hasFile('images')) {
                $imagePath = public_path('images/karmkand_images/'.$data->images);
                if(File::exists($imagePath)){
                    unlink($imagePath);
                }

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
            $karmkand->update();
            return redirect()->route('admin.karmkands')->with('success', 'Karmkand updated successfully.');
        } else {
            return redirect()->redirect()->back()->with('error', 'Karmkand already added.');
        }
    }




}
