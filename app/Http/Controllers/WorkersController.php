<?php

namespace App\Http\Controllers;

use App\Worker;

class WorkersController extends Controller
{
    /**
     * Pass workers into view.
     * Return workers view.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getWorkersPage()
    {
        $workers = Worker::all();

        return view('workers', ['workers' => $workers]);
    }
}
