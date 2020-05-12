<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        return Status::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Status
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'        => 'required|string|min:5',
        ]);

        $status = new Status();
        $status->fill($validate);
        $status->save();
//        $status->categories()->attach($validate['categories']);
        return $status;
    }

    /**
     * Display the specified resource.
     *
     * @param  Status  $status
     * @return Status
     */
    public function show(Status $status)
    {
        return $status;
    }
    public function update(Request $request ,Status $status)
    {

        $validate = $request->validate([
            'name'        => 'required|string|min:5',
        ]);

        $status->fill($validate);
        $status->save();

        return $status;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Status $status
     * @return Status
     * @throws \Exception
     * @throws \Exception
     */
    public function destroy(Status $status)
    {
        if($status->delete()){
            return $status;
        }
    }
}
