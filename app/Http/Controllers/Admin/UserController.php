<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    // direct user list
    public function userList()
    {
        if(Session::has('USERLIST_SEARCH')){
            Session::forget('USERLIST_SEARCH');
        }

        $userData = User::where('role','=','user')->paginate(5);
        return view('admin.user.userList')->with(['user'=>$userData]);
    }

    // direct admin list
    public function adminList()
    {
        if(Session::has('ADMIN_SEARCH')){
            Session::forget('ADMIN_SEARCH');
        }

        $userData = User::where('role','=','admin')->paginate(5);
        return view('admin.user.adminList')->with(['admin'=>$userData]);
    }

    //user account search
    public function userSearch(Request $request)
    {

        $respond = $this->search('user',$request);
        Session::put('USERLIST_SEARCH',$respond);

        return view('admin.user.userList')->with(['user'=>$respond]);
    }

    // admin account search
    public function adminSearch(Request $request)
    {
        $respond =  $this->search('admin',$request);
        Session::put('ADMINLIST_SEARCH',$respond);

        return view('admin.user.adminList')->with(['admin'=>$respond]);
    }

    //user data delete
    public function userDelete($id)
    {
        User::where('id',$id)->delete();
        return back()->with(['deleteSuccess'=>' User Data Delete...!']);
    }

    //userList download
    public function userListDownload(){
        if(Session::has('USERLIST_SEARCH')){

           $userList =  User::where('role')
                            ->where(function ($query)  {
                                $query -> orWhere('name','like','%'.Session::get('USERLIST_SEARCH').'%')
                                ->orWhere('email','like','%'.Session::get('USERLIST_SEARCH').'%')
                                ->orWhere('phone','like','%'.Session::get('USERLIST_SEARCH').'%')
                                ->orWhere('address','like','%'.Session::get('USERLIST_SEARCH').'%');
                            })
                            ->get();
        dd($userList);

      }else{

           $userList = User::where('role','=','user')->get();
       }

        $csvExporter = new \Laracsv\Export();

        $csvExporter->build($userList, [
            'id' => 'No',
            'name' => 'Uer Name',
            'email' => 'Email' ,
            'phone' => 'User Phone',
            'address' => 'Address',
            'created_at' => 'Created Date',
            'updated_at' => 'Updated Date',
        ]);

        $csvReader = $csvExporter->getReader();

        $csvReader->setOutputBOM(\League\Csv\Reader::BOM_UTF8);

        $filename = 'userList.csv';

        return response((string) $csvReader)
            ->header('Content-Type', 'text/csv; charset=UTF-8')
            ->header('Content-Disposition', 'attachment; filename="'.$filename.'"');
    }

    //adminList Download
    public function adminListDownload(){
        if(Session::has('ADMIN_SEARCH')){

           $adminList =  User::orWhere('name','like','%'.Session::get('USERLIST_SEARCH').'%')
                            ->orWhere('email','like','%'.Session::get('USERLIST_SEARCH').'%')
                            ->orWhere('phone','like','%'.Session::get('USERLIST_SEARCH').'%')
                            ->orWhere('address','like','%'.Session::get('USERLIST_SEARCH').'%')
                            ->get();

        }else{

           $adminList = User::where('role','=','admin')->get();
        }

         $csvExporter = new \Laracsv\Export();

         $csvExporter->build($adminList, [
            'id' => 'No',
            'name' => 'Uer Name',
            'email' => 'Email',
            'phone' => 'User Phone',
            'address' => 'Address',
            'created_at' => 'Created Date',
            'updated_at' => 'Updated Date',
         ]);

         $csvReader = $csvExporter->getReader();

         $csvReader->setOutputBOM(\League\Csv\Reader::BOM_UTF8);

         $filename = 'adminList.csv';

         return response((string) $csvReader)
             ->header('Content-Type', 'text/csv; charset=UTF-8')
             ->header('Content-Disposition', 'attachment; filename="'.$filename.'"');

    }

    // data searching
    private function search($role,$request)
    {
        $searchData = User::where('role',$role)
                            ->where(function ($query)use ($request) {
                                $query ->orWhere('name','like','%'.$request->searchData.'%')
                                ->orWhere('email','like','%'.$request->searchData.'%')
                                ->orWhere('phone','like','%'.$request->searchData.'%')
                                ->orWhere('address','like','%'.$request->searchData.'%');
                           })
                           ->paginate(5);

        $searchData->appends($request->all());
        return $searchData;
    }
}
