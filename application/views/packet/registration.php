<?php
    $this->load->view('beautyplus/header');
    //Buat Kode Otomatis
    foreach ($code as $key) {
        //Ambil Kode
        $kodeawal = $key['kode_paket'];
    }
    //Ambil angka pada kode
    $angka = (int)substr($kodeawal, 3,3)+1;
    //Kondisikan kode
    if ($angka<10) {
        $kodenya = "PC-00".$angka;
    }
    elseif ($angka>9) {
        $kodenya = "PC-0".$angka;
    }
    elseif ($angka>99) {
        $kodenya = "PC-".$angka;   
    }
    else{
        $kodenya = "PC-001";
    }
?>
<body>

    <div id="page-wrapper">

        <?=form_open_multipart('packet/create',"class=mainForm")?>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Register New Packet</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <label for="kode">Packet Code</label>
                </div>
                <div class="col-lg-9 col-xs-12">
                    <input type="text" name="kode" id="kode" class="form-control" value="<?=$kodenya?>" required readonly>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <label for="nama">Packet Name</label>
                </div>
                <div class="col-lg-9 col-xs-12">
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Full Name" required>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <label for="deskripsi">Description</label>
                </div>
                <div class="col-lg-9 col-xs-12">
                    <textarea name="deskripsi" id="deskripsi" class="form-control" required style="resize: none;" required></textarea>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <label for="harga">Price</label>
                </div>
                <div class="col-lg-9 col-xs-12">
                    <input type="number" id="harga" name="harga" class="form-control" maxlength="15" placeholder="Price" required>
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
                        <option value="product"> Product </option>
                        <option value="service"> Service </option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-xs-12">
                    <label for="stok">Stock of Item</label>
                </div>
                <div class="col-lg-9 col-xs-12">
                    <input type="number" maxlength="10" class="form-control" placeholder="Stock" required>
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
                <input type="submit" value="Submit Form" class="btn btn-success">
                <a class="btn btn-danger" href="<?=site_url('packet')?>">Cancel</a>
            </div>
        </div>
         <div class="fix"></div>
                <?=form_close()?>
            </div>
            <div class="fix"></div>
        </div>
<?php $this->load->view('beautyplus/footer'); ?>