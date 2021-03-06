<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan_m extends CI_Model {
    public function get($id= null)
    {
        $this->db->from('pengaduan');
        if($id != null){
            $this->db->where('pengaduan_id', $id);
        }
        $this->db->join('pelanggan' , 'pelanggan.pelanggan_id=pengaduan.pelanggan_id' , 'left');
        $this->db->join('teknisi' , 'teknisi.teknisi_id=pengaduan.teknisi_id' , 'left');
        $this->db->order_by('pengaduan.status_pengaduan','asc');
        $this->db->order_by('pengaduan.tanggal_pengaduan','asc');
        $query = $this->db->get();
        
        return $query;
    }
    public function getstatus()
    {
        $this->db->from('pengaduan');
        $this->db->join('pelanggan' , 'pelanggan.pelanggan_id=pengaduan.pelanggan_id' , 'left');
        $this->db->join('teknisi' , 'teknisi.teknisi_id=pengaduan.teknisi_id' , 'left');
        $this->db->where('status_pengaduan', 1);
        $this->db->order_by('pengaduan.tanggal_pengaduan','asc');
        $query = $this->db->get();
        
        return $query;
    }
    public function getstatus1()
    {
        $this->db->from('pengaduan');
        $this->db->join('pelanggan' , 'pelanggan.pelanggan_id=pengaduan.pelanggan_id' , 'left');
        $this->db->join('teknisi' , 'teknisi.teknisi_id=pengaduan.teknisi_id' , 'left');
        $this->db->where('status_pengaduan', 2);
        $this->db->order_by('pengaduan.tanggal_pengaduan','asc');
        $query = $this->db->get();
        
        return $query;
    }
    public function getstatus2()
    {
        $this->db->from('pengaduan');
        $this->db->join('pelanggan' , 'pelanggan.pelanggan_id=pengaduan.pelanggan_id' , 'left');
        $this->db->join('teknisi' , 'teknisi.teknisi_id=pengaduan.teknisi_id' , 'left');
        $this->db->where('status_pengaduan', 3);
        $this->db->order_by('pengaduan.tanggal_pengaduan','asc');
        $query = $this->db->get();
        
        return $query;
    }
    
    public function ambil_data($tabel)
    {
        $this->db->from($tabel);
        
        $query = $this->db->get();
        return $query->result_array();
    }
    public function ambil_data_pelanggan()
    {
        $this->db->from('pelanggan');
        $this->db->join('pemasangan' , 'pelanggan.pelanggan_id=pemasangan.pelanggan_id' , 'left');
        $this->db->where('status', 2);
        $this->db->order_by('nama', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function rubah_status($id){
        $data = $this->get($id);
        $data = $data->result_array();
        if ($data[0]['status_pengaduan'] == '2'){
            $params['status_pengaduan'] = '3';
        }
        
        $this->db->where('pengaduan_id', $id);
        $this->db->update('pengaduan', $params);
        return true;
    }
    public function add($post)
    {
        $params['pelanggan_id'] = $post['pelanggan_id'];
        $params['tanggal_pengaduan'] = $post['tgl'];
        $params['keluhan'] = $post['keluhan'];
        $params['teknisi_id'] = $post['teknisi_id'];
        $params['status_pengaduan'] = $post['status_pengaduan'];

        $this->db->insert('pengaduan', $params);
    }
    public function tambah($post)
    {
        $params['pelanggan_id'] = $post['pelanggan_id'];
        $params['tanggal_pengaduan'] = $post['tgl'];
        $params['keluhan'] = $post['keluhan'];
        $params['status_pengaduan'] = $post['status_pengaduan'];

        $this->db->insert('pengaduan', $params);
    }
    
    public function edit($post)
    {
        $params['pelanggan_id'] = $post['pelanggan_id'];
        $params['tanggal_pengaduan'] = $post['tgl'];
        $params['keluhan'] = $post['keluhan'];
        $params['teknisi_id'] = $post['teknisi_id'];
        $params['status_pengaduan'] = $post['status_pengaduan'];

        $this->db->where('pengaduan_id', $post['pengaduan_id']);
        $this->db->update('pengaduan', $params);
    }
    public function ubah($post)
    {
        $params['pelanggan_id'] = $post['pelanggan_id'];
        $params['tanggal_pengaduan'] = $post['tgl'];
        $params['keluhan'] = $post['keluhan'];
        $params['teknisi_id'] = $post['teknisi_id'];
        $params['status_pengaduan'] = $post['status_pengaduan'];

        $this->db->where('pengaduan_id', $post['pengaduan_id']);
        $this->db->update('pengaduan', $params);
    }
    public function del($id)
	{
		$this->db->where('pengaduan_id', $id);
		$this->db->delete('pengaduan');
    }
    public function get_pengaduan($id= null)
    {
        $this->db->from('pengaduan');
        if($id != null){
            $this->db->where('pengaduan.pelanggan_id', $id);
        }
        $this->db->join('pelanggan' , 'pelanggan.pelanggan_id=pengaduan.pelanggan_id' , 'left');
        $this->db->join('teknisi' , 'teknisi.teknisi_id=pengaduan.teknisi_id' , 'left');
        $this->db->order_by('pengaduan.tanggal_pengaduan','desc');
        $query = $this->db->get();
       // echo $this->db->last_query();die();
        return $query;
    }
    public function get_pengaduan_only($id= null)
    {
        $this->db->from('pengaduan');
        if($id != null){
            $this->db->where('pengaduan.pengaduan_id', $id);
        }
        $this->db->join('pelanggan' , 'pelanggan.pelanggan_id=pengaduan.pelanggan_id' , 'left');
        $this->db->join('teknisi' , 'teknisi.teknisi_id=pengaduan.teknisi_id' , 'left');
        $query = $this->db->get();
       // echo $this->db->last_query();die();
        return $query;
    }
    public function getByDate($tgl_awal, $tgl_akhir)
    {
        $kondisi = "";
        $this->db->select('');
        $this->db->from('pengaduan');
        $this->db->join('pelanggan' , 'pelanggan.pelanggan_id=pengaduan.pelanggan_id' , 'left');
        $this->db->join('teknisi' , 'teknisi.teknisi_id=pengaduan.teknisi_id' , 'left');
        $this->db->order_by('status_pengaduan');
        if ($tgl_awal != "" && $tgl_akhir==""){
            $this->db->where('tanggal_pengaduan >=',$tgl_awal);
        } else if ($tgl_awal == "" && $tgl_akhir!=""){
            $this->db->where('tanggal_pengaduan <=',$tgl_akhir);
        } else  if ($tgl_awal != "" && $tgl_akhir!=""){
            $this->db->where('tanggal_pengaduan >=',$tgl_awal);
            $this->db->where('tanggal_pengaduan <=',$tgl_akhir);
        }
        $q = $this->db->get_where();
        $q = $q->result_array();
        return $q;
        
    }
    public function getByDateTeknisi($tgl_awal, $tgl_akhir)
    {
        $kondisi = "";
        $this->db->select('');
        $this->db->select('count(pengaduan_id)as num ,teknisi.nama_teknisi');
        $this->db->from('pengaduan');
        $this->db->group_by('nama_teknisi');
        $this->db->order_by('num', 'desc');
        $this->db->join('teknisi' , 'teknisi.teknisi_id=pengaduan.teknisi_id' , 'left');
        if ($tgl_awal != "" && $tgl_akhir==""){
            $this->db->where('tanggal_pengaduan >=',$tgl_awal);
        } else if ($tgl_awal == "" && $tgl_akhir!=""){
            $this->db->where('tanggal_pengaduan <=',$tgl_akhir);
        } else  if ($tgl_awal != "" && $tgl_akhir!=""){
            $this->db->where('tanggal_pengaduan >=',$tgl_awal);
            $this->db->where('tanggal_pengaduan <=',$tgl_akhir);
        }
        $q = $this->db->get_where();
        $q = $q->result_array();
        //echo $this->db->last_query();die();
        //print_r($q);
        return $q;
        
    }
}