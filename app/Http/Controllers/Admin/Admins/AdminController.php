<?php

namespace App\Http\Controllers\Admin\Admins;

use App\Http\Controllers\Controller;
use App\Models\Call;
use App\Models\Car;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function admins(Request $request)
    {
        if($request->isMethod('post')) {
            try {
                $req = Validator::make($request->all(), [
                    'email' => 'required|string',
                    'password' => 'required|string',
                ]);
                if ($req->fails()) {
                    return response()->json([
                        "status" => false,
                        "errors" => $req->errors()->toJson()
                    ], 200);
                }

                User::create([
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'role' => 'admin'
                ]);

                return response()->json([
                    "status" => true,
                    "redirect" => route('admin.admins.index')
                ]);
            } catch (ValidationException $e) {
                return response()->json([
                    "status" => false,
                    "errors" => json_encode(['Auth error' => ['Ops.. something wrong']])
                ], 200);
            }
        }

        $admins = User::orderBy('id', 'desc')->get();
        return view('admin.admins.index', ['admins' => $admins]);
    }


    public function delete($id) {
        User::where('id', $id)->delete();
        return redirect()->route('admin.admins.index')->with('message', 'Администратор был удален!');
    }

}

?>