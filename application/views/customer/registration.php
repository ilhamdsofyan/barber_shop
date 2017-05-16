<?php
    $this->load->view('beautyplus/header');
     //Buat Kode Otomatis
    foreach ($code as $key) {
        //Ambil Kode
        $kodeawal = $key['kode'];
    }
    //Ambil angka pada kode
    $angka = (int)substr($kodeawal, 2,3)+1;
    //Kondisikan kode
    if ($angka<10) {
        $kodenya = "C-00".$angka;
    }
    elseif ($angka>9) {
        $kodenya = "C-0".$angka;
    }
    elseif ($angka>99) {
        $kodenya = "C-".$angka;   
    }
    else{
        $kodenya = "C-001";
    }
?>
<body>

    <div id="page-wrapper">
         <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Register New Customer</h1>
            </div>
        </div>

        <?=form_open('customer/create',"class=form-group")?>
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
                        "placeholder" => 'Customer Unique Code',
                        "required" => 'true',
                        "value" => $kodenya,
                        "readonly" => 'true',
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
                        "placeholder" => 'Full Name',
                        "required" => 'true',
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
                    $customerphone = array(
                        'name' => "Customer[telepon]",
                        'id' => "telepon",
                        'type' => "text",
                        "placeholder" => 'Phone Number',
                        "required" => 'true',
                        "class" => "form-control"
                    );
                    echo form_input($customerphone);
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
                        "placeholder" => 'Email Address',
                        "required" => 'true',
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
                <input type="submit" value="Submit Form" class="btn btn-success">
                <a class="btn btn-danger" href="<?=site_url('customer')?>">Cancel</a>
            </div>
        </div>
    </div>
                    
                    
                    <div class="fix"></div>
                </div>
            </fieldset>
        <?=form_close()?>
    </div>
    <div class="fix"></div>
</div>
<?php $this->load->view('beautyplus/footer'); ?>