<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['persons' => Person::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:50',
            'description' => 'required|max:150',
        ];

        $validation = Validator::make($request->all(), $rules);

        if ($validation->passes()) {
            $person = Person::create($request->all());
            return response()->json(['message' => 'Person Added!', 'person' => $person], Response::HTTP_CREATED);
        } else {
            return response()->json(['errors' => $validation->errors()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $person = Person::findOrFail($id);
            return response()->json(['person' => $person]);
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], $exception->getCode());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:50',
            'description' => 'required|max:150',
        ];

        try {
            $person = Person::findOrFail($id);
            $validation = Validator::make($request->all(), $rules);

            if ($validation->passes()) {
                $person->name = $request->name;
                $person->description = $request->description;
                $person->update();

                return response()->json(['message' => 'Person Added!', 'person' => $person], Response::HTTP_OK);
            } else {
                return response()->json(['errors' => $validation->errors()], Response::HTTP_BAD_REQUEST);
            }
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], $exception->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $person = Person::findOrFail($id);
            $person->delete();

            return response()->json(['message' => 'Person Deleted'], Response::HTTP_OK);
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], $exception->getCode());
        }
    }
}
