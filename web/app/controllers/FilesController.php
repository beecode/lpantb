<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use View;
use Input;
use Illuminate\Support\Facades\Redirect;
use App\Models\Form;
use App\Models\Files;
use Illuminate\Support\Facades\Session;
use App\Models\Anak;
use App\DAO\FilesDAO;

class FilesController extends BaseController {

    private $basic = ['page_title' => 'Lembaga Perlindungan Anak',];

    public function view($anak_id) {
        $anak = Anak::find($anak_id);
        $form = $anak->form->first();
        $files = Files::where('anak_id', '=', $anak->id)->paginate(100);
        $data = [
            'page_title' => 'Anak - Files',
            'panel_title' => 'Files Table View',
            'location' => 'view',
            'table' => $files,
            'form' => $form,
            'anak' => $anak,
            'form_id' => $form->id,
        ];
        return View::make('files.view', $data);
    }

    public function addView($anak_id) {
        $anak = Anak::find($anak_id);
        $files = Files::where('anak_id', '=', $anak->id)->paginate(100);
        $data = [
            'page_title' => 'Anak - Files',
            'panel_title' => 'Files Add View',
            'form_url' => '/dash/anak/files/add',
            'form_status' => 'add',
            'location' => 'addView',
            'anak' => $anak,
        ];
        return View::make('files.form', $data);
    }

    public function add() {
        if (Input::hasFile('document')) {
            $file = Input::file('document');
            $files = Input::get('files');
            $anak = Anak::find(Input::get('anak')['id']);

            $fl = array();
            $fl['nama'] = $files['nama'];
            $fl['keterangan'] = $files['keterangan'];
            $fl['file_name'] = str_random(6) . '_' . $file->getClientOriginalName();
            $fl['file_size'] = $file->getSize();
            $fl['file_type'] = $file->getMimeType();
            $fl['file_path'] = public_path() . '/upload/';
            $uploadSuccess = $file->move($fl['file_path'], $fl['file_name']);
            if ($uploadSuccess) {
                FilesDAO::saveOrUpdate($fl, $anak);
                Session::flash('message', "File berhasil di upload!");
                return Redirect::to('/dash/anak/files/view/' . $anak->id);
            } else {
                Session::flash('message', "Upload File Gagal!");
                return Redirect::to('/dash/anak/files/addview/' . $anak->id);
            }
        } else {
            Session::flash('message', "Error, Pilih File yang ingin di upload!");
            return Redirect::to('/dash/anak/files/addview/' . $anak->id);
        }
    }

    public function updateView($id) {
        $fl = Files::find($id);
        $data = [
             'page_title' => 'Anak - Files',
            'panel_title' => 'Files Add View',
            'form_url' => '/dash/anak/files/update',
            'form_status' => 'edit',
            'location' => 'editView',
            'data' => $fl,
            'anak_id' => $fl->anak->id,
            'anak' => $fl->anak,
        ];
        return View::make('files.form', $data);
    }

    public function update() {
        $files = Input::get('files');
        $anak = Anak::find(Input::get('anak')['id']);

        FilesDAO::saveOrUpdate($files, $anak);
        Session::flash('message', "Informasi file berhasil di ubah!");
        return Redirect::to('/dash/anak/files/view/' . $anak->id);
    }

    public function delete($id) {
        $fl = Files::find($id);
        $anak = $fl->anak;
        $del = FilesDAO::delete($id);
        if ($del) {
            unlink($fl->file_path . '/' . $fl->file_name);
            Session::flash('message', "Files dengan nama $fl->nama telah dihapus!");
        } else {
            Session::flash('message', "Error, Files with $id not found!");
        }
        return Redirect::to('/dash/anak/files/view/' . $anak->id);
    }

}
