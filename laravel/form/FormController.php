<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormData;
use Validator;
use Hash;

class FormController extends Controller
{
    public function index() {
        return view('form');
    }

    public function submit(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:form_data,email',
            'phone' => 'required|numeric',
            'address' => 'required|string',
            'gender' => 'required',
            'hobbies' => 'required',
            'dob' => 'required|date',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        FormData::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'hobbies' => implode(',', $request->hobbies),
            'dob' => $request->dob,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['success' => 'Form submitted successfully!']);
    }
}
