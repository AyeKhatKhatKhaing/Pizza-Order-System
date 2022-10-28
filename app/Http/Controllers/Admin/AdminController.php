<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
     //direct admin profile page
     public function profile()
     {
         $id = auth()->user()->id;
         $userData = User::where('id',$id)->first();
         return view('admin.profile.index')->with(['user'=>$userData]);
     }

     //update profile page
     public function updateProfile($id,Request $request)
     {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' =>'required',
            'phone' => 'required',
            'address' => 'required',
         ]);

         if ($validator->fails()) {
             return back()
                     ->withErrors($validator)
                     ->withInput();
         }
         $updateData = $this->requestUserData($request);
         User::where('id',$id)->update($updateData);
         return back()->with(['updateSuccess'=>'User Information Updated...!']);
     }

     //change password
     public function changePassword($id,Request $request)
     {

        $validator = Validator::make($request->all(), [
            'oldPassword' => 'required',
            'newPassword' =>'required',
            'confirmPassword' => 'required',
         ]);

         if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $data = User::where('id', $id)->first();

        $oldPassword = $request->oldPassword;
        $newPassword = $request->newPassword;
        $confirmPassword = $request->confirmPassword;
        $hashedPassword = $data['password'];

        if (Hash::check($oldPassword, $hashedPassword)) {  // db same password

            if($newPassword != $confirmPassword){   // new password != confirm password
                return back()->with(['notSameError' => 'New Password Do Not With Confirm Password...!']);
            }else{

                if(strlen($newPassword) <= 8 || strlen($confirmPassword) <= 8){   // < 8
                    return back()->with(['lengthError' => 'Password Must Be Greater Than 8...']);
                }else{  // change case

                    $hash = Hash::make($newPassword);

                    User::where('id',$id)->update([
                        'password' => $hash
                    ]);

                    return back()->with(['lengthSuccess' => 'Password Change...']);
                }
            }
        }else{
            return back()->with(['notMatchError' => 'Password Do Not Match! Try Again...']);
        }

     }

     public function changePasswordPage()
     {
         return view('admin.profile.changePassword');
     }

     private function requestUserData($request)
     {
         return [
             'name' =>$request->name,
             'email' =>$request->email,
             'phone' =>$request->phone,
             'address' =>$request->address,
         ];
     }
}
