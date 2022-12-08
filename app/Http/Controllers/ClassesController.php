<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
        $classes = Classes::paginate(4);
        return view('class.index', compact('classes'));
    }

    public function add()
    {
        return view('class.add');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => "required|min:4|max:50|unique:classes,name,"
        ];

        $message = [
            'name.required' => "Name must be provided",
            'name.min' => "At Least 4 characters",
            'name.max' => "Maximum 50 characters",
            'name.unique' => "Class $request->name already exist, please choose another name !",
        ];

        $request->validate($rules, $message);

        $class = Classes::create($request->all());
        if ($class) {
            return redirect()->route('class.index')->with('success', "Insert Data Successfully");
        }
    }
}