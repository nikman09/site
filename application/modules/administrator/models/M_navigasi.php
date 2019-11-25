<?php

/*
 * ***************************************************************
 * Version : 1.1 
 * Author : Rifqie Rusyadi, S.Kom.
 * Email : rifqie.rusyadi@gmail.com
 * Description : Model
 * ***************************************************************
 */

/**
 * Description of navigasi
 * @author rifqie
 */

class M_navigasi extends CI_Model{
    
    public function get_new()
	{
        $record = new stdClass();
        $record->judul = '';
		$record->parent_id = '';
		$record->order_id = '';
		$record->tipe = '';
		$record->page_id = '';
		$record->kategori_id = '';
		$record->url = '';
		$record->keterangan = '';
		$record->gambar = '';
		$record->status = '1';
		return $record;
    }
    
    public function get_all()
	{
     
		$sql = $this->db->get('tb_navigasi');
        if($sql->num_rows() > 0){
            return $sql->result();
        }else{
            return FALSE;
        }
    }
    
    public function get_by($id) {
		$this->db->where('id', $id);
        $sql = $this->db->get('tb_navigasi');
        if($sql->num_rows() > 0){
            return $sql->row();
        }else{
            return FALSE;
        }
    }
	
	public function parent_id()
	{
		$this->db->where('parent_id',0);
		$query = $this->db->order_by('id', 'ASC')->get('tb_navigasi');
		$dropdown['0'] = 'Tidak Ada Induk';
		if(count($query)){
			foreach ($query->result() as $row)
			{
				$dropdown[$row->id] = $row->judul;
			}
		}
		return $dropdown;
	}
	
	public function kategori()
	{
		$query = $this->db->order_by('id', 'ASC')->get('tb_beritakategori');
		$dropdown[''] = 'Pilih Salah Satu';
		$dropdown['NULL'] = 'Semua Kategori';
		foreach ($query->result() as $row)
		{
			$dropdown[$row->id] = $row->kategori;
		}
		return $dropdown;
	}
	
	public function halaman()
	{
		//$this->db->where('status','1');
		$query = $this->db->order_by('id', 'ASC')->get('page');
		$dropdown[''] = 'Pilih Salah Satu';
		foreach ($query->result() as $row)
		{
			$dropdown[$row->id] = $row->judul;
		}
		return $dropdown;
	}
    
    public function insert($data)
	{
        $this->db->insert('tb_navigasi', $data);
		return $this->db->insert_id();
    }
	
	public function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('tb_navigasi', $data);
		return $this->db->affected_rows();
	}
	
	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('tb_navigasi');
	}
	
	public function save_order($navigation)
	{
		if(count($navigation)){
			foreach($navigation as $order => $nav ){
				//var_dump($nav);
				if($nav['item_id'] != ''){
					$data = array('parent_id'=>(int) $nav['parent_id'], 'order_id' => $order );
					$this->db->set($data)->where('id', $nav['item_id'])->update('tb_navigasi');
					//echo '<pre>'.$this->db->last_query().'</pre>';
				}
			}
		}
	}
	
	public function get_nested()
	{
		$this->db->order_by('parent_id','asc');
		$this->db->order_by('order_id','asc');
		$navigation = $this->db->get('tb_navigasi')->result_array();
		
		$array = array();
		foreach ($navigation as $nav){
			if(!$nav['parent_id']){
				$array[$nav['id_navigasi']] = $nav;
			}else{
				$array[$nav['parent_id']]['children'][] = $nav;
			}
		}
		return $array;
	}
    
}