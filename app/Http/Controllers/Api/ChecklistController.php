<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Checklist;
use App\Http\Requests\Api\ChecklistCreateRequest;
use App\Model\User;
use Mockery\Exception;

class ChecklistController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $checklist = $request->user()->checklists()->paginate(6);

        return $this->sendResponse($checklist,'');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChecklistCreateRequest $request)
    {
        //$checklist = Checklist::create([]);

        $checklist = $request->user()
                            ->checklists()
                            ->create(['user_id' => $request->user()->id,
                                      'title' => $request->title]);

        return $this->sendResponse($checklist->toArray(), 'checklist created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $checklist = $request->user()->checklists()->find($id);
        if (is_null($checklist)) {
                return $this->sendError('checklist not found or empty.');
        }
        return $this->sendResponse($checklist, '');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, ChecklistCreateRequest $request, Checklist $checklist)
    {

        $checklist = $request->user()->checklists()->find($id);
        $checklist->title = $request['title'];

        $checklist->save();


        return $this->sendResponse($checklist, 'checklist updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $checklist = $request->user()->checklists()->find($id);
        if (is_null($checklist)) {
            return $this->sendError('checklist not found.');
        }
        $checklist -> delete();
        return $this->sendResponse('', 'checklist deleted successfully.');
    }
}
