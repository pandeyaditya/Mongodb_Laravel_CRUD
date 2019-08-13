<?php

namespace App\Http\Controllers;

use App\Car;

use Illuminate\Http\Request;

class CarController extends Controller
{
    // Add a Car
    public function create(){
        return view('carcreate');
    }

    // Save Car
    public function store(Request $request){
        $car = new Car();
        $car->carcompany = $request->get('carcompany');
        $car->model = $request->get('model');
        $car->price = $request->get('price');
        $car->save();
        return redirect('car')->with('success','Car has been successfully saved');
    }

    // List Cars
    public function index(){
        $cars = Car::all();
        return view('carindex',compact('cars'));
    }

    // Edit Car
    public function edit($id){
        $car = Car::find($id);
        return view('caredit', compact('car','id'));
    }

    // Update Car
    public function update(Request $request, $id){
        $car = Car::find($id);
        $car->carcompany = $request->get('carcompany');
        $car->model = $request->get('model');
        $car->price = $request->get('price');
        $car->save();
        return redirect('car')->with('success','Car has been successfully updated');
    }

    // Delete a car
    public function destroy($id){
        $car = Car::find($id);
        $car->delete();
        return redirect('car')->with('success', 'Car has been deleted');
    }

}
