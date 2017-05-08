<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MakeInvite;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Auth;

class InvitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invites = Auth::user()->invites;
        return view('invites.index', compact('invites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        try{
            $project = \App\Project::findOrFail($id);
        }
        catch(ModelNotFoundException $e){
            return view('error');
        }
        return view('invites.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MakeInvite $request)
    {
        $project = \App\Project::find($request->input('project'));

        try{
            $invitee = \App\User::where('email', $request->input('mail'))->firstOrFail();
        }
        catch(ModelNotFoundException $e){
            return view('error');
        }

        $invite = new \App\Invite([
            'email'         =>  $request->input('mail'),
            'project'       =>  $request->input('project'),
            'manager'       =>  $request->user()->id,
            'title'         =>  $request->input('title'),
            'body'          =>  $request->input('mbody'),
        ]);

        $invitee->invites()->save($invite);
        return redirect('/projects');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
