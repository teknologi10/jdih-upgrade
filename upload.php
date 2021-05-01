<?php
<!-- Form Upload di View -->
<div class="form-group">
    <label for="name" Class="col-md-12">Photo</label>
    <div class="col-md-12">
        <input class="form-control-file <?php echo form_error('price') ? 'is-invalid':'' ?>" type="file" name="image" />
    </div>
    <div class="invalid-feedback">
        <?php echo form_error('image') ?>
    </div>
</div>

<!-- Controller -->
public function aksi_tambah()
    {
        $data['judul'] = 'Kirim Aspirasi';
        $data['varkecamatan'] = $this->Aspirasi_model->getAllKecamatan();

        $aspirasi = $this->Aspirasi_model;
        $validation = $this->form_validation;
        $validation->set_rules($aspirasi->rules());

        if ($validation->run()) {
            $aspirasi->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('public/c_aspirasi/aspirasi_saya');
        }

        $this->load->view('tempelate/header_public', $data);
        $this->load->view('public/aspirasi/tambah', $data);
        $this->load->view('tempelate/footer_public');
    }

    <!-- Model -->
    public function save()
    {
        $user_id  = $this->session->userdata('nik');
        date_default_timezone_set("Asia/Bangkok");

        $post = $this->input->post(NULL, true);

        $this->nik = $user_id;
        $this->aspirasi = $post["aspirasi"];
        $this->lokasi = $post["lokasi"];
        $this->latitude = $post["latitude"];
        $this->longitude = $post["longitude"];
        $this->kecamatan = $post["kecamatan"];
        $this->tanggapan = $post["tanggapan"];
        $this->komisi = $post["komisi"];
        $this->image = $this->_uploadImage();
        $this->status = 'Belum Ditanggapi';
        $this->tgl_entry = date('Y-m-d H:i:s');

        // echo json_encode($data);
        // exit;
        
        $this->db->insert($this->_table, $this);
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/aspirasi/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['file_name']            = 'file_'.time();
        $config['overwrite']            = true;
        $config['max_size']             = 15000;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        } else {
            log_message('error', $this->upload->display_errors());
        }
        
        return "default_image.png";
    }
