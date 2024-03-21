<?php

namespace Admin\SystemSettings\Http\Controllers;
use Admin\Departments\Models\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Admin\SystemSettings\Models\GroupSector;
use Admin\SystemSettings\Traits\AdminUnitsTrait;
use Admin\SystemSettings\Models\States;
use Admin\UserManagement\Models\UsersInnerJoin;
use App\User;
use Illuminate\Support\Facades\Auth;
use Admin\Offices\Models\Office;

class SystemSettingsController extends Controller
{
    use AdminUnitsTrait;
    public function index()
    {
       return $this->Districts();
       return $this->Village();
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getSubSectorsBySectorId(Request $request): JsonResponse
    {
        $data['sub_sectors'] = GroupSector::find($request->id)->sub_sectors;
        return response()->json($data);
    }

    //get cities by country
    public function cities(){
          $country=$_GET['country'];
          $cities = States::where('country',$country)->get();
          return array('cities'=> $cities) ;
    }

    //get offices by organisation_id
    public function selectOffices(){

        $id = $_GET['department_id'];
        $offices = array();
        foreach (Office::withoutGlobalScopes()->where('department_id',$id)->get() as $obj){
                    $offices[] = array(
                        'id' => $obj->id,
                        'name' => $obj->office_name
                    );
        }
        return array('offices'=> $offices) ;
    }

    //get departments by office_id
    public function selectDepartments(){

        $id = $_GET['organisation_id'];
        $departments = array();
        foreach (Department::withoutGlobalScopes()->where('organisation_id',$id)->get() as $obj){
                    $departments[] = array(
                        'id' => $obj->id,
                        'name' => $obj->dept_name
                    );
        }
        return array('departments'=> $departments) ;
    }


    //get users by department_id
    public function selectUsers(){

        $id = $_GET['office_id'];
        $users = array();
        foreach (User::OfficeUsers($id)->where('users.id','!=',Auth::id())->get() as $obj){
                    $users[] = array(
                        'id' => $obj->id,
                        'name' => $obj->first_name . ' ' . $obj->last_name
                    );
        }
        return array('users'=> $users) ;
    }



}
