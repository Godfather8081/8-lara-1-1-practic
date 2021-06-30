<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{

    //

    public function index()
    {
        $allCars = Car::all();
        return response()->json($allCars);
    }

    public function store(Request $req)
    {
        $car = new Car();
        $car->model = $req->model;
        $car->color = $req->color;
        $car->max_speed = $req->max_speed;
        $car->manufacture_date = $req->manufacture_date;
        $res = $car->save();

        // Car::create([
        //     'model' => $req->model,
        //     'color' => $req->color,
        //     'max_speed' => $req->max_speed,
        //     'manufacture_date' => $req->manufacture_date,
        // ]);
        // dd($res);
    }

    public function show($id)
    {
        $car = Car::find($id);
        return response()->json($car);
    }


    public function update(Request $req, $id)
    {

        $car = Car::find($id);
        $car->model = $req->model;
        $car->color = $req->color;
        $car->max_speed = $req->max_speed;
        $car->manufacture_date = $req->manufacture_date;
        $res = $car->save();
    }

    public function destroy($id)
    {
        return Car::find($id)->delete();
    }


    public function carsWithNumberPlate()
    {
        $carsWithNumberplate = Car::with('NumberPlate')->get();
        return response()->json($carsWithNumberplate);
    }

    public function singleCarWitheNumberPlate($id)
    {
        // $carWithNumberPlate = Car::with('NumberPlate')->where('id', $id)->get();
        $carWithNumberPlate = Car::with('NumberPlate')->find($id);

        // NOTE : always use with first and then chain other things  

        // get car where car id is $id and numberplate id in 6
        // $carWithNumberPlate = Car::with([
        //     'NumberPlate' => function ($q) {
        //         $q->where('id', 6);
        //     }
        // ])->find($id);

        return response()->json($carWithNumberPlate);
    }
}
