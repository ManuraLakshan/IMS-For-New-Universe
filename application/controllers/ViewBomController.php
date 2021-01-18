<?php


class ViewBomController extends CI_Controller
{
	public function loadViewBomView()
	{
//		$bom_info=$this->db->query("SELECT DISTINCT(bom.style_id),style_name FROM bom,style WHERE bom.style_id=style.style_id");
//		$this->load->view('view_bom_btn',['result' =>$bom_info->result()]);
		$data   = array();
		$this->load->model('ViewBomModel');
		$data['result'] = $this->ViewBomModel->getStyleDetails();
		$this->load->view('view_bom_btn', $data);

	}

		public function viewBom($id){
		$bom_info=$this->db->query("SELECT bom_id,bom.material_id,material_description,color,waste,moq,required_qty FROM bom,material WHERE bom.material_id=material.material_id AND style_id='$id'");
		$this->load->view('view_bom',['id'=>$id,'rec' => $bom_info->result()]);
	}
//
//	function getStyleAndBomData()
//	{
//		$data   = array();
//		$this->load->model('ViewBomModel');
//		$this->load->helper('url');
//		$this->load->library('acl');
//		$data['result'] = $this->ViewBomModel->getStyleDetails();
//		$this->load->view('view_bom_btn', $data);
//	}

}
