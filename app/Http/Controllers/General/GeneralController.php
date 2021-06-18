<?php

namespace App\Http\Controllers\General;

use App\Group\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneralController extends Controller
{
    public function list()
    {
        $data['groups']  = Group::all();
        $data['counter'] = 1;
        return view('groups.list',$data);
    }
    public function create()
    {
        
        $quick_add = false;
        if (!empty(request()->input('quick_add'))) {
            $quick_add = true;
        }

        // $is_repair_installed = $this->moduleUtil->isModuleInstalled('Repair');

        return view('groups.create')
                ->with(compact('quick_add'));
    }
    public function store(Request $request)
    {
        $response = Group::saveOrUpdateGroup($request);        
        return redirect()->route('groups.list')->withstatus($response['message']);
    }

    public function destroy_group($id)
    {
        Group::where('id',$id)->delete();
        return back()->withstatus("Group Delete Successfully!");
    }
}
