<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\View\View;

class ChartjsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // $user = User::all()->count();
        // $users = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))

        // ->whereYear('created_at', date('Y'))

        // ->groupBy(DB::raw("Month(created_at)"))

        // ->pluck('count', 'month_name');



        $users = User::all();

$labels = $users->keys();

$data = $users->values();



return view('chart', compact('labels', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
