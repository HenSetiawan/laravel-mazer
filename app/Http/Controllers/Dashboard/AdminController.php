<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Exports\AdminExport;


class AdminController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $users = User::where('name', 'LIKE', "%{$request->search}%")->paginate(5);
        } else {
            $users = User::paginate(5);
        }
        return view('admin.index',['users'=>$users]);
    }

    public function delete($id) {
        $user = User::findOrFail($id);
        $deletedUser = $user->delete();

        if($deletedUser){
            session()->flash('message', 'berhasil menghapus data');
            return response()->json(['message'=> 'success'],200);
        }
    }

    public function createForm(){
        return view('admin.create');
    }

    public function updateForm($id){
        $user = User::findOrFail($id);
        return view('admin.update',['user'=>$user]);
    }

    public function create(Request $request){
        $this->validate($request, [
                'name'=>['required'],
                'username'=>['required'],
                'email'=>['required'],
                'password'=>['required']
        ]);

        $userCreated = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
        ]);

        if($userCreated){
            return redirect('/admin')->with('message','data berhasil ditambahkan');
        }
    }

    public function update(Request $request){

        $this->validate($request, [
                'name'=>['required'],
                'username'=>['required'],
                'email'=>['required'],
        ]);

        $userId = $request->id;
        $user = User::findOrFail($userId);

        if($request->has('password')) {
            $password = Hash::make($request->password);
        } else {
             $password = $user->password;
        }

        $updated = $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$password,
            'username'=>$request->username
        ]);

        if($updated){
            return redirect('/admin')->with('message','data berhasil diubah');
        }


    }

    public function excel(){
        return Excel::download(new AdminExport, 'admin.xlsx');
    }

}
