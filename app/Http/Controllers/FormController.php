<?php

    namespace App\Http\Controllers;

    use App\Bid;
    use App\Factory;
    use Illuminate\Http\Request;

    class FormController extends Controller
    {
        //

        public function store_form(Request $request)
        {

            $validatedData = $request->validate([
                    'name' => 'required',
                    'phone' => 'required|numeric',
                    'description' => 'required|min:10',
            ]);
           $factory=new Factory();
           $bid=$factory->create("Bid");
            $bid->name = $request->name;
            $bid->phone = $request->phone;
            $bid->description = $request->description;
            $bid->save();

        }

        public function config()
        {

            return view('form.config');
        }
    }
