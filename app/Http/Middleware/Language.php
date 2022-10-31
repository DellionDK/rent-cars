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


    public static $mainLanguage = 'ru'; //основной язык, который не должен отображаться в URl

    public static $languages = ['en', 'ru']; // Указываем, какие языки будем использовать в приложении.


    /*
     * Проверяет наличие корректной метки языка в текущем URL
     * Возвращает метку или значеие null, если нет метки
     */
    public static function getLocale()
    {

        $pos = strripos(strtolower(request()->url()), '/en');

        if($pos === false) {
            App::setLocale("ru");
            session()->put('locale', "ru");
        } else {
            App::setLocale("en");
            session()->put('locale', "en");
        }




        if(strripos(strtolower(request()->url()), '/public') !== false) {
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
        $pos = strripos(strtolower(request()->url()), '/en');

        if($pos === false) {
            App::setLocale("ru");
            session()->put('locale', "ru");
        } else {
            App::setLocale("en");
            session()->put('locale', "en");
        }



        if(strpos(strtolower(request()->url()), '/public') != false) {
            return redirect(str_replace('/public', '', request()->url()));
        }

        return $next($request);
    }

}