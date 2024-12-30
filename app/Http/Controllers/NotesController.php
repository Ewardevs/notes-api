<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController;
use App\Http\Requests\StoreNotesRequest;
use App\Models\Notes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use PhpParser\Node\Stmt\Nop;

class NotesController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Notes::all()->where("user_id",Auth::user()->id);

        return $this->sendResponse($data,"All notes");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNotesRequest $request)
    {


        $data = Notes::create([
            "title"=>$request->title,
            "content"=>$request->content,
            "user_id" => $request->user()->id
            ]
        );

        return $this->sendResponse($data,"Note created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {


        $note = Notes::find($id);

        Gate::authorize("view",$note);
        if (!$note) {
            return $this->sendError("Note not found", 404);
        }

        return $this->sendResponse($note, "Note retrieved successfully.");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $note = Notes::find($id);

        if (!$note) {
            return $this->sendError("Note not found", 404);
        }

        Gate::authorize("update",$note);

        $note->update($request->all());

        return $this->sendResponse($note, "Note Updated successfully.");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $note = Notes::find($id);

        if (!$note) {
            return $this->sendError("Note not found", 404);
        }

        Gate::authorize("delete",$note);

        $note->delete();

        return $this->sendResponse($note, "Note deleted successfully.");
    }
}
