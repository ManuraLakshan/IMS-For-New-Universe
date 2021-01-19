<?php include 'Partials/header.php' ?>



<div class="container-fluid mt-3 w-100">

	<?php if($this->uri->segment(2) == "inserted") {
		?>
		<div class="alert alert-success alert-dismissible fade show hideEle" role="alert">
			New Style Added
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<script>
			setTimeout(()=>{
				let ele = document.querySelector('.hideEle');
				ele.style.display = "none";
			},5000);
		</script>
	<?php } elseif($this->uri->segment(2) == "updated"){?>
		<div class="alert alert-warning alert-dismissible fade show hideEle" role="alert">
			Style details updated!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<script>
			setTimeout(()=>{
				let ele = document.querySelector('.hideEle');
				ele.style.display = "none";
			},5000);
		</script>
	<?php } elseif($this->uri->segment(2) == "alreadyExcites"){?>
		<div class="alert alert-danger alert-dismissible fade show hideEle" role="alert">
			Style is already excites with a different style name!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<script>
			setTimeout(()=>{
				let ele = document.querySelector('.hideEle');
				ele.style.display = "none";
			},5000);
		</script>
	<?php }?>
		<div class="card">
			<div class="card-header">
				<strong>Add BOM</strong>
			</div>
			<form class="m-3" id="formBody" method="post" enctype="multipart/form-data" action="<?php base_url("index.php/AddBomController/addBomToDatabase");?>">
            
                <div class="row form-group">
                    <div class="col-12 col-md-2">
                    <input type="text" class ="form-control my-2" name="style" id="style"  placeholder= "Style ID">
                    <span class="text-danger"><?php echo form_error('style'); ?></span>
                    </div>
                    <div class="col-12 col-md-3">
                    <input type="text" class ="form-control my-2" name="styleName" id="styleName"  placeholder= "Style Name">
                    <span class="text-danger"><?php echo form_error('styleName'); ?></span>
                    </div>
                    <div class="col-12 col-md-2">
                    <input type="number" class ="form-control my-2" name="pieces" id="pieces"  placeholder= "Number of Pieces" min=0>
                    <span class="text-danger"><?php echo form_error('pieces'); ?></span>
                    </div>
					<div class="col-12 col-md-2">
						<input type="date" class ="form-control my-2" name="dueDate" id="dueDate"  placeholder= "Due Date" min=0>
						<span class="text-danger"><?php echo form_error('dueDate'); ?></span>
					</div>
                </div>

                <div class="table-responsive">
                    <table id="autocomplete_table" class="table table-hover autocomplete_table">
                        
                        <thead class="thead-light">
                            <tr>

                                <th scope = "col">Item code</th>
                                <th scope = "col">Unit</th>
                                <th scope = "col"> Waste %</th>
                                <th scope = "col"> MOQ</th>
                                <th scope = "col">Required Qty</th>
                                <th scope = "col">Remove</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                        <tr id="row_1">

                            <td>
                                <input type="text" class ="form-control" name="itemCode[]" id="itemCode_1">
                                <span class="text-danger"><?php echo form_error('itemCode[]'); ?></span>
                            </td>
                            <td>
                                <select type="text" class ="form-control" name="unit[]" id="unit_1">
                                    <option value="0">N/A</option>  
                                    <option value="PCs">PCs</option>
                                    <option value="Meters">Meters</option>
                                    <option value="CONS5000">CONS5000</option>
                                    <option value="Nos">Nos</option>
                                </select>
                                <span class="text-danger"><?php echo form_error('unit[]'); ?></span>
                            </td>
                            <td>
                                <input type="number" class ="form-control" name="waste[]" id="waste_1" min = 0>
                                <span class="text-danger"><?php echo form_error('waste[]'); ?></span>
                            </td>
                            <td>
                                <input type="number" class ="form-control" name="moq[]" id="moq_1" min=0>
                                <span class="text-danger"><?php echo form_error('moq[]'); ?></span>
                            </td>
                            <td>
                                <input type="number" class ="form-control" name="requiredQty[]" id="requiredQty_1" min=0>
                                <span class="text-danger"><?php echo form_error('requiredQty[]'); ?></span>
                            </td>
							<td style = "display: none;">
								<input type="text" class ="form-control my-2 hidden-item-style" name="styleId[]" id="styleId_1">
							</td>
                            <td>
                                <input type="button" class ="btn btn-danger rounded remove-btn" name="" id="removeBtn_1" value = "remove">
                            </td>

                        </tr>
                        </tbody>
                    </table>
                    <div class="btn-container">

                            <input type="submit" class= "btn btn-dark rounded" value="Submit">
							<input type="button" class= "btn btn-info rounded" value="Add Record" id="addBtn">
							<input type="reset" class= "btn btn-warning rounded" value="Reset">
                    </div>
                </div>
			</form>
		</div>

	</div>

<?php //var_dump($details);?>

<script>

$(document).ready(function(){

let addBtn, rowcount, tableBody;

addBtn = $("#addBtn");
rowcount = $("#autocomplete_table tbody tr").length + 1;
tableBody = $("#autocomplete_table tbody");

function formHtml(){
    html = ` <tr id="row_${rowcount}">

                            <td>
                                <input type="text" class ="form-control" name="itemCode[]" id="itemCode_${rowcount}">
                                <span class="text-danger"><?php echo form_error('itemCode[]'); ?></span>
                            </td>
                            <td>
                                <select type="text" class ="form-control" name="unit[]" id="unit_${rowcount}">
                                    <option value="0">N/A</option>
                                    <option value="PCs">PCs</option>
                                    <option value="Meters">Meters</option>
                                    <option value="CONS5000">CONS5000</option>
                                    <option value="Nos">Nos</option>
                                </select>
                                <span class="text-danger"><?php echo form_error('unit[]'); ?></span>
                            </td>
                            <td>
                                <input type="number" class ="form-control" name="waste[]" id="waste_${rowcount}" min = 0>
                                <span class="text-danger"><?php echo form_error('waste[]'); ?></span>
                            </td>
                            <td>
                                <input type="number" class ="form-control" name="moq[]" id="moq_${rowcount}" min=0>
                                <span class="text-danger"><?php echo form_error('moq[]'); ?></span>
                            </td>
                            <td>
                                <input type="number" class ="form-control" name="requiredQty[]" id="requiredQty_${rowcount}" min=0>
                                <span class="text-danger"><?php echo form_error('requiredQty[]'); ?></span>
                            </td>
                            <td style = "display: none;">
								<input type="text" class ="form-control my-2 hidden-item-style" name="styleId[]" id="styleId_${rowcount}">
							</td>
                            <td>
                                <input type="button" class ="btn btn-danger rounded remove-btn" name="" id="removeBtn_${rowcount}" value = "remove">
                            </td>

                        </tr>`;

rowcount++;
return html;
}

function addNewRow(){
    let html = formHtml();
     
    tableBody.append(html);
}

function deleteRow(){
    let id,rowNo,idArr;
    id = $(this).attr('id');
    idArr = id.split('_');
    rowNo = idArr[idArr.length - 1];
    if(rowNo != 1){
		$("#row_"+rowNo).remove();
	}
}


function handleAutocomplete(){

			let currentElement = $(this);
			

			$("#style").autocomplete({
				source: function(data, cb){
                    $.ajax({
						url: "<?php echo base_url("index.php/AddBomController/getStyleDetails");?>",
						method: 'GET',
						dataType: 'json',
						data: {
							value: data.term,
						},
						success: function (res){

							let result = [
								{
									label: "There is no record related to " + data.term,
									value: '',
								}
							];
                           
							if(res.length){
								result = $.map(res[1], function (obj){

									return {
										label: obj['style_id'],
										value: obj['style_id'],
										data: res
									}
								});
							}
                            // console.log(result);
							cb(result);

						}

					});
                },
                select: function (event,selectData){
					if(selectData && selectData.item && selectData.item.data){
						// console.log(selectData.item.label);
						let data = selectData.item.data;
						let items = [];
						$('#styleName').val(data[1][0].style_name);
						$('#pieces').val(data[1][0].num_of_pieces);
						$('#dueDate').val(data[1][0].due_date);


						for (let i = 0; i < data[0].length; i++)
						{
							if(selectData.item.label == data[0][i].style_id){
								items.push(data[0][i]);
							}

						}

						for (let i = 0; i < items.length; i++)
						{
								if( i!== 0){
									addNewRow();
								}


								$('#itemCode_'+(i+1)).val(items[i].material_id);
								$('#unit_'+(i+1)).val(items[i].unit);
								$('#waste_'+(i+1)).val(parseInt(items[i].waste));
								$('#moq_'+(i+1)).val(parseInt(items[i].moq));
								$('#requiredQty_'+(i+1)).val(parseInt(items[i].required_qty));


						}


					}
				}
					
			});

           
}

function getStyleValue(){
    let value = $('#style').val();
    $('.hidden-item-style').val(value);
}

function registerEvents(){
    addBtn.on("click", addNewRow);
    $(document).on("click",".remove-btn",deleteRow);
    $(document).on("focus","#style",handleAutocomplete);
    addBtn.on("click",getStyleValue)
}

registerEvents();



});



</script>

<?php include 'Partials/footer.php' ?>
