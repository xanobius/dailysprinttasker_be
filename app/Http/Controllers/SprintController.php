<?php

namespace App\Http\Controllers;

use App\Models\Sprint;
use Illuminate\Http\Request;

class SprintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // could be problematic with a hell of a lot sprints...
        $allSprintes = \Auth::user()->sprints;
        $active = $allSprintes->filter(fn ($s) => $s->is_active)->first();
        $prev = $allSprintes->filter(fn ($s) => $s->id === $active->previous_sprint_id)->first();
        $next = $allSprintes->filter(fn ($s) => $s->previous_sprint_id === $active->id)->first();

        return [
            [
                'id' => $prev->id,
                'last' => true,
                'current' => false,
                'next' => false,
            ],[
                'id' => $active->id,
                'last' => false,
                'current' => true,
                'next' => false,
            ],[
                'id' => $next->id,
                'last' => false,
                'current' => false,
                'next' => true,
            ]
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sprint  $sprint
     * @return \Illuminate\Http\Response
     */
    public function show(Sprint $sprint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sprint  $sprint
     * @return \Illuminate\Http\Response
     */
    public function edit(Sprint $sprint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sprint  $sprint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sprint $sprint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sprint  $sprint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sprint $sprint)
    {
        //
    }
}
