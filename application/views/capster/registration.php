<?php
    $this->load->view('beautyplus/header');

    //Buat Kode Otomatis
    foreach ($code as $key) {
        //Ambil Kode
        $kodeawal = $key['kode'];
    }
    //Ambil angka pada kode
    $angka = (int)substr($kodeawal, 3,3)+1;
    //Kondisikan kode
    if ($angka<10) {
        $kodenya = "CP-00".$angka;
    }
    elseif ($angka>9) {
        $kodenya = "CP-0".$angka;
    }
    elseif ($angka>99) {
        $kodenya = "CP-".$angka;   
    }
    else{
        $kodenya = "CP-001";
    }
?>
<body>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Register New Capster</h1>
            </div>
        </div>

        <!-- Form Start -->
        <?=form_open('capster/create',"class=form-group")?>
        <div class="row">
            <div class="col-lg-3">
                <label for="kode">Capster Code</label>
            </div>
            <div class="col-lg-9">
                <?php
                    $capstercode = array(
                        'name' => "Capster[kode]", 
                        'id' => "kode",
                        'type' => "text",
                        "placeholder" => "Capster Unique Code",
                        "value" => $kodenya,
                        "required" => 'true',
                        "readonly" => 'true',
                        "class" => 'form-control'
                    );
                    echo form_input($capstercode);
                ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-3">
                <label for="nama">Capster Name</label>
            </div>
            <div class="col-lg-9">
                <?php
                    $capstername = array(
                        'name' => "Capster[nama]", 
                        'id' => "nama",
                        'type' => "text",
                        "placeholder" => 'Full Name',
                        "required" => 'true',
                        "class" => 'form-control'
                    );
                    echo form_input($capstername);
                ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-3">
                <label for="salary">Salary</label>
            </div>
            <div class="col-lg-9">
                <?php
                    $capstersalary = array(
                        'name' => "Capster[salary]", 
                        'id' => "salary",
                        'type' => "number",
                        "placeholder" => '0000',
                        "required" => 'true',
                        "class" => 'form-control'
                    );
                    echo form_input($capstersalary);
                ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-3">
                <label for="kontak">Contact</label>
            </div>
            <div class="col-lg-9">
                <?php
                    $capstercontact = array(
                        'name' => "Capster[kontak]", 
                        'id' => "kontak",
                        'type' => "text",
                        "placeholder" => 'Active Phone Number',
                        "required" => 'true',
                        "class" => 'form-control'
                    );
                    echo form_input($capstercontact);
                ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <input type="submit" value="Submit form" class="btn btn-success">
            </div>
        </div>
        <?=form_close()?>
        <!-- Form End -->
    </div>
</div>
<?php $this->load->view('beautyplus/footer'); ?>