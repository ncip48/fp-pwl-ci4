<?php

namespace App\Controllers\Pengelola;

use App\Controllers\BaseController;
use App\Models\Program as ModelsProgram;

class Program extends BaseController
{
    public function index()
    {
        $programs = new ModelsProgram();
        $programs = $programs->findAll();

        //looping programs and add $program['duration'] = $this->calculateDuration($program['start_program'], $program['end_program']);
        foreach ($programs as $key => $program) {
            $programs[$key]['duration'] = $this->calculateDuration($program['start_program'], $program['end_program']);
        }

        return view('pengelola/program/show', compact('programs'));
    }
}
