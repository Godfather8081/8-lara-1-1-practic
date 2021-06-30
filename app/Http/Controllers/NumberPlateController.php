<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\NumberPlate;
use Illuminate\Http\Request;

class NumberPlateController extends Controller
{
    //

    public function index()
    {
        $numberPlates = NumberPlate::all();
        return response()->json($numberPlates);
    }

    public function store(Request $req, $carId)
    {
        $numberplate = new NumberPlate();
        $numberplate->number = $req->number;
        $numberplate->type = $req->type;

        $car = Car::find($carId);
        $car->numberPlate()->save($numberplate);

        // NumberPlate::create([
        //     'number' => $req->number,
        //     'type' => $req->type,
        //     'car_id' => $carId
        // ]);

        // $numberplate = new NumberPlate([
        //     'number' => $req->number,
        //     'type' => $req->type,
        // ]);

        // $car = Car::find($carId);
        // $car->numberPlate()->save($numberplate);
    }

    public function show($id)
    {
        $numberplate = NumberPlate::find($id);
        return response()->json($numberplate);
    }

    public function update(Request $req, $carId, $id)
    {

        $car = Car::find($carId);
        $numberplate = NumberPlate::find($id);
        $numberplate->number = $req->number;
        $numberplate->type = $req->type;
        $car->numberPlate()->save($numberplate);
    }

    public function destroy($id)
    {
        return NumberPlate::find($id)->delete();
    }

    public function numberPlatesWithCars()
    {

        $numberPlates = NumberPlate::with('Car')->get();
        return response()->json($numberPlates);
    }

    public function singleNumberplateWithCar($id)
    {

        $numberPlate = NumberPlate::with('Car')->find($id);
        return response()->json($numberPlate);
    }
}
