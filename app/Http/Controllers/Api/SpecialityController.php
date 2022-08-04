<?php

namespace App\Http\Controllers\Api;

use App\Models\Speciality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpecialityController extends Controller
{
    public function dentistas(Speciality $speciality){
        return $speciality->users()->get([
            'users.id',
            'users.name'
        ]);
    }
}
