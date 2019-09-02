<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Listitem;
use App\Http\Requests\Api\ListitemCreateRequest;

class ListitemController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listitem = Listitem::all();


        return $this->sendResponse($listitem->toArray(), '$listitem retrieved successfully.');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ListitemCreateRequest $request)
    {
        $input = $request->all();


        $listitem = Listitem::create($input);


        return $this->sendResponse($listitem->toArray(), '$listitem created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listitem = Listitem::find($id);


        if (is_null($listitem)) {
            return $this->sendError('$listitem not found.');
        }


        return $this->sendResponse($listitem->toArray(), '$listitem retrieved successfully.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ListitemCreateRequest $request, Listitem $listitem)
    {
        $input = $request->all();


        $listitem->name = $input['name'];
        $listitem->detail = $input['detail'];
        $listitem->save();


        return $this->sendResponse($listitem->toArray(), '$listitem updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listitem $listitem)
    {
        $listitem->delete();


        return $this->sendResponse($listitem->toArray(), '$listitem deleted successfully.');
    }
}
