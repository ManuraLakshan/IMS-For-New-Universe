<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bom_report extends CI_Controller {

	function __construct(){
			parent ::__construct();
			$this->load->library('pdf');
	}

	public function Genatate_report($id){
		
		
		$date = date('Y-m-d');
		$data=$date."<br>";
		$bom_info=$this->db->query("SELECT bom_id,item_code,material_description,color,size,waste,moq,required_qty FROM bom_details,material WHERE material_id=item_code AND bom_id='$id'");
		$rec = $bom_info->result();
		$data .=

		"<html> 
		Bom ID $id
		
		<head>
		<style>
		table {
		  font-family: arial, sans-serif;
		  border-collapse: collapse;
		  width: 100%;
		}
		
		td, th {
		  border: 1px solid #dddddd;
		  text-align: left;
		  padding: 8px;
		}
		
		tr:nth-child(even) {
		  background-color: #dddddd;
		}
		</style>
		</head>
		<body>
		
		<hr>
		<h1 style = 'margin-bottom : -5'> <center>New Univers</h1>
		<h2> <center>BOM Sheet</h2>
		<hr>
		
		<table>
		  <tr>
			<th>CODE</th>
			<th>Material
			Description</th>
			<th>Color</th>
			<th>Size</th>
			<th>Waste%</th>
			<th>MOQ</th>
			<th>Required Qty</th>

		  </tr>";

		 foreach($rec as $record):
			$data = $data . "<tr >
			  <td>" . $record->item_code . "</td>
			  <td>" . $record->material_description . "</td>
			  <td>" . $record->color . "</td>
			  <td>" . $record->size . "</td>
			  <td>" . $record->waste . "%" . "</td>
			  <td>" . $record->moq . "</td>
			  <td>" . $record->required_qty . "</td>
			</tr>";				  
			endforeach;
			
		
		$data = $data . "</table>
		
		</body>
		</html>";
		
		$data = $data . "</table>";
		$this->pdf->loadHtml($data);
		$this->pdf->render();
		$this->pdf->stream(""."genatate.pdf",array("Atachment"=> 0));

	}
}