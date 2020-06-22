<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TourRequest;
use App\tour;
use Input,File;
use Validator;
class TourController extends Controller
{
    //
    public function getFormAdd(){
        return view('formAdd');
    }
    public function getList(){
        $tours=tour::All();
        return view('mainpage')->with(['tours'=>$tours]);
    }

    public function postAdd(TourRequest $request){
        $tour = new tour();
        if ($request->hasFile('image')){
            $file=$request->file('image');
            $fileName=$file->getClientOriginalName('image');
            $file->move('img',$fileName);
        }
		$file_name=null;
        if($request->file('image')!=null){
            $file_name = $request->file('image')->getClientOriginalName();
        }
        $tour->name = $request->name;
        $tour->image=$file_name;
        $tour->schedule = $request->schedule;
        $tour->type_tour = $request->type_tour;
        $tour->number_people = $request->number_people;
        $tour->depart = $request->depart;
        $tour->price = $request->price;
		$tour->save();
		return $this->getList();
    }
}
