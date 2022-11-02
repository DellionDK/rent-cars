<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request) {
        if($request->isMethod('post')) {
            try {
                $req = Validator::make($request->all(), [
                    'email' => 'required|email',
                    'password' => 'required|string',
                ]);
                if ($req->fails()) {
                    return response()->json([
                        "status" => false,
                        "errors" => $req->errors()->toJson()
                    ], 200);
                }

                if (!auth()->attempt($req->validated())) {
                    return response()->json([
                        "status" => false,
                        "errors" => json_encode(['error' => ['E-mail или пароль неверный!']])
                    ], 200);
                }

                $admin = User::where('email', $request->email)->first();
                session()->regenerate();
                Auth::login($admin);
                return response()->json([
                    "status" => true,
                    "redirect" => route('admin.index')
                ]);
            } catch (ValidationException $e) {
                return response()->json([
                    "status" => false,
                    "errors" => json_encode(['Auth error' => ['Упс.. Что-то пошло не так!']])
                ], 200);
            }
        }
        return view('admin.account.auth.login');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout() {
        auth()->logout();
        return redirect()->route('admin.auth.logout');
    }

}
