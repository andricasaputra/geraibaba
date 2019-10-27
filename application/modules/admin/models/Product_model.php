<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model 
{
    protected $table = 'product';
    protected $relations = 'tb_kategori';
    protected $pivot = 'order_product';
    protected $pivotImage = 'image_product';
    protected $uploadPath = './upload/product/';
    protected $insertImages = [];

    public function all()
    {
        $this->db->select('product.id, product.nama_product, product.harga, product.pot_marketter, product.berat, product.stock, product.deskripsi, product.modified_by, product.last_modified, tb_kategori.kategori');
        $this->db->from($this->table);
        $this->db->join('tb_kategori', ' tb_kategori.id = product.id_kategori', 'left');
        $this->db->order_by('product.id', 'DESC');
        
        return $this->db->get()->result_array();
    }

    public function first($id)
    {
        return $this->db->get_where($this->table, [
            'id' => $id
        ])->row_array();
    }

    public function firstImage($id)
    {
        return $this->db->get_where($this->pivotImage, [
            'image_id' => $id
        ])->row_array();
    }

    public function showImages($product_id)
    {
        $this->db->select('product.id, product.nama_product, image_product.image_id, image_product.gambar, image_product.main');
        $this->db->from($this->table);
        $this->db->join($this->pivotImage, 'image_product.product_id = product.id', 'left');
        $this->db->where('product.id', $product_id);
        $this->db->order_by('product.id', 'DESC');
        
        return $this->db->get()->result_array();
    }

    public function store()
    {
        //Mulai DB Transaction
        $this->db->trans_start();

        $data = [
            'nama_product' => str_replace('/', '-', $this->input->post('nama_product')),
            'id_kategori' => ucfirst($this->input->post('kategori')),
            'harga' => $this->input->post('harga'),
            'pot_marketter' => $this->input->post('pot_marketter'),
            'berat' => $this->input->post('berat'),
            'stock' => $this->input->post('stock'),
            'deskripsi' => $this->input->post('deskripsi'),
            'modified_by' => ucwords($this->User_model->getActiveUser()['nama']),
            'last_modified' => $this->input->post('last_modified')
        ];

        // Insert ke table product
        $this->db->insert($this->table, $data);

        // Upload images
        $this->uploadImages();
        
        // insert ke table image_product (pivot)
        $this->db->insert_batch($this->pivotImage, $this->insertImages);

        // DB transaction complete
        $this->db->trans_complete();

        return true;
    }

    public function storeImageProduct($product_id)
    {
        $name =  time().'_'.trim(str_replace(' ', '_', $_FILES['gambar_product']['name']));

        $_FILES['gambar_product']['name'] = $name;

        $this->upload->initialize($this->uploadConfig());

        if(! $this->upload->do_upload('gambar_product')){

            return false;

        } 

        $data = [
            'product_id' => $product_id,
            'gambar' => $name,
        ];

        // Insert ke table image_product
        $this->db->insert($this->pivotImage, $data);

        return true;
    }

    protected function uploadImages()
    {
        $latest = $this->latest();

        $files = $_FILES;

        $count = count($_FILES['gambar_product']['name']);

        for ($i = 0; $i < $count; $i ++) {

            $name =  time().'_'.trim(str_replace(' ', '_', $files['gambar_product']['name'][$i]));

            $_FILES['gambar_product']['name'] = $name;
            $_FILES['gambar_product']['type'] = $files['gambar_product']['type'][$i];
            $_FILES['gambar_product']['tmp_name'] = $files['gambar_product']['tmp_name'][$i];
            $_FILES['gambar_product']['error'] = $files['gambar_product']['error'][$i];
            $_FILES['gambar_product']['size'] = $files['gambar_product']['size'][$i];

            $this->upload->initialize($this->uploadConfig());

            if(! $this->upload->do_upload('gambar_product') || 
                $files['gambar_product']['error'][$i] != 0){

                return false;

            } 

            if ($i === 0) {

                $this->insertImages[] = [
                    'product_id' => $latest->id,
                    'gambar' => $name,
                    'main' => 1
                ];

            } else {

                $this->insertImages[] = [
                    'product_id' => $latest->id,
                    'gambar' => $name,
                    'main' => NULL
                ];
            }   
            
        }

        return true;
    }

    protected function uploadConfig()
    {
        $config['upload_path']  = $this->uploadPath; 
        $config['allowed_types'] = 'jpg|png|jpeg|bmp|jfif'; 
        $config['overwrite']  = true;

        return $config;
    }

    public function update($id)
    {
        $nama_product     = $this->input->post('nama_product');
        $kategori         = $this->input->post('kategori');
        $deskripsi        = $this->input->post('deskripsi');
        $harga            = $this->input->post('harga');
        $pot_marketter    = $this->input->post('pot_marketter');
        $berat            = $this->input->post('berat');
        $stock            = $this->input->post('stock');
        $modified_by      = $this->input->post('modified_by');
        $last_modified    = $this->input->post('last_modified');

        $this->db->set('nama_product', strtoupper($nama_product));
        $this->db->set('id_kategori', $kategori);
        $this->db->set('harga', $harga);
        $this->db->set('stock', $stock);
        $this->db->set('pot_marketter', $pot_marketter);
        $this->db->set('deskripsi', $deskripsi);
        $this->db->set('modified_by', strtoupper($modified_by));
        $this->db->set('last_modified', $last_modified);

        $this->db->where('id', $id);
        $this->db->update($this->table);
    }

    public function delete($id)
    {
        //Mulai DB Transaction
        $this->db->trans_start();

        $this->deleteAllImages($id);

        $this->db->where('id', $id);
        $this->db->delete($this->table);

        //DB Transaction complete
        $this->db->trans_complete();
    }

    protected function deleteAllImages($id)
    {
        $datas = $this->showImages($id);

        foreach ($datas as $key => $data) {
            $this->deleteImageProduct($data['image_id']);
        }  
    }

    public function deleteImageProduct($id)
    {
        //Mulai DB Transaction
        $this->db->trans_start();

        $data = $this->firstImage($id);
        $image = $this->uploadPath . $data['gambar'];
        
        if (file_exists($image)) {
            unlink($image);
        }

        $this->db->where('image_id', $id);
        $this->db->delete($this->pivotImage);

        //DB Transaction complete
        $this->db->trans_complete();
    }

    public function setAsMainImage($product_id, $id)
    {
        $this->db->where_in('product_id', $product_id);
        $this->db->from($this->pivotImage);

        $datas = $this->db->get()->result_array();

        foreach ($datas as $key => $value) {

            if ($value['image_id'] == $id) {

                $this->db->set('main', 1);

                $this->db->where('image_id', $id);
                $this->db->update($this->pivotImage);
    
            } else {

                $this->db->set('main', NULL); 

                $this->db->where('image_id', $value['image_id']);
                $this->db->update($this->pivotImage); 
            }
        }

        return true;
    }

    public function count()
    {
        return $this->db->from($this->table)->count_all_results();
    }

    public function getKategoriById()
    {
        $this->db->select('*');
        $this->db->from($this->relations);
        $this->db->join($this->table, 'product.id_kategori = tb_kategori.id', 'right');

        return $this->db->get()->row_array();
    }

    public function getCountProductChartColumn()
    {
        $this->db->select('count(kategori) as kategori, kategori as ktgr');
        $this->db->from($this->table);
        $this->db->join($this->relations, 'product.id_kategori = tb_kategori.id', 'right');
        $this->db->group_by('kategori');
        $this->db->order_by('count(kategori)', 'DESC');

        return $this->db->get()->result_array();
    }

    public function getPercentage_product()
    {
        $this->db->select('kategori as ktgr, count(kategori) as kategori');
        $this->db->from($this->table);
        $this->db->join($this->relations, 'product.id_kategori = tb_kategori.id', 'right');
        $this->db->group_by('kategori');

        return $this->db->get()->result_array();
    }

    public function latest()
    { 
        return $this->db->select('id')
                    ->from($this->table)
                    ->limit(1)
                    ->order_by('id','DESC')
                    ->get()
                    ->row();
    }
}