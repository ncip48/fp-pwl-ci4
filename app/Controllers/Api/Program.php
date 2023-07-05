<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\Activity;
use App\Models\Category;
use App\Models\Notification;
use App\Models\Program as ModelsProgram;
use App\Models\TemplateDocument;

class Program extends BaseController
{
    public function index()
    {
        $query = $this->request->getPost('query') ?? '';
        $location = $this->request->getPost('location') ?? '';
        $slug_category = $this->request->getPost('category') ?? '';
        $category = new Category();
        $category = $category->where('slug', $slug_category)->first();
        if ($category) {
            $category_id = $category['id'];
        } else {
            $category_id = '';
        }

        $program = new ModelsProgram();
        $programs = $program->select('programs.*')
            ->select('categories.name as category_name')
            ->join('categories', 'categories.id = programs.category_id')
            ->like('programs.name', $query)
            ->like('categories.id', $category_id)
            ->like('programs.location', $location)
            ->orderBy('programs.created_at', 'DESC')
            ->findAll();
        $data = [
            'programs' => $programs,
        ];
        return $this->getResponse('Sukses mendapatkan data programs', $data);
    }

    public function detail($id)
    {
        $program = new ModelsProgram();
        $template = new TemplateDocument();
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

        $data = [
            'program' => $program,
        ];
        return $this->getResponse('Sukses mendapatkan data program', $data);
    }

    public function daftarProgram()
    {
        $session = \Config\Services::session();
        $logged_in = $session->get('logged_in');
        if (!$logged_in) {
            return $this->getResponse('Anda harus login terlebih dahulu', [], 403);
        }
        $id_user = $session->get('user')['id'];
        $id_program = $this->request->getPost('id_program');

        $program = new ModelsProgram();
        $program = $program->where('id', $id_program)->first();

        $activity = new Activity();
        //insert and get the last id
        $activity->insert([
            'id_user' => $id_user,
            'id_program' => $id_program,
            'status' => 0,
            'kode' => 'KGT' . rand(1000, 9999),
            'joined_at' => date('Y-m-d H:i:s'),
        ]);

        $notification = new Notification();
        $notification->insert([
            'id_user' => $id_user,
            'id_kegiatan' => $activity->getInsertID(),
            'message' => 'Pendaftaran program ' . $program['name'] . ' berhasil. Silahkan menunggu konfirmasi lebih lanjut.',
            'is_read' => 0,
        ]);

        $data = [
            'activity' => $activity,
        ];
        return $this->getResponse('Pendaftaran berhasil, silahkan lengkapi dokumen yang dibutuhkan di bagian kegiatanku', $data);
    }

    public function updateProgram()
    {
        $id = $this->request->getJsonVar('id');
        $name = $this->request->getJsonVar('name');
        $organizer = $this->request->getJsonVar('organizer');
        $location = $this->request->getJsonVar('location');
        $slot = $this->request->getJsonVar('slot');
        $description = $this->request->getJsonVar('description');
        $qualification = $this->request->getJsonVar('qualification');
        $start_program = $this->request->getJsonVar('start_program');
        $end_program = $this->request->getJsonVar('end_program');

        $program = new ModelsProgram();
        $program = $program->where('id', $id)->first();
        if (!$program) {
            return $this->getResponse('Program tidak ditemukan', [], 404);
        }

        $program = new ModelsProgram();
        $program = $program->update($id, [
            'name' => $name,
            'organizer' => $organizer,
            'location' => $location,
            'slot' => $slot,
            'description' => $description,
            'qualification' => $qualification,
            'start_program' => $start_program,
            'end_program' => $end_program,
        ]);

        return $this->getResponse('Program berhasil diupdate');
    }

    public function deleteProgram($id)
    {
        $program = new ModelsProgram();
        $program = $program->where('id', $id)->first();
        // dd($program);
        if (!$program) {
            return $this->getResponse('Program tidak ditemukan', [], 404);
        }
        $program = new ModelsProgram();
        $program = $program->where('id', $id)->delete();

        return $this->getResponse('Program berhasil dihapus');
    }
}
