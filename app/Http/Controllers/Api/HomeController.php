<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralApi;
use App\Models\Car;
use App\Models\CarSize;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Constraint\Count;

class HomeController extends Controller
{
    public function carSize()
    {
        try {

            $carSizes = CarSize::query()->select('id', 'title_' . app()->getLocale() . ' as title')->get();
            if (count($carSizes) < 1) {
                return GeneralApi::returnNoContent();
            }
            return GeneralApi::returnData(200, 'Successfully', $carSizes);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function services()
    {
        try {

            $services = CarSize::query()->with('services.includes', 'services.material')->get();
            if (count($services) < 1) {
                return GeneralApi::returnNoContent();
            }
            return GeneralApi::returnData(200, 'Successfully', $services);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function servicesByCarSizeId($car_size_id)
    {
        try {

            $services = Service::query()
                ->where('car_size_id', $car_size_id)
                ->select('id', 'title_' . app()->getLocale() . ' as title', 'price')
                ->get();
            if (count($services) < 1) {
                return GeneralApi::returnNoContent();
            }
            return GeneralApi::returnData(200, 'Successfully', $services);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function createCar(Request $request)
    {
        try {
            $request->validate([
                'car_size_id' => 'required',
                'brand_id'    => 'required',
                'model_id'    => 'required',
                'plate'       => 'required',
                'color'       => 'required',
            ]);

            $car = new Car();
            $car->user_id = auth('api')->user()->id;
            $car->car_size_id = $request->car_size_id;
            $car->brand_id = $request->brand_id;
            $car->model_id = $request->model_id;
            $car->plate = $request->plate;
            $car->color = $request->color;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $car->image = $file->storeAs('images/cars', $name, 'upload');
            }
            $car->save();

            return GeneralApi::returnData(201, 'Create Successfully', $car);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function updateCar(Request $request)
    {
        try {
            $request->validate([
                'car_id'      => 'required',
                'car_size_id' => 'required',
                'brand_id'    => 'required',
                'model_id'    => 'required',
                'plate'       => 'required',
                'color'       => 'required',
            ]);

            // $car = Car::query()->where('id', $request->car_id)->where('user_id', auth('api')->user()->id)->get();
            $car = Car::query()->where('id', $request->car_id)->where('user_id', auth('api')->user()->id)->first();
            $car->car_size_id = $request->car_size_id;
            $car->brand_id = $request->brand_id;
            $car->model_id = $request->model_id;
            $car->plate = $request->plate;
            $car->color = $request->color;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                Storage::disk('upload')->delete($car->image);
                $car->image = $file->storeAs('images/cars', $name, 'upload');
            }
            $car->save();

            return GeneralApi::returnData(201, 'Update Successfully', $car);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function deleteCar(Request $request)
    {
        try {
            $request->validate([
                'car_id'      => 'required',
            ]);

            $car = Car::query()->where('id', $request->car_id)->where('user_id', auth('api')->user()->id)->first();
            Storage::disk('upload')->delete($car->image);
            $car->delete;

            return GeneralApi::returnData(201, 'Delete Successfully', $car);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }
}
