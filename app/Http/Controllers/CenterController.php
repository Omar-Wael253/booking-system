<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Center;

class CenterController extends Controller
{
        public function create(){
            return view('centers.create');
        }

        public function store(Request $request){
            $center = new Center();
            $center->name = $request->input('name');
            $center->save();
            return redirect()->route('centers.show',['center' => $center]);
        }
        public function show(Center $center)
        {
            return view('centers.show',['center'=>$center]);
        }

        public function index(){
            $centers = Center::all();
            return view("centers.index",['centers'=>$centers]);
        }

        public function edit(Center $center){
            return view('centers.edit',['center'=>$center]);
        }

        public function update(Request $request, Center $center)
        {
            $center->name = $request->name;
            $center->save();
            return redirect()->route('centers.show',['center' => $center]);
        }

        public function destroy(Center $center){
            $center->delete();
            return redirect()->route('centers.index');
        }

}
