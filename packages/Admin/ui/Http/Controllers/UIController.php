<?php

namespace Admin\UI\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use App\User;

class UIController extends Controller
{



    public function index()
    {
//        $appc = new AnnualProcurementPlanController();
//        $appc->user_has_department();
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        //store
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'card_number' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        return redirect()->back()->with('success', 'Form post successful');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request)
    {
    }

    public function destroy($id)
    {
    }

    public function dataTableData()
    {
        $model = User::query();

        return Datatables::eloquent($model)
            ->make(true);
    }

    public function dashboardOne()
    {
    }

    public function dashboardTwo()
    {
    }

    public function dashboardFive()
    {
    }

    public function dashboardEight()
    {
    }

    public function devDashboard()
    {
        return view('ui::templates.azia.dev.dashboard-five');
    }

    public function devForm()
    {
        return view('ui::templates.azia.dev.form');
    }

    public function devDataTable()
    {
        return view('ui::templates.azia.dev.data-table');
    }

    public function devDataTableAjax()
    {
        return view('ui::templates.azia.dev.data-table-ajax');
    }

    public function sessions(Request $request)
    {

        return $request->session()->all();
    }

}
