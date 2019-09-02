<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Checklist;
use App\Http\Requests\Api\ChecklistCreateRequest;
class ChecklistController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checklist = Checklist::all();


        return $this->sendResponse($checklist->toArray(), '$checklist retrieved successfully.');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChecklistCreateRequest $request)
    {
        $input = $request->all();


        $checklist = Checklist::create($input);


        return $this->sendResponse($checklist->toArray(), '$checklist created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $checklist = Checklist::find($id);


        if (is_null($checklist)) {
            return $this->sendError('$checklist not found.');
        }


        return $this->sendResponse($checklist->toArray(), '$checklist retrieved successfully.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChecklistCreateRequest $request, Checklist $checklist)
    {
        $input = $request->all();


        $checklist->name = $input['name'];
        $checklist->detail = $input['detail'];
        $checklist->save();


        return $this->sendResponse($checklist->toArray(), '$checklist updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checklist $checklist)
    {
        $checklist->delete();


        return $this->sendResponse($product->toArray(), '$checklist deleted successfully.');
    }
}
