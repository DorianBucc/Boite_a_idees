<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $champs = '';
        if($request->get("search") != null){
            $search = $request->get("search");
            if($request->get("champs") != null and $request->get("champs") != "")
            {
                if($request->get("champs") == "titre"){
                    $ideas = Auth::user()->ideas()->where('title', 'like', '%'.$search.'%')->get();       
                    $champs = "titre";
                }
                else if($request->get("champs") == "description"){
                    $ideas = Auth::user()->ideas()->where('description', 'like', '%'.$search.'%')->get();       
                    $champs = "description";
                }
            }
            else{
                $ideas = Auth::user()->ideas()->where('title', 'like', '%'.$search.'%')->orWhere('description', 'like', '%'.$search.'%') ->get();       
            }
            
        }
        else{
            $search = '';
            $ideas = Auth::user()->ideas;
        }
        
        
        return view('pages.dashboard', compact('ideas','search', 'champs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize("create", Idea::class);
        return view('ideas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize("create",Idea::class);
        $validate =  $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        Auth::user()->Ideas()->create($validate);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        $this->authorize("view", $idea);
        return view('ideas.show', compact('idea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        $this->authorize("update", $idea);
        return view('ideas.edit', compact('idea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Idea $idea)
    {
        $this->authorize("update", $idea);
        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        $idea->update($validate);
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
        $this->authorize("delete", $idea);
        $idea->delete();
        return redirect()->route('dashboard');
    }
}
