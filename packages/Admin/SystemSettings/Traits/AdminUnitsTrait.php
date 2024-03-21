<?php

namespace Admin\SystemSettings\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Admin\SystemSettings\Models\AdminUnits;
use Illuminate\Database\Eloquent\Model;
use Admin\SystemSettings\Models\AdminUnitsType;

trait AdminUnitsTrait
{

    public function Country($id = null, $list_child = false)
    {
        $type_id = 1;
        return $this->getAdminUnits($type_id, $id, $list_child);
    }

    public function Region($id = null, $list_child = false)
    {
        $type_id = 2;
        return $this->getAdminUnits($type_id, $id, $list_child);

    }

    public function Districts($id = null, $list_child = false)
    {
        $type_id = 3;
        return $this->getAdminUnits($type_id, $id, $list_child);

    }

    public function Subcounty($id = null, $list_child = false)
    {
        $type_id = 4;
        return $this->getAdminUnits($type_id, $id, $list_child);
    }

    public function Parish($id = null, $list_child = false)
    {
        $type_id = 5;
        return $this->getAdminUnits($type_id, $id, $list_child);
    }

    public function Village($id = null, $list_child = false)
    {
        $type_id = 6;
        return $this->getAdminUnits($type_id, $id, $list_child);
    }

    public function admin_types($id = null)
    {
        $query = new AdminUnitsType;
        return $id ? $query->where('id', $id)->first() : $query->get();
    }

    private function getAdminUnits($type_id, $id = null, $list_child = false, $remote = false)
    {
        $query = new AdminUnits;
        $remote == true ? $query->select('id', 'name as text') : '';
        if (isset($id)) {
            return $list_child ? $query->where('tree_parent_id', $id)->get() : $query->where('id', $id)->first();
        } else {
            return $query->where('type_id', $type_id)->get();
        }
    }

    public function remoteAdminUnits(Request $request, $level,$parent_id=null)
    {

        switch ($level) {
            case 'country':
                $type_id = 1;
                break;
            case 'region':
                $type_id = 2;
                break;
            case 'district':
                $type_id = 3;
                break;
            case 'subcounty':
                $type_id = 4;
                break;
            case 'parish':
                $type_id = 5;
                break;
            case 'village':
                $type_id = 6;
                break;
        }

        $parent_filter=array('tree_parent_id'=> $parent_id);

        // need the roles here for them to be able to get districts.
        if (Auth::user()->hasRole('cao|subcounty-chief|parish-chief')) {

            $where = [];

            $district_id = Auth::user()->user_details->district_id;
            $where['id']=$district_id;

            // need the roles here to be able to get parishes
            if (Auth::user()->hasRole('subcounty-chief|parish-chief') && $level=='subcounty') {
                $parent_filter = array('id'=>Auth::user()->user_details->subcounty_id);
            }

            if (Auth::user()->hasRole('parish-chief') && $level=='parish') {
                $parent_filter = array('id'=>Auth::user()->user_details->parish_id);
            }

        }else{
            $where=array('type_id'=> $type_id);
        }

        $row = AdminUnits::select('id', 'name as text');
        isset($parent_id)  ? $row->where($parent_filter) : $row->where($where);
        isset($request->q) ? $row->where('name', 'like', "%$request->q%") : '';
//        isset($request->id) && !empty($request->id) ? $row->where('id', '=', $request->id) : '';



        return array(
            'total_count' => $row->count(),
            'incomplete_results' => false,
            'items' => $row->get()
        );
    }


}
