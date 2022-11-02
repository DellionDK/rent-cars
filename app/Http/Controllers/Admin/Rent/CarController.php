<?php

namespace App\Http\Controllers\Admin\Rent;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CarController extends Controller
{

    public function index(Request $request)
    {
        $object = new Car();
        $search = $request->search;
        if (isset($search) && !empty($search)) {
            $object = $object->where('id', 'LIKE', $search)
                ->orWhere('brand', 'LIKE', $search);
        }
        $cars = $object->orderBy('position', 'desc')->get();
        return view('admin.rent.index', ['cars' => $cars]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            return $this->createOrUpdateCars((object)$request->all());
        }
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.rent.create', ['categories' => $categories]);
    }

    public function edit(Request $request, Car $car)
    {
        if ($request->isMethod('post')) {
            return $this->createOrUpdateCars((object)$request->all(), $car->id);
        }
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.rent.edit', ['car' => $car, 'categories' => $categories]);
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('admin.rent.cars')->with('message', 'Машина была успешно удалена');
    }

    public function isBinary($str) {
        return preg_match('~[^\x20-\x7E\t\r\n]~', $str) > 0;
    }

    /**
     * Handles
     * @param object $request
     * @param null $car
     * @return \Illuminate\Http\JsonResponse
     */
    public function createOrUpdateCars($request, $car = null)
    {
        $rules = [
            'brand' => 'required|string',
            'brand_en' => 'required|string',
            'brand_h1' => 'required|string',
            'brand_h1_en' => 'required|string',
            'year' => 'required',
            'passenger_seats' => 'string',
            'length' => 'required',
            'weight' => 'required',
            'width' => 'required',
            'maximum_speed' => 'required',
            'height' => 'required',
            'power' => 'required',
            'engine_volume' => 'required',
            'acceleration_time' => 'required|string',
            'peculiarities' => 'required',
            'peculiarities_en' => 'required',
            'preview' => 'required|file',
            'price_with_driver' => 'required',
            /*'car_feed' => 'required',*/
            'seo_description' => 'required',
            'seo_tags' => 'required',
            'seo_title' => 'required',
            'seo_description_en' => 'required',
            'seo_title_en' => 'required',
            'url' => 'required',
            'video_url' => 'max:5000',
        ];

        $carData = Car::where('id', $car)->first();
        if (!isset($request->preview) && $carData) {
            unset($rules['preview']);
        }

        if (!isset($request->preview_main) && $carData) {
            unset($rules['preview_main']);
        }

        $req = Validator::make((array)$request, $rules);
        if ($req->fails()) {
            return response()->json([
                "status" => false,
                "errors" => $req->errors()->toJson()
            ], 200);
        }

        try {
            $request = (object)$request;

            $request->gallery = array_values($request->gallery);

            if (count($request->gallery) > 0) {
                for ($index = 0; $index < count($request->gallery); $index++) {
                    if (isset($request->gallery[$index]['image'])) {
                        if(is_uploaded_file($request->gallery[$index]['image'])) {
                            $response = $this->uploadImage('gallery', $request->gallery[$index]['image']);
                            $request->gallery[$index]['image'] = $response;
                        }
                    } else {
                        unset($request->gallery[$index]);
                    }
                }
            }

            if (isset($request->preview)) {
                $preview = $this->uploadImage('previews', $request->preview);
            } else {
                $preview = $carData->preview;
            }

            if (isset($request->preview_main)) {
                $preview_main = $this->uploadImage('previews', $request->preview_main);
            } else {
                $preview_main = $carData->preview_main;
            }



            if(isset($request->rate_without_driver)){
                for ($index = 0; $index < count($request->rate_without_driver); $index++) {
                    if(!isset($request->rate_without_driver[$index]['price'])) {
                        unset($request->rate_without_driver[$index]);
                    }
                }
            }



            if ($carData) {
                /*if (json_decode($carData->gallery) != null) {
                    $request->gallery = array_merge($request->gallery, json_decode($carData->gallery, true));
                }*/

                $temp_gallery = [];
                foreach($request->gallery as $gallery) {
                    $gallery = (object) $gallery;
                    if(isset($gallery->position) && is_numeric($gallery->position)){
                        $temp_gallery[$gallery->position] = $gallery;
                    }
                }

                ksort($temp_gallery, SORT_DESC);
                $request->gallery = array_values($temp_gallery);


                $carData->update(array_merge($req->validated(), [
                    'price_with_driver_en' => $request->price_with_driver_en,
                    'transfer_en' => $request->transfer_en,
                    'description' => $request->description,
                    'description_en' => $request->description_en,
                    'preview' => $preview,
                    'preview_main' => $preview_main,
                    'pledge' => $request->pledge,
                    'transfer' => $request->transfer,
                    'trunk' => $request->trunk,
                    'position' => $request->position,
                    'category_id' => $request->category_id,
                    'gallery' => json_encode($request->gallery),
                    'rate_without_driver' => isset($request->rate_without_driver) ? json_encode($request->rate_without_driver) : null,
                    'car_with_driver' => isset($request->car_with_driver) && $request->car_with_driver == "true" ? 1 : 0,
                    'car_without_driver' => isset($request->car_without_driver) && $request->car_without_driver == "true" ? 1 : 0,
                    'enabled_video' => isset($request->enabled_video) && $request->enabled_video == "true" ? 1 : 0
                ]));

                return response()->json([
                    "status" => true,
                    "redirect" => route('admin.rent.cars.edit', ['car' => $carData->id])
                ]);
            }

            $car = Car::create(array_merge($req->validated(), [
                'price_with_driver_en' => $request->price_with_driver_en,
                'transfer_en' => $request->transfer_en,
                'description' => $request->description,
                'description_en' => $request->description_en,
                'preview' => $preview,
                'preview_main' => $preview_main,
                'pledge' => $request->pledge,
                'transfer' => $request->transfer,
                'trunk' => $request->trunk,
                'position' => $request->position,
                'category_id' => $request->category_id,
                'gallery' => json_encode($request->gallery),
                'rate_without_driver' => isset($request->rate_without_driver) ? json_encode($request->rate_without_driver) : null,
                'car_with_driver' => isset($request->car_with_driver) && $request->car_with_driver == "true" ? 1 : 0,
                'car_without_driver' => isset($request->car_without_driver) && $request->car_without_driver == "true" ? 1 : 0,
                'enabled_video' => isset($request->enabled_video) && $request->enabled_video == "true" ? 1 : 0
            ]));

            return response()->json([
                "status" => true,
                "redirect" => route('admin.rent.cars.edit', ['car' => $car->id])
            ]);

        } catch (ValidationException $e) {
            return response()->json([
                "status" => false,
                "errors" => json_encode(['error' => ['Упс.. Что-то пошло не так!']])
            ], 200);
        }
    }


    public function uploadImage($catalog, $image)
    {
        $length = mt_rand(10, 15);
        $randomString = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            ceil($length / strlen($x)))), 1, $length);
        $imageName = time() . $randomString . "." . $image->extension();
        $image->move(public_path('static/' . $catalog), $imageName);
        return 'static/' . $catalog . "/" . $imageName;
    }


    public function removeImage(Car $car, Request $request)
    {
        $image = $request->image;
        $gallery = array_values(json_decode($car->gallery, true));
        if(file_exists(public_path($image))) {
            unlink(public_path($image));
        }
        unset($gallery[array_search($image, $gallery)]);
        $car->gallery = json_encode($gallery);
        $car->save();
        return redirect()->route('admin.rent.cars.edit', ['car' => $car->id]);
    }



}