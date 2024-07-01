<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }


    public function index(){
        if (Auth::check()) {
            $services = Service::orderBy('id', 'DESC')->get();
            return view('Administrator.slot-booking.index',compact('services'));
        } else {
            return redirect()->route('admin.login');
        }
    }


    public function create(){
        if (Auth::check()) {
            return view('Administrator.slot-booking.create');
        } else {
            return redirect()->route('admin.login');
        }
    }


    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,svg',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);
        // return $request->all();
        $data = Service::where('name', $request->name)->first();
        if (empty($data)) {
            DB::beginTransaction();
            $service = new Service();
            $appointment = new Appointment();
            $service->name = !empty($request->name) ? $request->name : "";
            $slugname = str_replace(' ', '-', $request->name);
            $service->slug = !empty($slugname) ? $slugname : "";
            $service->description = !empty($request->description) ? $request->description : "";
            $service->price	 = !empty($request->price	) ? $request->price	 : "";
            if ($request->hasFile('images')) {
                $image_tmp = $request->file('images');
                if ($image_tmp->isValid()) {
                    $time = time();
                    $image_name = $time . '_' . $image_tmp->getClientOriginalName();
                    $extension = $image_tmp->getClientOriginalExtension();
                    request()->images->move('images/service_images', $image_name);
                    $imageName = $image_name;
                    $service->images = $imageName;
                }
            }

            $service->save();
            $serviceId = $service->id;

            if(!empty($serviceId)){
                $appointment->service_id = $serviceId;
                $appointment->service_date = !empty($request->date) ? $request->date : "";
                $appointment->start_time = !empty($request->start_time) ? $request->start_time : "";
                $appointment->end_time = !empty($request->end_time) ? $request->end_time : "";
                $appointment->save();

                DB::commit();

                return redirect()->route('admin.services')->with('success', 'Service saved successfully');
            }else{
                return redirect()->back()->with('error', 'Something unexpected happened. Try again later.');
            }
            DB::rollBack();
        } else {
            return back()->with('error', 'Service already exists');
        }
        
    }
}
