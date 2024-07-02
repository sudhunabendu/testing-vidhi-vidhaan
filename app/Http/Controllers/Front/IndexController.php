<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gemstone;
use App\Models\Product;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index()
    {
        $products = Category::with('gemstones')->where('parent_id',1)->limit(8)->get();
        $karmkands = Category::where('parent_id',2)->limit(8)->get();
        // $services = Service::limit(6)->get();
        $providers = User::where('role_id',4)->get();
        return view("frontend.home.index", compact('products', 'providers','karmkands'));
    }


    public function productDetails($id)
    {
    }

    public function about()
    {   $products = Product::limit(8)->get();
        $services = Service::limit(6)->get();
        return view("frontend.about.index", compact('products', 'services'));
    }


    public function astrologer()
    {
        $providers = User::where('role_id',4)->get();
        // return $provider;
        return view("frontend.astrologer.index", compact('providers'));
    }


    public function astrologerDetails($slug)
    {
        
    }


    // public function astrologerDetailsOld($slug)
    // {
    //     $service = Service::with('appointments')->where('slug', $slug)->first();
    //     // return $service;
    //     $timeRanges = [];
    //     foreach ($service->appointments as $key => $value) {
    //         $begin = Carbon::parse($value->start_time);
    //         $end = Carbon::parse($value->end_time);
    //         while ($begin < $end) {
    //             $output = $begin->format('H:i') . " - ";
    //             $begin->modify('+120 minutes');
    //             $output .= $begin->format('H:i');
    //             $timeRanges[] = $output;
    //         }
    //     }
    //     // print_r($timeRanges);
    //     // die();
    //     if (!empty($service)) {
    //         return view("frontend.astrologer.details", compact('service', 'timeRanges'));
    //     }
    // }

    public function karamkand()
    {
        return view("frontend.karamkand.index");
    }


    public function karamkandDetails()
    {
        return view("frontend.karamkand.karamkand-details");
    }
    public function testimonial()
    {
        return view("frontend.testimonial.index");
    }

    public function contact()
    {
        return view("frontend.contact.index");
    }


    public function products()
    {
        $products = Product::latest()->paginate(9);
        return view("frontend.products.index", compact('products'));
    }


    public function blog()
    {
        return view("frontend.blogs.index");
    }


    public function cart()
    {
        return view("frontend.cart.index");
    }


    // public function checkout(){
    //     if(empty(Auth::check())){
    //         return redirect()->route('login')->with('error','Please login first.');
    //     }else{
    //         return view("frontend.checkout.index");
    //     }

    // }

    /**
     * The `checkout` function checks if a user is authenticated, and if so, it returns the user data
     * to the checkout view; otherwise, it redirects to the authentication page with an error message.
     * 
     * @return If the user is authenticated (logged in), the function will return the view
     * "frontend.checkout.index" with the user data passed to it. If the user is not authenticated, it
     * will redirect to the 'user.auth' route with an error message "Please login first."
     */
    public function checkout()
    {
        if (Auth::check()) {
            $user = Auth::user();
            // return $user;
            return view("frontend.checkout.index",compact('user'));
        }else{
            return redirect()->route('user.auth')->with('error', 'Please login first.');
        }
    }

    public function userAuth()
    {
        // return URL::previous();
        Session::put('url.intended', URL::previous());
        // echo url()->previous();
        // Session::put('url.intended', url()->previous());
        return view('frontend.auth.login')->with('success', 'Login Successfully');
    }

   /**
    * The ForgetPassword function returns a view for the password reset page in a PHP application.
    * 
    * @return A view named 'frontend.auth.password_reset' is being returned.
    */
    public function ForgetPassword()
    {
        return view('frontend.auth.password_reset');
    }


    /**
     * The function handles the submission of a forget password form, validates the email input,
     * generates a token for password reset, stores the token in the database, sends an email with a
     * password reset link, and returns a success message.
     * 
     * @param Request request The `submitForgetPasswordForm` function is used to handle the submission
     * of a forget password form. Let me explain the parameters used in this function:
     * 
     * @return The `submitForgetPasswordForm` function returns a redirect back to the previous page
     * with a success message if the email provided exists in the users table. If the email is not
     * found in the users table, it returns a redirect back with an error message indicating that the
     * email is not registered.
     */
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $user = DB::table('users')
            ->where('email', $request->email)
            ->first();
        if (empty($user)) {
            return redirect()->back()->with('error', 'Email id not registered.');
        }

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        $action_link = route('user.reset.password.getForm', ['token' => $token, 'email' => $request->email]);
        $body = "We are received a request to rest the pasword for <b> Your App Name </b> account associated with " . $request->email . ". You can reset your password by clicking the link below";

        Mail::send('frontend.email.forgetPassword', ['action_link' => $action_link, 'body' => $body], function ($message) use ($request) {
            $message->from(env('MAIL_USERNAME'));
            $message->to($request->email, 'Your name');
            $message->subject('Reset Password');
        });
        return back()->with('success', 'We have e-mailed your password reset link!');
    }



/**
 * The function `getresetPasswordForm` returns a view for the forget password form with the token and
 * email provided in the request.
 * 
 * @param Request request The `` parameter in the `getresetPasswordForm` function is an
 * instance of the `Illuminate\Http\Request` class. It is used to retrieve information from the HTTP
 * request, such as form input data, headers, and more. In this context, it is being used to access the
 * email
 * @param token The `` parameter in the `getresetPasswordForm` function is used to pass a token
 * value, which is typically generated when a user requests to reset their password. This token is
 * usually included in the password reset link sent to the user's email for security purposes. By
 * including the token in
 * 
 * @return A view named 'frontend.email.forgetPasswordForm' is being returned with the variables 
 * and  passed to it.
 */
    public function getresetPasswordForm(Request $request, $token = null)
    {
        return view('frontend.email.forgetPasswordForm', ['token' => $token, 'email' => $request->email]);
    }


   /**
    * The function `submitResetPasswordForm` validates and updates a user's password after a password
    * reset request.
    * 
    * @param Request request The `submitResetPasswordForm` function is used to handle the submission of
    * a password reset form. Let me explain the parameters used in this function:
    * 
    * @return The function `submitResetPasswordForm` is returning a response based on the outcome of
    * the password reset process. If the password reset is successful, it redirects the user to the
    * login page with a success message indicating that the password has been changed. Additionally, it
    * includes a session variable `verifiedEmail` with the value of the email address that was used for
    * the password reset.
    */
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect()->route('login')->with('success', 'Your password has been changed!')->with('verifiedEmail', $request->email);
    }

    public function play(){

        $file = Storage::disk('public')->path('audio/puja.mp3');
        // return $file;
        return response()->file($file);
    }


   /**
    * The function retrieves gemstone products belonging to a specific category and displays them on a
    * view if both products and category are not empty.
    * 
    * @param Request request The `` parameter in the `gemesCategory` function is an instance of
    * the `Illuminate\Http\Request` class in Laravel. It represents the current HTTP request and
    * contains information about the request such as input data, headers, and more.
    * @param slug The `` parameter in the `gemesCategory` function is used to identify the
    * category of gemstones based on its name. It is passed as a parameter in the URL to fetch the
    * corresponding category from the database.
    * 
    * @return a view named 'cat_by_gemstones' from the frontend folder, passing the variables 
    * and  to the view if both  and  are not empty.
    */

    public function gemesCategory(Request $request, $slug){
        $category = Category::with(['gemstones'])->where('name', $slug)->first();
        $products = Gemstone::where(['status' => 'Active', 'category_id' => $category->id])->get();
        if(!empty($products) && !empty($category)){
            return view('frontend.gemstones.cat_by_gemstones',compact('products','category'));
        }
        
    }
    // public function gemesCategory(Request $request, $slug){
    //     $category = Category::with(['gemstones'])->where('name', $slug)->first();
    //     $products = Gemstone::where(['status' => 'Active', 'category_id' => $category->id])->get();
    //     if(!empty($products) && !empty($category)){
    //         return view('frontend.gemstones.cat_by_gemstones',compact('products','category'));
    //     }
        
    // }


   /**
     * The function filters products based on price range and weight range while considering the
     * category ID.
     * 
     * @param Request request It looks like the code you provided is a function that filters products
     * based on certain criteria like price range and weight range. However, there are some
     * commented-out sections related to category and brand filtering.
     * 
     * @return The function `filterProductsOld` is returning a JSON response containing the products
     * that match the filtering criteria specified in the request parameters. The products are
     * retrieved based on the conditions set in the function, such as price range, weight range, and
     * potentially category ID.
     */
    public function filterProductsOld(Request $request)
    {
        $query = Gemstone::query();

        // if ($request->has('category')) {
        //     $query->where('category_id', $request->category);
        // }

        if ($request->has('price_min') && $request->has('price_max')) {
            $query->whereBetween('price', [$request->price_min, $request->price_max])
            ->where('category_id', $request->category_id);
        }

        if ($request->has('weight_min') && $request->has('weight_max')) {
            $query->whereBetween('weight', [$request->weight_min, $request->weight_max])
            ->where('category_id', $request->category_id);
        }


        // if ($request->has('brand')) {
        //     $query->where('brand', $request->brand);
        // }

        $products = $query->get();


        return response()->json($products);
    }


        /**
     * The function filters gemstone products based on price range, weight range, and optionally
     * category ID.
     * 
     * @param Request request It looks like you are trying to filter products based on certain criteria
     * like price range and weight range. However, there are a couple of issues in your code that I
     * noticed:
     * 
     * @return The function `filterProducts` is returning a JSON response containing an array with key
     * 'products' that holds the filtered products based on the request parameters such as price range,
     * weight range, and potentially category ID.
     */
    public function filterProducts(Request $request)
    {
        $query = Gemstone::query();

        // if ($request->has('category_id') && $request->category_id != '') {
        //     $query->where('category_id', $request->category_id);
        // }

        if ($request->has('price_min') && $request->has('price_max')) {
            $query->whereBetween('price', [$request->price_min, $request->price_max])
            ->where('category_id', $request->category_id);
        }

        if ($request->has('weight_min') && $request->has('weight_max')) {
            $query->whereBetween('weight', [$request->weight_min, $request->weight_max])
            ->where('category_id', $request->category_id);
        }


        // if ($request->has('brand')) {
        //     $query->where('brand', $request->brand);
        // }

        $products = $query->get();


        return response()->json(['products'=>$products]);
    }


   /**
    * The gemstones function retrieves categories with associated gemstones and a specific category
    * with a parent ID of 1, limiting the results to 8, and then returns a view with the retrieved
    * data.
    * 
    * @return The `gemstones()` function is returning a view called 'frontend.gemstones.index' with the
    * variables `` and `` passed to the view using the `compact()` function. The
    * `` variable contains all categories with their associated gemstones loaded using eager
    * loading. The `` variable contains up to 8 categories that have a parent_id of 1.
    */
    public function gemstones(){
        $categories = Category::with('gemstones')->get();
        $category = Category::where('parent_id',1)->limit(8)->get();
        return view('frontend.gemstones.index',compact('categories','category'));
    }


   /**
    * The function filterGemstones filters gemstone products based on category, price range, and weight
    * range specified in the request.
    * 
    * @param Request request It looks like you are trying to filter gemstones based on certain criteria
    * such as category, price range, and weight range.
    * 
    * @return The function `filterGemstones` is returning a JSON response with the filtered gemstone
    * products based on the criteria provided in the request parameters. The response includes an array
    * of products that match the specified category, price range, and weight range filters.
    */
    public function filterGemstones(Request $request)
    {
        $query = Gemstone::query();

        if ($request->has('category_id')) {
            $query->whereIn('category_id', $request->category_id);
        }
       
        if ($request->has('price_min') && $request->has('price_max')) {
            $query->whereBetween('price', [$request->price_min, $request->price_max]);
        }

        if ($request->has('weight_min') && $request->has('weight_max')) {
            $query->whereBetween('weight', [$request->weight_min, $request->weight_max]);
        }

        $products = $query->get();

        return response()->json(['products'=>$products]);
    }
}
