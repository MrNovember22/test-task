<?php

namespace App\Http\Controllers;

use App\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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



    /**
     * Import data from loaded excel file to workers table.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function importWorkers(Request $request) {
        if($request->hasFile('import-file')){
            Excel::load($request->file('import-file')->getRealPath(), function ($reader) {

                foreach ($reader->toArray() as $key => $row) {
                    $data['famimliya'] = $row['famimliya'];
                    $data['imya'] = $row['imya'];
                    $data['otchestvo'] = $row['otchestvo'];
                    $data['god_rozhdeniya'] = $row['god_rozhdeniya'];
                    $data['dolzhnost'] = $row['dolzhnost'];
                    $data['zp_v_god'] = $row['zp_v_god'];

                    if(!empty($data)) {
                        DB::table('workers')->insert($data);
                    }
                }
            });
        }

        return back();
    }
}
