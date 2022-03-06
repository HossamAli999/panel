<?php
namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\Child;
use App\Models\Father;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class FatherController extends Controller
{

    public function index()
    {
        $father  = Father::latest()->paginate(7);
        return view("father.index",compact("father"));
    }


    public function create()
    {
        return view("father.create");
    }

    public function store(Request  $request)
    {
    //    $test=$request->file('image')->getClientMimeType();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:fathers'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'm_number' => ['required', 'string', 'max:20'],
            'trip_id' => ['required', 'int', 'max:20'],
            'status' => ['required', 'int', 'max:20'],
            'region' => ['string', 'max:20'],
            'lng' => ['string', 'max:20'],
            'lit' => ['string', 'max:20'],
            'image'=> ['image']
        ]);
        if ($request->image == Null){
            Father::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'mobileNumber' => $request->input('m_number'),
                'trip_id' => $request->input('trip_id'),
                'status' => $request->input('status'),
                'region' => $request->input('region'),
                'lng' => $request->input('lng'),
                'lit' => $request->input('lit'),
                'image_path' => 'parent.png'
            ]);
            return redirect()->route("father.index")
            ->with('success','Father added successfuly');
        }
     else 
        $newPhotoName=time() . '-' . $request->name  .'.' .  $request->image->extension();
        $request->image->move(public_path('upload\father'),$newPhotoName);
     
        Father::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'mobileNumber' => $request->input('m_number'),
            'trip_id' => $request->input('trip_id'),
            'status' => $request->input('status'),
            'region' => $request->input('region'),
            'lng' => $request->input('lng'),
            'lit' => $request->input('lit'),
            'image_path' => $newPhotoName
        ]);

        return redirect()->route("father.index")
        ->with('success','Father added successfuly');


    }


    public function show(Father $father)
    {
        return view("father.show",compact('father'));
    }


    public function edit(Father $father)
    {
        return view("father.edit",compact('father'));
    }


public function update(Request $request, Father $father)
    {
        $input=$request->all();
        $validator=Validator::make($input,[
            'name' => ['required', 'string', 'min:8'],
            'email' => ['required', 'string', 'email', 'max:255',Rule::unique('fathers')->ignore($father->id)],
            'password' => ['required', 'string', 'min:8'],
            'mobileNumber' => ['required', 'string', 'max:25' , 'min:5'],
            'trip_id' => ['int', 'max:20'],
            'status' => [ 'string', 'max:20'],
            'region' => ['string', 'max:20'],
            'lng' => [ 'string', 'max:20'],
            'lit' => [ 'string', 'max:20'],
        ]);
        if($validator->fails()){
            return redirect()->back()->with('error',$validator->errors());
        }

        $father->name=$input['name'];
        $father->email=$input['email'];
        $father->trip_id=$input['trip_id'];
        $father->password=Hash::make($input['password']);
        $father->mobileNumber=$input['mobileNumber'];
        $father->status=$input['status'];
        $father->region=$input['region'];
        $father->lng=$input['lng'];
        $father->lit=$input['lit'];
        $father->save();
        return redirect()->route("father.index")->with('success','father updated successfuly');
    }

    public function destroy(Father $father)
    {
        $father->delete();
        // $children=Child::where($father)->get();
        // if(count($children)>0){
        //   $children->delete();
        // }
        return redirect()->route("father.index")->with('success','father deleted successfuly');
    }
}