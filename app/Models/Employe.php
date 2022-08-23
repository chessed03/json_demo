<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employe extends Model
{
    use HasFactory;

    public function newEmploye( $data )
    {
        $employe = new self();

        $employe->name      = $data->name;
        $employe->last_name = $data->lastName;
        $employe->email     = $data->email;
        $employe->address   = $data->address;

        $employe->save();

        return true;
    }

    protected function exampleToQuery( $data )
    {
        $result = null;

        $query = DB::table('employes');

        if( $data->keyword ){

            $query->where('name','like',"%$data->keyword%")
                ->orWhere('last_name','like',"%$data->keyword%")
                ->orwhereJsonContains('address->zip', $data->keyword)
                ->orWhereJsonContains('address->city', $data->keyword)
                ->orWhereJsonContains('address->address', $data->keyword)
                ->orWhereJsonContains('address->addressTwo', $data->keyword);

        }

        if( $data->state ){

            $query->orWhereJsonContains('address->state', $data->state);

        }

        if( $data->keyword || $data->state ){

            $employe = $query->get();

        }else{

            $employe = $result;

        }

        $result = $employe;

        return $result;
    }

}
