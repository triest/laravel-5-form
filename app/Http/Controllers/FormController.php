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
            $factory = new Factory();
            $bid = $factory->create("Bid");
            $bid->name = $request->name;
            $bid->phone = $request->phone;
            $bid->description = $request->description;
            $bid->save();
        }

        public function edit(Request $request)
        {

            $validatedData = $request->validate([
                    'id' => 'required|numeric',
                    'name' => 'required',
                    'phone' => 'required|numeric',
                    'description' => 'required|min:10',
            ]);

            $bid = Bid::select(["id", "name", "phone", "description"])->where('id', $request->id)->first();
            $bid->name = $request->name;
            $bid->phone = $request->phone;
            $bid->description = $request->description;
            $bid->updateRecord();
        }

        public function config()
        {
            return view('form.config');
        }

        public function listBids()
        {
            return view('list');
        }

        public function getBids()
        {
            $bids = Bid::select()->orderBy('created_at','desc')->paginate(10);

            return response()->json($bids);
        }

        public function getBid($id)
        {
            $bids = Bid::select()->where('id', $id)->get();
            return response()->json($bids);
        }
    }
