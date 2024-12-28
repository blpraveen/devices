<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeviceResource;
use App\Http\Resources\UserDeviceResource;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class DevicesController extends Controller
{
    public function device_info(Request $request,$id){
        $device = Device::find($id);
        return response()->json(['user' => new DeviceResource($device)]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:250',
            'model' => 'required|string|max:250',
            'device_id' => 'required|string|max:250|unique:devices',
        ]);
        if($validator->fails()){
            return response()->json($validator->messages(), 200);
        }
        $device = Device::create([
            'name' => $request->name,
            'model' => $request->model,
            'device_id' => $request->device_id,
        ]);

        return response()->json(['message' => 'Device created successfully']);
    }

    public function devices_user(Request $request,$user_id){
        $user = User::find($user_id);
        return response()->json(['user' => new UserDeviceResource($user)]);
    }
}