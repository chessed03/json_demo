<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('employes.index');
    }

    public function saveEmploye(Request $request)
    {

        $data = (object)[
            'name'     => $request->name,
            'lastName' => $request->lastName,
            'email'    => $request->email,
            'address'  => $this->toJson($request)
        ];

        $result = Employe::newEmploye( $data );

        return redirect('employes.index');
    }

    public function toJson( $data )
    {
        $result = [
            'address'    => $data->address,
            'addressTwo' => $data->addressTwo,
            'city'       => $data->city,
            'state'      => $data->state,
            'zip'        => $data->zip,
        ];

        return json_encode($result);
    }

    public function testQueryJson(Request $request)
    {
        return view('employes.testJson');
    }

    public function exampleToQuery(Request $request)
    {
        $result = Employe::exampleToQuery($request);

        return $result;
    }

}
