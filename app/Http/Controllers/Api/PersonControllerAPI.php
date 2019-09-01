<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class PersonControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return response()->json(['persons' => Person::all_persons_info()]);
        } catch (\PDOException $PDOException) {
            return response()->json(['errors' => ['message' => $PDOException->getMessage()]], Response::HTTP_SERVICE_UNAVAILABLE);
        } catch (\Exception $exception) {
            return response()->json(['errors' => ['message' => $exception->getMessage()]], $exception->getCode());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
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
        } catch (\PDOException $PDOException) {
            return response()->json(['errors' => ['message' => $PDOException->getMessage()]], Response::HTTP_SERVICE_UNAVAILABLE);
        } catch (\Exception $exception) {
            return response()->json(['errors' => ['message' => $exception->getMessage()]], $exception->getCode());
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
            $person = Person::person_info($id);
            return response()->json(['person' => $person]);
        } catch (ModelNotFoundException $modelNotFoundException) {
            return response()->json(['errors' => ['message' => $modelNotFoundException->getMessage()]], Response::HTTP_NOT_FOUND);
        } catch (\PDOException $PDOException) {
            return response()->json(['errors' => ['message' => $PDOException->getMessage()]], Response::HTTP_SERVICE_UNAVAILABLE);
        } catch (\Exception $exception) {
            return response()->json(['errors' => ['message' => $exception->getMessage()]], $exception->getCode());
        }
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
        try {
            $rules = [
                'name' => 'required|max:50',
                'description' => 'required|max:150',
            ];

            $person = Person::person_info($id);
            $validation = Validator::make($request->all(), $rules);

            if ($validation->passes()) {
                try {
                    $person->name = $request->name;
                    $person->description = $request->description;
                    $person->update();

                    return response()->json(['message' => 'Person Updated!', 'person' => $person], Response::HTTP_OK);
                } catch (\Exception $exception) {
                    return response()->json(['message' => $exception->getMessage()], $exception->getCode());
                }
            } else {
                return response()->json(['errors' => $validation->errors()], Response::HTTP_BAD_REQUEST);
            }
        } catch (ModelNotFoundException $modelNotFoundException) {
            return response()->json(['errors' => ['message' => $modelNotFoundException->getMessage()]], Response::HTTP_NOT_FOUND);
        } catch (\PDOException $PDOException) {
            return response()->json(['errors' => ['message' => $PDOException->getMessage()]], Response::HTTP_SERVICE_UNAVAILABLE);
        } catch (\Exception $exception) {
            return response()->json(['errors' => ['message' => $exception->getMessage()]], $exception->getCode());
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
            $person = Person::person_info($id);
            $person->delete();

            return response()->json(['message' => 'Person Deleted'], Response::HTTP_OK);
        } catch (ModelNotFoundException $modelNotFoundException) {
            return response()->json(['errors' => ['message' => $modelNotFoundException->getMessage()]], Response::HTTP_NOT_FOUND);
        } catch (\PDOException $PDOException) {
            return response()->json(['errors' => ['message' => $PDOException->getMessage()]], Response::HTTP_SERVICE_UNAVAILABLE);
        } catch (\Exception $exception) {
            return response()->json(['errors' => ['message' => $exception->getMessage()]], $exception->getCode());
        }
    }
}
