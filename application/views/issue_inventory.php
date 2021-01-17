<?php include 'Partials/header.php' ?>


<input type="hidden" id="base_path" value="<?php echo base_url(); ?>">

	<div class="container-fluid mt-3 w-100">
		<div class="card">
			<div class="card-header">
				<strong>Issue Materials</strong>
			</div>
			<form class="m-3" id="formBody" method="post" enctype="multipart/form-data">
				<div class="form-row mb-2 " id="row_1">
					<div class="col-1">
						<input type="text" data-field-name= "material_id" class="form-control autocomplete_txt" placeholder="Material ID" id="materialId_1" name="materialId[]">
					</div>
					<div class="col">
						<input type="text" data-field-name= "material_description" class="form-control autocomplete_txt" placeholder="Description" id="materialDesc_1" name="materialDesc[]">
					</div>
					<div class="col-1">
						<input type="text" data-field-name= "material_name" class="form-control autocomplete_txt" placeholder="Type" id="materialType_1" name="materialType[]">
					</div>
					<div class="col-1">
						<input type="text" data-field-name= "color" class="form-control autocomplete_txt" placeholder="Color" id="materialColor_1" name="materialColor[]">
					</div>
					<div class="col-1">
						<input type="Number" class="form-control" placeholder="Quantity" id="materialQty"_1 name="materialQty">
					</div>
					<div class="col-1">
						<button class="btn btn-danger rounded mx-2 form-control delete_row " id="delete" type="button">Remove</button>
					</div>
				</div>

				<div class="form-row mt-3" id="commandButtons">
					<button class="btn btn-success btn rounded ml-1 " id="addNew" type="button">Add Record</button>
					<button class="btn btn-warning btn rounded ml-1" id="issueMaterial" name="issueMaterial" type="submit">Issue Materials</button>
				</div>
			</form>
		</div>

	</div>




<script>
	$(document).ready(function (){
		let addBtn,rowcount,formBody,basepath;
		addBtn = $('#addNew');
		rowcount = $('#formBody').length+1;
		formBody = $('#formBody');
		basepath = $('#base_path').val();

		function formHtml(){
			let html;
			html = `<div class="form-row mb-2" id="row_${rowcount}">
					\t\t\t\t<div class="col-1">
					\t\t\t\t\t<input type="text" data-field-name= "material_id" class="form-control autocomplete_txt" placeholder="Material ID" id="materialId_${rowcount}" name="materialId[]">
					\t\t\t\t</div>
					\t\t\t\t<div class="col">
					\t\t\t\t\t<input type="text" data-field-name= "material_description" class="form-control autocomplete_txt" placeholder="Description" id="materialDesc_${rowcount}" name="materialDesc[]">
					\t\t\t\t</div>
					\t\t\t\t<div class="col-1">
					\t\t\t\t\t<input type="text" data-field-name= "material_name" class="form-control autocomplete_txt" placeholder="Type" id="materialType_${rowcount}" name="materialType[]">
					\t\t\t\t</div>
					\t\t\t\t<div class="col-1">
					\t\t\t\t\t<input type="text" data-field-name= "color" class="form-control autocomplete_txt" placeholder="Color" id="materialColor_${rowcount}" name="materialColor[]">
					\t\t\t\t</div>
					\t\t\t\t<div class="col-1">
					\t\t\t\t\t<input type="Number" class="form-control" placeholder="Quantity" id="materialQty_${rowcount}" name="materialQty">
					\t\t\t\t</div>
					\t\t\t\t<div class="col-1">
					\t\t\t\t\t<button class="btn btn-danger rounded mx-2 form-control delete_row" id="delete_${rowcount}" type="button">Remove</button>
					\t\t\t\t</div>
					\t\t\t</div>`;

			rowcount++;
			return html;


		}



		function addNewRow(){
			let html = formHtml();
			$(html).insertBefore('#commandButtons');
		}

		function deleteRow(){
			let id, rowNo, idArr;
			id = $(this).attr('id');
			// console.log(id);
			idArr = id.split("_");
			// console.log(idArr);
			rowNo = idArr[idArr.length - 1];
			// console.log("#row_"+rowNo);
			$("#row_"+rowNo).remove();

		}

		function handleAutoComplete(){
			let type;
			type = $(this).data("field-name");


			let currentElement = $(this);
			console.log(currentElement.attr('id'));

			$("#"+currentElement.attr('id')).autocomplete({
				source: function (data, cb){
					$.ajax({
						url: basepath+"index.php/IssueInventoryController/getMaterials",
						method: 'GET',
						dataType: 'json',
						data: {
							name: data.term,
							fieldName:type
						},
						success: function (res){

							let result = [
								{
									label: "There is no record related to " + data.term,
									value: '',
								}
							];
							if(res.length){
								result = $.map(res, function (obj){

									return {
										label: obj[type],
										value: obj[type],
										data: obj
									}
								});
							}
							cb(result);

						}

					});

				}
			});
		}



		function registerEvents(){
			addBtn.on("click",addNewRow);
			$(document).on("click",'.delete_row',deleteRow);
			$(document).on("focus",'.autocomplete_txt',handleAutoComplete);
		}

		registerEvents();

	});



</script>
<?php include 'Partials/footer.php' ?>
