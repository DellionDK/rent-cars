<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Call;
use App\Models\Car;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

class TransactionsController extends Controller
{

    public function index(Request $request) {
        $query = Transaction::orderBy('created_at', 'desc');
        if(isset($request->search) && !empty($request->search)) {
            $query->where('phone', 'LIKE', '%'.$request->search.'%')->orWhere('name', 'LIKE', '%'.$request->search.'%')/*->orWhere('order', 'LIKE', '%'.$request->search.'%')*/;
        }

        $orders = $query->get();
        return view('admin.transactions.index', ['orders' => $orders]);
    }

}