<?php
namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait Procedures
{
    public function Insert_Details($storedprocedure,$parameters = array())
    {

        $parameter_placeholder = $this->Set_parameter_placeholders($parameters);
        $procedure_call = "CALL ".$storedprocedure."(".$parameter_placeholder.")";

        $row_insert = DB::select(
            // 'CALL insert_accounts(?,?)',
            // array("Collinsms" , 20000)
            $procedure_call,
            $parameters
        );

        return $row_insert;

    }

    public function Get_Result_From_Procedure($storedprocedure , $parameters = array())
    {
        $parameter_placeholder = $this->Set_parameter_placeholders($parameters);
        $procedure_call = "SELECT * FROM ".$storedprocedure."(".$parameter_placeholder.")";

        $table_results = DB::select(
            $procedure_call,
            $parameters

        );
        return $table_results;
    }
    private function Set_parameter_placeholders($parameters = array())
    {
        $x = 1;
        $parameter_placeholder= '';
        foreach($parameters as $param)
        {

             $parameter_placeholder .='?';
             if($x < count($parameters))
             {
                $parameter_placeholder .=',';
             }
            $x++;
        }
        return  $parameter_placeholder;
    }


}
