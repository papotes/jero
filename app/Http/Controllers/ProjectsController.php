<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProject;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $projects = Auth::user()->projects;
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProject $request)
    {
        $project = new \App\Project([
            'title'     =>  $request->input('title'),
            'manager'   =>  $request->user()->id
        ]);

        $request->user()->projects()->save($project);
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
        try{
            $project = \App\Project::findOrFail($id);
        }
        catch(ModelNotFoundException $e){
            return view('error');
        }
        $id = Auth::user()->id;
        if ($project->users()->where('user_id', $id)->get()->isEmpty()) {
           return view('error');
        }
        else
            return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $project = \App\Project::findOrFail($id);
        }
        catch(ModelNotFoundException $e){
            return view('error');
        }
        if($project->manager == Auth::user()->name){
            return view('projects.edit', compact('project'));
        }
        else
            return view('error500');
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
        dd('En construccion');
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

    public function stats($id)
    {
        //
    }

    public function users($pid, $uid)
    {
        try{
            $project = \App\Project::findOrFail($pid);
        }
        catch(ModelNotFoundException $e){
            return view('error');
        }
        if ($project->users()->where('user_id', $uid)->get()->isEmpty()) {
           return view('error');
        }
        else
            return view('projects.users', compact('project'));
    }

    public function detach($pid, $uid)
    {
        try{
            $project = \App\Project::findOrFail($pid);
        }
        catch(ModelNotFoundException $e){
            return view('error');
        }
        if ($project->users()->where('user_id', $uid)->get()->isEmpty())
           return view('error');

        return view('projects.users', compact('project'));
    }
}
