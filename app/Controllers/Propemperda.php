<?php

namespace App\Controllers;

class Propemperda extends BaseController
{


    public function index()
    {
        $data = [

            'aktif' => $this->uri->getSegment(1)
            // return $this->orderBy('id', 'desc')->findAll();
        ];
        return view('propemperda', $data);
    }

    //--------------------------------------------------------------------

}
