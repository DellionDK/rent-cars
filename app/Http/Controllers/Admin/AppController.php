<?php

namespace App\Http\Controllers\Admin;

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

class AppController extends Controller
{

    public function orders() {
        $orders = Order::orderBy('id', 'desc')->get();
        return view('admin.orders', ['orders' => $orders]);
    }

    public function ordersDelete(Order $order) {
        $order->delete();
        return redirect()->route('admin.orders');
    }

    public function calls() {
        $calls = Call::orderBy('id', 'desc')->get();
        return view('admin.calls', ['calls' => $calls]);
    }

    public function callsDelete(Call $call) {
        $call->delete();
        return redirect()->route('admin.calls');
    }


    public function changePassword(Request $request) {
        if($request->isMethod('post')) {
            try {
                $req = Validator::make($request->all(), [
                    'current_password' => 'required|string',
                    'new_password' => 'required|string',
                ]);
                if ($req->fails()) {
                    return response()->json([
                        "status" => false,
                        "errors" => $req->errors()->toJson()
                    ], 200);
                }

                if(!auth()->attempt(['email' => auth()->user()->email, 'password' => $request->current_password])){
                    return response()->json([
                        "status" => false,
                        "errors" => json_encode(['Auth error' => ['Current password incorrect']])
                    ], 200);
                }


                User::where('id', auth()->user()->id)->update([
                    'password' => bcrypt($request->new_password)
                ]);

                auth()->logout();

                return response()->json([
                    "status" => true,
                    "redirect" => route('admin.auth.logout')
                ]);
            } catch (ValidationException $e) {
                return response()->json([
                    "status" => false,
                    "errors" => json_encode(['Auth error' => ['Ops.. something wrong']])
                ], 200);
            }
        }
    }

}