<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $blogs = Blog::orderBy('id', 'DESC')->get();
            return view('Administrator.blogs.index', compact('blogs'));
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function blogAdd()
    {
        if (Auth::check()) {
            return view('Administrator.blogs.add');
        } else {
            return redirect()->route('admin.login');
        }
    }


    public function blogStore(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,svg',
        ]);

        $data = Blog::where('title', $request->title)->first();
        if (empty($data)) {
            $user = Auth::user();
            $userId = $user->id;
            $blog = new Blog();
            $blog->title = !empty($request->title) ? $request->title : "";
            $slugname = str_replace(' ', '_', $request->title);
            $blog->slug = !empty($slugname) ? $slugname : "";
            $blog->content = !empty($request->content) ? $request->content : "";
            $blog->created_by = $userId;
            if ($request->hasFile('images')) {
                $image_tmp = $request->file('images');
                if ($image_tmp->isValid()) {
                    $time = time();
                    $image_name = $time . '_' . $image_tmp->getClientOriginalName();
                    $extension = $image_tmp->getClientOriginalExtension();
                    request()->images->move('images/blog_images', $image_name);
                    $imageName = $image_name;
                    $blog->images = $imageName;
                }
            }
            if ($blog->save()) {
                return redirect()->route('admin.blogs')->with('success', 'Blog saved successfully');
            } else {
                return back()->with('error', 'Blog not saved successfully');
            }
        } else {
            return back()->with('error', 'Blog already exists');
        }
    }


    public function blogsStatusChange(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('blogs')->where('id', $request->id)->update(['status' => 'Active']);
        } else {
            DB::table('blogs')->where('id', $request->id)->update(['status' => 'Inactive']);
        }
        return response()->json(['msg' => 'Successfully status updated', 'status' => true]);
    }


    public function editBlog($id)
    {
        if (!empty($id)) {
            $blogs = Blog::find($id);
            return view('Administrator.blogs.edit', compact('blogs'));
        }
    }


    public function updateBlog(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,svg',
        ]);
        $data = Blog::where('id', $id)->first();
        
        if (!empty($data)) {
            $user = Auth::user();
            $userId = $user->id;
            $blog = Blog::findOrFail($id);
            $blog->title = !empty($request->title) ? $request->title : "";
            $slugname = str_replace(' ', '_', $request->title);
            $blog->slug = !empty($slugname) ? $slugname : "";
            $blog->content = !empty($request->content) ? $request->content : "";
            $blog->created_by = $userId;
            if ($request->hasFile('images')) {
                $imagePath = public_path('images/blog_images/'.$data->images);
                if(File::exists($imagePath)){
                    unlink($imagePath);
                }

                $image_tmp = $request->file('images');
                if ($image_tmp->isValid()) {
                    $time = time();
                    $image_name = $time . '_' . $image_tmp->getClientOriginalName();
                    $extension = $image_tmp->getClientOriginalExtension();
                    request()->images->move('images/blog_images', $image_name);
                    $imageName = $image_name;
                    $blog->images = $imageName;
                }   
            }
            $blog->update();
            return redirect()->route('admin.blogs')->with('success', 'Blog updated successfully.');
        } else {

            return redirect()->route('admin.blogs')->with('error', 'Blog already added.');
        }
    }


    public function deleteBlog(Request $request,$id){
        // return $id;
        $blog = Blog::find($id);
        if ($blog) {
            $status = $blog->delete();
            if ($status) {
                return redirect()->back()->with('success', 'Blog delete successfully.');
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
