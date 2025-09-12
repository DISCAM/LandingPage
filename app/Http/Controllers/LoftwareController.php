<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoftwareController extends Controller
{
    public function index()
    {
        $listaAssetow = array(
            array('imie'=>'Maciej', 'nazwisko'=>'kowalski', 'lat'=>24),
            array('imie'=>'Tomek', 'nazwisko'=>'Olsza', 'lat'=>34),
            array('imie'=>'Janek', 'nazwisko'=>'Malopolska', 'lat'=>44)
        );
        return view('loftware.loftware', [
            'lista'=>$listaAssetow ,
            'title'=>'przykładowa lista'
        ]);
    }

}
