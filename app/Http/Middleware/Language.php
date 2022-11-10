<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Closure;
use Illuminate\Http\Request;
use App\Http\Middleware\Route;
use App\Http\Controllers;

class Language
{


    public static $mainLanguage = 'ua'; //основной язык, который не должен отображаться в URl

    public static $languages = ['en', 'ru', 'ua']; // Указываем, какие языки будем использовать в приложении.


    /*
     * Проверяет наличие корректной метки языка в текущем URL
     * Возвращает метку или значеие null, если нет метки
     */
    public static function getLocale()
    {

        $pos_en = strripos(strtolower(request()->url()), '/en');
        $pos_ru = strripos(strtolower(request()->url()), '/ru');

        if (($pos_en === false)
            and ($pos_ru === false)
        ) {
            App::setLocale("ua");
            session()->put('locale', "ua");
        } else {
            if ($pos_en !== false) {
                App::setLocale("en");
                session()->put('locale', "en");
            } else {
                App::setLocale("ru");
                session()->put('locale', "ru");
            }
        }


        if (strripos(strtolower(request()->url()), '/public') !== false) {
            redirect(str_replace('/public', '', request()->url()));
        }

        return App::getLocale();
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $pos_en = strripos(strtolower(request()->url()), '/en');
        $pos_ru = strripos(strtolower(request()->url()), '/ru');

        if (($pos_en === false)
            and ($pos_ru === false)
        ) {
            App::setLocale("ua");
            session()->put('locale', "ua");
        } else {
            if ($pos_en !== false) {
                App::setLocale("en");
                session()->put('locale', "en");
            } else {
                App::setLocale("ru");
                session()->put('locale', "ru");
            }
        }

        if (strpos(strtolower(request()->url()), '/public') != false) {
            return redirect(str_replace('/public', '', request()->url()));
        }
       // dd($next($request));
        return $next($request);
    }
}
