<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UploadController extends Controller
{
    //
    public function upload(Request $request) {
        $validator = Validator::make($request->all(),[ 
            'FirstName' => 'required',
            'MiddleName' => 'required',
            'LastName' => 'required',
            'Leave' => 'required',
            'StartDate' => 'required',
            'EndDate' => 'required',
            'TotalNoOfDays' => 'required',
            'ClientCode' => 'required',
            'UploadEmail' => 'required|mimes:doc,docx,pdf,txt,csv,jpg,jpeg,png|max:2048',
            'AdditionalLeave' => 'required'
      ]); 

      if($validator->fails()) {          
            
        return response()->json(['error'=>$validator->errors()], 401);                        
     }  
       

     if($UploadEmail = $request->file('UploadEmail')) {
        $path = $UploadEmail->store('public/storage');
        $name = $UploadEmail->getClientOriginalName();

        //store your file into directory and db
        $save = new Image();
        $save->FirstName = $request->FirstName;
        $save->MiddleName = $request->MiddleName;
        $save->LastName = $request->LastName;
        $save->Leave = $request->Leave;
        $save->StartDate = $request->StartDate;
        $save->EndDate = $request->EndDate;
        $save->TotalNoOfDays = $request->TotalNoOfDays;
        $save->ClientCode = $request->ClientCode;
        $save->UploadEmail= $path;
        $save->AdditionalLeave = $request->AdditionalLeave;
        $save->save();

        return response()->json([
            "success" => true,
            "message" => "File successfully uploaded",
            "file" => $name
        ]);
     }

    }
}
