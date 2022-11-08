<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Call;
use App\Models\Car;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use App\Mail\OrderMail;
use App\Mail\CallMail;
use Mail;

class AppController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $cars = Car::orderBy('price_with_driver', 'DESC')->paginate(16);
        return view('landing.index', [
            'categories' => $categories,
            'cars' => $cars
        ]);
    }

    public function oferta()
    {
        return view('landing.oferta_'.app()->getLocale());
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function thanks()
    {
        return view('landing.thanks');
    }

    /**
     * @param $car_url
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function car($car_url)
    {
        //dd(strripos(strtolower(request()->url()), '/ua'));
        if(strripos(strtolower(request()->url()), '/en') === false && strripos(strtolower(request()->url()), '/ua') === false && strripos(strtolower(request()->url()), '/ru') === false) {
            return redirect(env("APP_URL")."/".ucfirst(App::getLocale())."/".request()->path());
        }
        $car = Car::where('url', $car_url)->first();
        $cars = Car::orderBy('price_with_driver', 'ASC')->paginate(16);
        $categories = Category::orderBy('id', 'desc')->get();


        if (!$car) {
            return redirect()->route('landing.404');
        }



        return view('landing.car', ['car' => $car, 'cars' => $cars, 'categories' => $categories]);
    }

    /**
     * @param Request $request
     * @param $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function languageChange(Request $request, $locale)
    {
        if (!in_array($locale, ['en', 'ru', 'ua'])) {
            abort(400);
        }
        $request->session()->put('locale', $locale);
        App::setLocale($locale);
        //dd(session()->get('locale') == "en" ? "en" : "" || "ua" ? "ua" : "");
        
        if ($locale === "en") {
           $locale = session()->get('locale') == "en" ? "en" : ""; 
        }else{
            //dd($locale);
            $locale = session()->get('locale') == "ua" ? "ua" : ""; 
        }
       
       // $locale = session()->get('locale') ==  "ua" ? "ua" : "";
        //dd($locale);
        //return redirect("/".ucfirst($locale));

        return redirect(url("/".$locale));
    }



    /**
     * CALLS
     */

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function backCall(Request $request)
    {
        $req = Validator::make($request->all(), [
            'name' => 'required|string',
            'phone' => 'required|string',
        ]);
        if ($req->fails()) {
            return response()->json([
                "status" => false,
                "errors" => $req->errors()->toJson()
            ], 200);
        }

        Call::create($req->validated());

       // Mail::to('arenda.mercedes.ua@gmail.com')->send(new CallMail($request->all()));

        return response()->json([
            'status' => true,
            'redirect' =>route('landing.thanks.'.app()->getLocale())
        ]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function order(Request $request)
    {
        $req = Validator::make($request->all(), [
            'name' => 'required|string',
            'phone' => 'required|string',
            'car' => 'required',
            'date' => 'required'
        ]);
        if ($req->fails()) {
            return response()->json([
                "status" => false,
                "errors" => $req->errors()->toJson()
            ], 200);
        }
        Order::create(array_merge(['driver' => $request->driver == true ? 1 : 0], $req->validated()));

        //Mail::to('arenda.mercedes.ua@gmail.com')->send(new OrderMail($request->all()));
        
        return response()->json([
            'status' => true,
            'redirect' =>route('landing.thanks.'.app()->getLocale())
        ]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function payment(Request $request)
    {
        $req = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'order' => 'required',
            'amount' => 'required'
        ]);
        if ($req->fails()) {
            return response()->json([
                "status" => false,
                "errors" => $req->errors()->toJson()
            ], 200);
        }
        $transaction = Transaction::create([
            "name" => $request->name,
            "phone" => $request->phone,
            "order" => $request->order,
            "amount" => $request->amount,
            "comment" => $request->comment,
            "status" => "unpaid"
        ]);

        return response()->json([
            'status' => true,
            'id' => $transaction->id
        ]);
    }

    public function payment_success($id) {
        Transaction::where('id', $id)->update([
            "status" => "paid"
        ]);
        return response()->json([
            'status' => true
        ]);
    }

    public function success() {
        return view('landing.payment_success');
    }

    public function sitemap() {

        $sitemap = app('sitemap');

        /** add item to the sitemap (url, date, priority, freq) */
        $sitemap->add(url('/'), now(), '1.0', 'weekly');
        $cars = Car::query()
            ->get();

        foreach($cars as $car){
            $sitemap->add(
                env('APP_URL')."/Ru/".$car->url,
                $car->updated_at,
                '0.7',
                'monthly',
                [ /* If your post has image (e.g. cover) that you want to be indexed */
                    [
                        'url' => $car->url,
                        'title' => $car->brand
                    ]
                ]
            );
        }

        foreach($cars as $car){
            $sitemap->add(
                env('APP_URL')."/En/".$car->url,
                $car->updated_at,
                '0.7',
                'monthly',
                [ /* If your post has image (e.g. cover) that you want to be indexed */
                    [
                        'url' => $car->url,
                        'title' => $car->brand
                    ]
                ]
            );
        }



        return $sitemap->render('xml');
    }


    public function notFound(){
        return view('landing.404');
    }


    public function loadCars(Request $request){

        if(isset($request->category) && !empty($request->category)) {
            if($request->category == "all") {
                $cars = Car::orderBy('price_with_driver', 'DESC')->paginate(16);
            } else {
                $cars = Car::where('category_id', $request->category)->orderBy('price_with_driver', 'DESC')->get();
            }
        } else {
            $cars = Car::orderBy('price_with_driver', 'DESC')->get();
        }

        if($request->language == "en") {
            return view('landing.components.cars_card_en', ['cars' => $cars]);
        }
        if($request->language == "ua") {
            return view('landing.components.cars_card_ua', ['cars' => $cars]);
        }

        return view('landing.components.cars_card', ['cars' => $cars]);
    }

}