<?php $this->load->view('beautyplus/header'); ?>
<body>

    <div id="page-wrapper">
         <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Capster</h1>
            </div>
        </div>

        <?php foreach ($capsterData as $key) { ?>
        <?php echo form_open("capster/update/$key[id]")?>

        <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <label for="kode">Capster Code</label>
            </div>
            <div class="col-lg-9 col-xs-12">
                <?php
                    $capstercode = array(
                        'name' => "Capster[kode]", 
                        'id' => "kode",
                        'type' => "text",
                        "placeholder" => "Capster Unique Code",
                        "value" => "$key[kode]",
                        "readonly" => "true",
                        "required" => 'true',
                        "class" => "form-control"
                    );
                    echo form_input($capstercode);
                ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <label for="nama">Capster Name</label>
            </div>
            <div class="col-lg-9 col-xs-12">
                <?php
                    $capstername = array(
                        'name' => "Capster[nama]", 
                        'id' => "nama",
                        'type' => "text",
                        "placeholder" => 'Full Name',
                        "value" => "$key[nama]",
                        "required" => 'true',
                        "class" => "form-control"
                    );
                    echo form_input($capstername);
                ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <label for="salary">Salary</label>
            </div>
            <div class="col-lg-9 col-xs-12">
                <?php
                    $capstersalary = array(
                        'name' => "Capster[salary]", 
                        'id' => "salary",
                        'type' => "number",
                        "placeholder" => "0000",
                        "value" => "$key[salary]",
                        "required" => 'true',
                        "class" => "form-control"
                    );
                    echo form_input($capstersalary);
                ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <label for="kontak">Contact</label>
            </div>
            <div class="col-lg-9 col-xs-12">
                <?php
                    $capstercontact = array(
                        'name' => "Capster[kontak]", 
                        'id' => "kontak",
                        'type' => "text",
                        "placeholder" => 'Active Phone Number',
                        "value" => "$key[kontak]",
                        "required" => 'true',
                        "class" => "form-control"
                    );
                    echo form_input($capstercontact);
                ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <input type="submit" value="Update Form" class="btn btn-success">
                <a class="btn btn-danger" href="<?=site_url('capster')?>">Cancel</a>
            </div>
        </div>

        <?=form_close()?>
        <?php } ?>

    </div>
                    </div>
                    <input type="submit" value="Update Form" class="basicBtn submitForm mb22">
                    <div class="fix"></div>
                </div>
            </fieldset>
    </div>
    <div class="fix"></div>
</div>
<?php $this->load->view('beautyplus/footer'); ?>