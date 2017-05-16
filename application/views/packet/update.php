<?php 
    $this->load->view('beautyplus/header'); 
    $category = ['product','service'];
?>
<body>

    <div id="page-wrapper">
        <div class="row">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Packet</h1>
                </div>
            </div>
        </div>
        
        <?=form_open_multipart('packet/update',"class=mainForm")?>
        <?php foreach ($packetData as $key) { ?>

        <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <label for="nama">Packet Code</label>
            </div>
            <div class="col-lg-9 col-xs-12">
                <input type="text" name="kode" id="kode" class="form-control" value="<?=$key['kode_paket']?>" placeholder="Full Name" required readonly>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <label for="nama">Packet Name</label>
            </div>
            <div class="col-lg-9 col-xs-12">
                <input type="text" name="nama" id="nama" class="form-control" value="<?=$key['nama_paket']?>" placeholder="Full Name" required>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <label for="deskripsi">Description</label>
            </div>
            <div class="col-lg-9 col-xs-12">
                <textarea name="deskripsi" id="deskripsi" class="form-control" required style="resize: none;min-height: 100px" required><?=$key['deskripsi']?></textarea>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <label for="harga">Price</label>
            </div>
            <div class="col-lg-9 col-xs-12">
                <input type="number" id="harga" name="harga" maxlength="15" class="form-control" placeholder="Price" required value="<?=$key['harga']?>">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <label for="jenis">Type</label>
            </div>
            <div class="col-lg-9 col-xs-12">
                <select name="jenis" id="jenis" class="form-control" style="text-align-last:center;" required>
                    <option value="" selected disabled> - Select Type - </option>
                    <?php for ($i=0; $i < count($category); $i++) { ?>
                        <option value="<?=$category[$i]?>" <?php if($category[$i]==$key['jenis']){echo "selected='selected'";} ?> > <?=ucwords($category[$i])?> </option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <label for="gambar">Pictures Now</label>
            </div>
            <div class="col-lg-9 col-xs-12">
                <img src="<?=base_url('assets/images/gambar_paket/'.$key['gambar'].'')?>" width="60px">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <label for="gambar">Picture Upload</label>
            </div>
            <div class="col-lg-9 col-xs-12">
                <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12">
                <input type="submit" value="Update Form" class="btn btn-success">
                <a href="<?=site_url('packet')?>" class="btn btn-danger">Cancel</a>
            </div>
        </div>

        <?php } ?>
        <?=form_close()?>

    </div>
    <div class="fix"></div>
<?php $this->load->view('beautyplus/footer'); ?>