<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::all();

        if(!$activities){
            return response()->json([
                'message' => "Not found"
            ], 404);
        }
        return response()->json([$activities, 200]);
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $activityDescription = $request->description;
        
        $newActivity = new Activity();
        $newActivity->description = $activityDescription;
        if($newActivity->save()){
            return response()->json("Se ha creado una actividad");
        }else {
            return response()->json("Algo salió mal", 500);
        }
    }

    public function disable(Request $request){
        $activityId = $request->activityId;

        try {
            $activity = Activity.findOrFail($activityId);
            if($activities->delete()){
                return response()->json("Se ha eliminado la actividad");
            }
        } catch (Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return response()->json("Algo salió mal");
        }

    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        $selectedAcivity = Activity::findOrFail($request->id);
        $selectedAcivity->status = 2;

        if ($selectedAcivity->save()){
            return response()->json(["message" => "Se ha completado la actividad"]);
        }else {
            return response()->json(["message" => "Algo salió mal"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        if($activity->delete()){
            return response()->json("Se ha eliminado la actividad");
        }else {
            return response()->json("Algo salió mal");
        }
    }
}
