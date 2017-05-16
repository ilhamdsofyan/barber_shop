<?php $this->load->view('beautyplus/header'); ?>
<body>

    <div id="page-wrapper">

        <?php foreach ($customerData as $key) { ?>
        <?=form_open("customer/update/$key[id]","class=mainForm")?>

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Register New Customer</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <label for="kode">Customer Code</label>
            </div>
            <div class="col-lg-9 col-xs-12">
                <?php
                    $customercode = array(
                        'name' => "Customer[kode]", 
                        'id' => "kode",
                        'type' => "text",
                        "placeholder" => "Customer Code",
                        "required" => "true",
                        "value" => "$key[kode]",
                        "readonly" => "true",
                        "class" => "form-control"
                    );
                    echo form_input($customercode);
                ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <label for="nama">Customer Name</label>
            </div>
            <div class="col-lg-9 col-xs-12">
                <?php
                    $customername = array(
                        'name' => "Customer[nama]", 
                        'id' => "nama",
                        'type' => "text",
                        "placeholder" => "Full Name",
                        "required" => "true",
                        "value" => "$key[nama]",
                        "class" => "form-control"
                    );
                    echo form_input($customername);
                ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <label for="telepon">Phone Number</label>
            </div>
            <div class="col-lg-9 col-xs-12">
                <?php
                    $customertelepon = array(
                        'name' => "Customer[telepon]", 
                        'id' => "telepon",
                        'type' => "text",
                        "placeholder" => "Phone Number",
                        "required" => "true",
                        "value" => "$key[telepon]",
                        "class" => "form-control"
                    );
                    echo form_input($customertelepon);
                ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <label for="email">Email</label>
            </div>
            <div class="col-lg-9 col-xs-12">
                <?php
                    $customeremail = array(
                        'name' => "Customer[email]", 
                        'id' => "email",
                        'type' => "email",
                        "placeholder" => "example@domain.com",
                        "required" => "true",
                        "value" => "$key[email]",
                        "class" => "form-control"
                    );
                    echo form_input($customeremail);
                ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <label for="alamat">Address</label>
            </div>
            <div class="col-lg-9 col-xs-12">
                <?php
                    $customertext = array(
                        'name' => "Customer[alamat]", 
                        'id' => "alamat",
                        "required" => "true",
                        "value" => "$key[alamat]",
                        "style" => "resize:none",
                        "class" => "form-control"
                    );
                    echo form_textarea($customertext);
                ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <input type="submit" value="Update Form" class="btn btn-success">
                <a class="btn btn-danger" href="<?=site_url('customer')?>">Cancel</a>
            </div>
        </div>
        <?=form_close()?>
        <?php } ?>
    </div>
    <div class="fix"></div>
</div>
<?php $this->load->view('beautyplus/footer'); ?>