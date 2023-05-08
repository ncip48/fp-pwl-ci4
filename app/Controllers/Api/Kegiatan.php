<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\Activity;
use App\Models\Document;
use App\Models\Program;
use App\Models\TemplateDocument;

class Kegiatan extends BaseController
{
    public function kgetiatanku()
    {
        $activity = new Activity();
        $session = \Config\Services::session();
        $user = $session->get('user');
        $activity = $activity->where('id_user', $user['id'])
            ->findAll();

        //loop to add program data
        foreach ($activity as $key => $value) {
            $program = new Program();
            $activity[$key]['program'] = $program->select('programs.*')
                ->select('categories.name as category_name')
                ->join('categories', 'categories.id = programs.category_id')
                ->where('programs.id', $value['id_program'])
                ->first();
            $activity[$key]['statusText'] = $this->getStatus($value['status']);
        }

        $data = [
            'activities' => $activity,
        ];
        return $this->getResponse('Sukses mendapatkan data kegiatan', $data);
    }

    public function detail($id)
    {
        $program = new Program();
        $template = new TemplateDocument();
        $document = new Document();
        $program = $program->select('programs.*')
            ->select('categories.name as category_name')
            ->join('categories', 'categories.id = programs.category_id')
            ->where('programs.id', $id)
            ->first();

        $session = \Config\Services::session();
        $logged_in = $session->get('logged_in');
        if ($logged_in) {
            $user = $session->get('user');
            $activity = new Activity();
            //find by id user and id program
            $activity = $activity->where('id_user', $user['id'])->where('id_program', $id)->first();
            if ($activity) {
                $program['is_daftar'] = true;
            } else {
                $program['is_daftar'] = false;
            }
        } else {
            $program['is_daftar'] = false;
        }

        if (!$program) {
            return $this->getResponse('Program tidak ditemukan', [], 404);
        }

        $program['duration'] = $this->calculateDuration($program['start_program'], $program['end_program']);
        //change the start_program and end_program to date format
        $program['start_program'] = $this->formatDateIndo($program['start_program']);
        $program['end_program'] = $this->formatDateIndo($program['end_program']);
        $program['files'] = $template->select('id,name,pdf,html')->where('id_program', $id)->findAll();
        //find document in the files if exist then create colummn result else null
        foreach ($program['files'] as $key => $value) {
            $document = $document->where('id_template', $value['id'])->first();
            if ($document) {
                $program['files'][$key]['result'] = $document['pdf'];
            } else {
                $program['files'][$key]['result'] = null;
            }
        }


        $data = [
            'program' => $program,
        ];
        return $this->getResponse('Sukses mendapatkan data program', $data);
    }
}
