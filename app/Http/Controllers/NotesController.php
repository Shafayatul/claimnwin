<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Note;
use Illuminate\Http\Request;
use Auth;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $notes = Note::where('claim_id', 'LIKE', "%$keyword%")
                ->orWhere('note', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $notes = Note::latest()->paginate($perPage);
        }

        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $claim_id = $request->claim_id;

        if($request->hasFile('note_files')){
            $files = $request->file('note_files');
            // dd($files);
            foreach($files as $file){
                $fileName = uniqid().'.'.$file->getClientOriginalExtension();
                $filePath = 'claim_note_files/';
                $fileUrl = $filePath.$fileName;
                $file->move($filePath,$fileName);
                // $file__name[] = $fileName;
                $images[]=$fileUrl;
            }

        }else{
            $images[]= null;
        }

        $note=new Note;

        $note->claim_id         = $claim_id;
        $note->note             = $request->note;
        $note->user_id          = Auth::user()->id;
        $note->note_files       = implode("|",$images);
        $note->save();

        return redirect('/claim-view/'.$claim_id)->with(['success'=>'Note added!']);
    }

    public function claimAjaxNoteStore(Request $request)
    {
        $claim_id = $request->claim_id;
        if($request->file('note_files') != null){
            $files = count($request->file('note_files'));
            if($files > 0){
                for($index = 0;$index < $files;$index++){
                    $file = $request->file('note_files')[$index];
                    $fileName = uniqid().'.'.$file->getClientOriginalExtension();
                    $filePath = 'claim_note_files/';
                    $fileUrl = $filePath.$fileName;
                    $file->move($filePath,$fileName);
                    $images[] = $fileUrl;
                }
            }else{
                $images = [];
            }
        }else{
            $images = [];
        }

        $note             = new Note;
        $note->claim_id   = $claim_id;
        $note->note       = $request->note_text;
        $note->user_id    = Auth::user()->id;
        $note->note_files = implode("|",$images);
        $note->save();
        return response()->json([
            'msg' => 'Success',
            'note' => $note,
            'name' => Auth::user()->name
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $note = Note::findOrFail($id);

        return view('notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $note = Note::findOrFail($id);

        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        $id = $request->note_id;
        $claim_id = $request->claim_id;

        $note = Note::find($id);
        $note->note   = $request->note;
        $note->save();

        return redirect('/claim-view/'.$claim_id)->with(['success'=>'Note Updated!']);
    }

    public function claimAjaxNoteUpdate(Request $request)
    {
        $id = $request->note_id;
        $note = Note::find($id);
        $note->note   = $request->note_text;
        $note->save();
        return response()->json([
            'msg' => 'Success',
            'note' => $note,
            'name' => Auth::user()->name
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, $id)
    {
        $claim_id = $request->claim_id;
        $note=Note::find($id);
        
        if($note->note_files != null){
        $noteFiles = explode("|",$note->note_files);

            foreach($noteFiles as $key=>$value){
                unlink($value);
            }
        }

        Note::destroy($id);

        return redirect('/claim-view/'.$claim_id)->with(['success'=>'Note deleted!']);
    }

    public function claimAjaxNoteDelete(Request $request)
    {
        $id = $request->note_id;
        $note=Note::find($id);
        
        if($note->note_files != null){
        $noteFiles = explode("|",$note->note_files);

            foreach($noteFiles as $key=>$value){
                unlink($value);
            }
        }

        Note::destroy($id);
        return response()->json([
            'msg' => 'Success'
        ]);
    }
}
