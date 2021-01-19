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

		public function viewBom(){
		$id = $this->input->get("id");
		$bom_info=$this->db->query("SELECT material.material_id,material.material_description,material.color,bom.required_qty,bom.unit,bom.waste,bom.moq
FROM ((style
INNER JOIN bom ON style.style_id = bom.style_id)
INNER JOIN material ON material.material_id = bom.material_id AND style.style_id = \"$id\")");
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

	function removeMaterial(){
		$materialId = $this->input->get("id");
		$styleId = $this->input->get("style");
		$this->load->model("ViewBomModel");
		$this->ViewBomModel->remove($materialId,$styleId);
		redirect("ViewBomController/viewBom?id=".$styleId);
	}

}
