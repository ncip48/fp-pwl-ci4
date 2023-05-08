<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\Activity;
use App\Models\Program;

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
        }

        $data = [
            'activities' => $activity,
        ];
        return $this->getResponse('Sukses mendapatkan data kegiatan', $data);
    }
}
