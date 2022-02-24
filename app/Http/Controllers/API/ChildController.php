<?php

namespace App\Http\Controllers;

use App\Models\Child;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController;
use App\Http\Resources\ChildResource;
use Illuminate\Support\Facades\Validator;
use App\Models\Father;
class ChildController extends BaseController
{

    public function index()
    {
        $id=Auth::guard('api-fathers')->id();

            $id=Auth::id();
            $children=Child::where("user_id",$id)->get();
            $input=$children->all();

            if(empty($input)){
              return $this->sendError('please validate errors',"you are not have any childrens");
            }
            else{

              return $this-> sendResponse(ChildResource::collection($input),'your childrens retrived successfully');

            }
    }
    public function store(Request $request)
    {
        $id=Auth::guard('api-fathers')->id();
        $input=$request->all();
        $validator= Validator::make($input, [
            'name' => ['required', 'string', 'max:30'],
        ]);
        if($validator->fails()){
            return $this->sendError('please validate errors',$validator->errors());
        }
        $input['father_id']=$id;
        $child=Child::create($input);
        return $this->sendResponse(new ChildResource($child),'child added successfully');

    }
    public function show($id)
    {
        $fid=Auth::guard('api-fathers')->id();
        $child=Child::find($id);
        if($child->father_id!=$fid){
            return $this->sendError('please validate errors',"you are not authorized to do this action");
        }
        elseif(empty($child)){//is_null()
            return $this->sendError('child not exists');
        }
         return $this->sendResponse(new childResource($child),'child retrived successfully');


    }


    public function update(Request $request,$id)
    {
        $child=Child::get()->find($id);
        if(Auth::guard('api-fathers')->id()!=$child->parent_id){
        return $this->sendError('please validate errors',"you are not authorized to do this action");
        }
        $input=$request->all();
        $validator=Validator::make($input,[
            'name'=>'required',

        ]);
        if($validator->fails()){
            return $this->sendError('please validate errors',$validator->errors());
        }
        $child->name=$input['name'];
        $child->save();
        return $this-> sendResponse(new ChildResource($child),'child information updated successfully');
    }

    public function updateChildStatus($id){
        $fid=Auth::guard('api-fathers')->id();
        $father=Father::find($fid);
        $child=Child::get()->find($id);
        if(Auth::guard('api-fathers')->id()!=$child->parent_id){
            return $this->sendError('please validate errors',"you are not authorized to do this action");
        }elseif($child->status==false){
            $child->status=true;
            $father->status=$father->staus+1;
            return $this-> sendResponse(new ChildResource($child),'child status updated to true successfully');
         }else{
            $child->status=false;
            $father->status=$father->staus-1;
            return $this-> sendResponse(new ChildResource($child),'child status updated to false successfully');
         }



    }
    public function destroy($id)
    {
        $fid=Auth::guard('api-fathers')->id();
        $child=Child::get()->find($id);
        if($fid!=$child->parent_id){
            return $this->sendError('please validate errors',"you are not authorized to do this action");
        }
        $child->delete();
        return $this-> sendResponse(new ChildResource($child),'child information deleted successfully');
    }


}
