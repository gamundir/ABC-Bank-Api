<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\PhoneNumber;
use Illuminate\Http\Request;

class PhoneNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $phoneNumbers = PhoneNumber::all();
        return response()->json($phoneNumbers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $phoneNumber = PhoneNumber::create($request->input());
        return response()->json($phoneNumber);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $phoneNumber = PhoneNumber::find($id);
        return response()->json($phoneNumber);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $phoneNumber = PhoneNumber::find($id);
        $phoneNumber->update($request->input());
        return response()->json($phoneNumber);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $phoneNumber = PhoneNumber::find($id);
        $phoneNumber->delete();
        return response()->json(['message' => 'Phone Number deleted successfully.']);
    }
}
