<?php $this->load->view('beautyplus/header'); ?>
<style type="text/css">
	textarea{
		resize: none;
		overflow-y: scroll;
		height: 100px !important;
	}
	input[type='number']{
		text-align: right;
	}
</style>

	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Order Something?</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <form id="form1" name="form1" action="<?=site_url('shop/saveOrder')?>" method="post" enctype="multipart/form-data">
            <div class="row">
            	<div class="col-lg-6 col-sm-12">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            Customer Panel
                        </div>
                        <div class="panel-body">
                            <label for="customer-code">Code - Name</label>
                            <?=form_dropdown("kode_customer",$customer,"","id='customer-code' class='form-control'")?>

							<label for="telepon">No Telp</label>
							<?php
								$telepon = array("name" => "Customer[telepon]",
												"id" => "telepon",
												"class" => "form-control",
												"type" => "text",
												"disabled" => "true"
											);
								echo form_input($telepon);
							?>

							<label for="alamat">Address</label>
							<?php
								$alamat = array("name" => "Customer[alamat]",
												"id" => "alamat",
												"class" => "form-control",
												"disabled" => "true",
											);
								echo form_textarea($alamat);
							?>

							<label for="email">Email</label>
							<?php
								$email = array("name" => "Customer[email]",
												"id" => "email",
												"class" => "form-control",
												"type" => "email",
												"disabled" => "true"
											);
								echo form_input($email);
							?>
                        </div>
                        <div class="panel-footer">
                            Customer Panel
                        </div>
                    </div>
                    <!-- /.col-lg-4 -->
                </div>

                <div class="col-lg-6 col-sm-12">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            Capster Panel
                        </div>
                        <div class="panel-body">
                            <label for="capster-code">Capster Code</label>
                            <?=form_dropdown("kode_capster",$capster,"","id='capster-code' class='form-control'")?>

							<label for="kontak">Contact</label>
							<?php
								$kontak = array("name" => "Capster[kontak]",
												"id" => "kontak",
												"class" => "form-control",
												"type" => "text",
												"disabled" => "true"
											);
								echo form_input($kontak);
							?>
                        </div>
                        <div class="panel-footer">
                            Capster Panel
                        </div>
                    </div>
                    <!-- /.col-lg-4 -->
                </div>
            </div>

            <div class="row">
            	<div class="col-lg-12">
            		<div class="panel panel-primary">
            			<div class="panel panel-heading">
            				<a class="btn btn-default" id="addrow"><i class="fa fa-plus"></i> Add Row</a>
            			</div>

            			<div class="panel panel-body">
							<table class="table table-responsive table-striped table-condense" id="trans">
								<thead>
									<tr>
										<th>#</th>
										<th>Shop Type</th>
										<th>Cost</th>
										<th>Qty</th>
										<th>Amount</th>
										<th>Action</th>
									</tr>
								</thead>

								<tbody></tbody>

								<tfoot>
									<th colspan="4">Sub Total</th>
									<th><input type="number" name="subtot" id="subtotal" readonly class="form-control"></th>
								</tfoot>
							</table>
							<button type="submit" class="btn btn-success">Order</button>
            			</div>
            		</div>
            	</div>
            </div>
            </form>
	</div>
	<!-- /#page-wrapper -->

<?php $this->load->view('beautyplus/footer'); ?>
<script type="text/javascript">
	$("#addrow").click(function() {
		var counter = $('#trans tr').length - 1;
		var res = counter - 1;
		// alert(res);exit;
		var newRow = null;

		newRow += "<tr>";
			newRow += "<td>" + counter + "</td>"
			newRow += "<td>";
				newRow += "<select class='form-control' id='type_id-"+res+"' name='Detail["+res+"][shop_type]' onchange='getProduct("+res+")'>";
				newRow += "<option disabled selected> - Select Type - </option>";
				<?php foreach ($product as $key) { ?>
					newRow += "<option value = '<?=$key['kode_paket']?>'> <?=$key['nama_paket']?> </option>";
				<?php } ?> 
				newRow += "</select>";
			newRow += "</td>";
			newRow += "<td>";
				newRow += "<input type='number' disabled class='form-control' id='cost-"+res+"' name='Detail["+res+"][cost]'>";
			newRow += "</td>";
			newRow += "<td>";
				newRow += "<input type='number' class='form-control' id='qty-"+res+"' name='Detail["+res+"][qty]' onkeyup='getAmount("+res+")'>";
			newRow += "</td>";
			newRow += "<td>";
				newRow += "<input type='number' disabled class='form-control' id='amount-"+res+"' name='Detail["+res+"][amount]'>";
			newRow += "</td>";
			newRow += "<td>";
				newRow += "<a class='btn btn-danger rowdel' id='delete'><i class='fa fa-trash'></i> Delete</a>";
			newRow += "</td>";
		newRow += "</tr>";

		$('#trans tbody').append(newRow);
		// $(".sel"+counter+"").select2();
		$(".rowdel").click(function() {
			var tr = $(this).parent().parent();
			tr.remove();

			var row = $('#trans tr').length - 3;
			getSubDel(row);
		})
		// return false;
	})
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $("select").select2();
    })

    $("#customer-code").change(function(){
        var kode = $(this).val();
        if (kode == "") {
        	$("#telepon").val("");
			$("#alamat").val("");
			$("#email").val("");
        }
        $.ajax({
        	url : "<?=site_url('shop/getDataCustomer/')?>"+"/"+kode,
        	type : "post",
        	dataType : "json",
        	success : function(data) {
        		$.each(data, function(key, value){
        			$("#telepon").val(value.telepon);
        			$("#alamat").val(value.alamat);
        			$("#email").val(value.email);
        		})
        		// alert(data);
        	}
        })
    })

    $("#capster-code").change(function(){
        var kode = $(this).val();
        if (kode == "") {
        	$("#kontak").val("");
        }
        $.ajax({
        	url : "<?=site_url('shop/getDataCapster/')?>"+"/"+kode,
        	type : "post",
        	dataType : "json",
        	success : function(data) {
        		$.each(data, function(key, value){
        			$("#kontak").val(value.kontak);
        		})
        	}
        })
    })

    function getProduct(row) {
    	var code = $("#type_id-"+row).val();
    	$.ajax({
    		url : "<?=site_url('shop/getDataProduct/')?>"+"/"+code,
    		type : "post",
    		dataType : "json",
    		success : function(data) {
    			$("#cost-"+row).val(data[0].harga);
    		}
    	})

    	getAmount(row);
    }

	function getAmount(row) {
		var cost = $("#cost-"+row).val();
		var qty = $("#qty-"+row).val();
		var amount = cost * qty;
		$("#amount-"+row).val(amount);

		var j = 0;
		var k = 0;
		for (var i = 0; i <= row; i++) {
			k = Number($("#amount-"+i).val());
			j += k;
		}
		$("#subtotal").val(j);
	}

	function getSubDel(row) {
		// alert(row);
		var j = 0;
		var k = 0;
		for (var i = 0; i <= row; i++) {
			k = Number($("#amount-"+i).val());
			j += k;
		}
		$("#subtotal").val(j);
	}

	function reload() {
		$("form")[0].reset();
	}
</script>