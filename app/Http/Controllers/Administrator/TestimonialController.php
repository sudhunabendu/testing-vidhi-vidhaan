<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $testimonials = Testimonial::orderBy('id', 'DESC')->get();
            return view('Administrator.testimonials.index', compact('testimonials'));
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function TestimonialAdd()
    {
        if (Auth::check()) {
            return view('Administrator.testimonials.add');
        } else {
            return redirect()->route('admin.login');
        }
    }


    public function testimonialStore(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'role' => 'required',
            'description' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,svg',
        ]);

        $data = Testimonial::where('name', $request->name)->first();
        if (empty($data)) {
            $user = Auth::user();
            $userId = $user->id;
            $testimonial = new Testimonial();
            $testimonial->name = !empty($request->name) ? $request->name : "";
            $testimonial->role = !empty($request->role) ? $request->role : "";
            $testimonial->description = !empty($request->description) ? $request->description : "";
            $testimonial->created_by = $userId;
            if ($request->hasFile('images')) {
                $image_tmp = $request->file('images');
                if ($image_tmp->isValid()) {
                    $time = time();
                    $image_name = $time . '_' . $image_tmp->getClientOriginalName();
                    $extension = $image_tmp->getClientOriginalExtension();
                    request()->images->move('images/testimonial_images', $image_name);
                    $imageName = $image_name;
                    $testimonial->images = $imageName;
                }
            }
            if ($testimonial->save()) {
                return redirect()->route('admin.testimonials')->with('success', 'Testimonial saved successfully');
            } else {
                return back()->with('error', 'Testimonial not saved successfully');
            }
        } else {
            return back()->with('error', 'Testimonial already exists');
        }
    }


    public function testimonialStatusChange(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('testimonials')->where('id', $request->id)->update(['status' => 'Active']);
        } else {
            DB::table('testimonials')->where('id', $request->id)->update(['status' => 'Inactive']);
        }
        return response()->json(['msg' => 'Successfully status updated', 'status' => true]);
    }


    public function editTestimonial($id)
    {
        if (!empty($id)) {
            $testimonials = Testimonial::find($id);
            return view('Administrator.testimonials.edit', compact('testimonials'));
        }
    }


    public function updateTestimonial(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'role' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,svg',
        ]);
        $data = Testimonial::where('id', $id)->first();
        
        if (!empty($data)) {
            $user = Auth::user();
            $userId = $user->id;
            $testimonial = Testimonial::findOrFail($id);
            $testimonial->name = !empty($request->name) ? $request->name : "";
            $testimonial->role = !empty($request->role) ? $request->role : "";
            $testimonial->description = !empty($request->description) ? $request->description : "";
            $testimonial->created_by = $userId;
            if ($request->hasFile('images')) {
                $imagePath = public_path('images/testimonial_images/'.$data->images);
                if(File::exists($imagePath)){
                    unlink($imagePath);
                }

                $image_tmp = $request->file('images');
                if ($image_tmp->isValid()) {
                    $time = time();
                    $image_name = $time . '_' . $image_tmp->getClientOriginalName();
                    $extension = $image_tmp->getClientOriginalExtension();
                    request()->images->move('images/testimonial_images', $image_name);
                    $imageName = $image_name;
                    $testimonial->images = $imageName;
                }   
            }
            $testimonial->update();
            return redirect()->route('admin.testimonials')->with('success', 'Testimonial updated successfully.');
        } else {

            return redirect()->route('admin.testimonials')->with('error', 'Testimonial already added.');
        }
    }


    public function deleteTestimonial(Request $request,$id){
        // return $id;
        $blog = Testimonial::find($id);
        if ($blog) {
            $status = $blog->delete();
            if ($status) {
                return redirect()->back()->with('success', 'Testimonial delete successfully.');
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
