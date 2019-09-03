<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Listitem;
use App\Http\Requests\Api\ListitemCreateRequest;
use App\Model\Checklist;

class ListitemController extends BaseController
{
    public function index($list_id, Request $request)
    {
        $checklist = $request->user()->checklists()->find($list_id);

        if (is_null($checklist)) {
            return $this->sendError('checklist not found.');
        }

        $checklistItems = $checklist->listitems();

        if (is_null($checklistItems)) {
            return $this->sendError($checklist,'');
        }

        return $this->sendResponse($checklistItems->paginate(6),'');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($list_id, ListitemCreateRequest $request)
    {

        $checklist = $request->user()
            ->checklists()->find($list_id)->listitems()
            ->create(['checklist_id' => $list_id,
                'body' => $request->body]);

        return $this->sendResponse($checklist, 'item created successfully.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($list_id, $item_id, ListitemCreateRequest $request)
    {
        $checklist = $request->user()->checklists()->find($list_id);
        $list_item = $checklist->listitems()->find($item_id);
        $list_item->body = $request['body'];
        if (isset($request['done']))
            $list_item->done = $request['done'];

        $list_item->save();


        return $this->sendResponse($checklist, 'item updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($list_id, $item_id, Request $request)
    {
        $checklist = $request->user()->checklists()->find($list_id);
        $list_item = $checklist->listitems()->find($item_id);
        if (is_null($list_item)) {
            return $this->sendError('item not found.');
        }
        $list_item -> delete();
        return $this->sendResponse($checklist, 'checklist deleted successfully.');
    }
}
