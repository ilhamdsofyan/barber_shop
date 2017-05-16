<?php $this->load->view('beautyplus/header'); ?>
<style type="text/css">
    td{
        vertical-align: middle;
    }
</style>
<body>
    
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Packet's Master</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel panel-heading">
                        <a href="<?=site_url('packet/register')?>" class="btn btn-primary">Add New Packet</a>
                    </div>
                    <div class="panel panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Packet Code</th>
                                    <th>Packet Name</th>
                                    <th width="300px">Description</th>
                                    <th>Price</th>
                                    <th>Type</th>
                                    <th>Preview</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1;foreach ($packet as $key) { ?>
                                <tr class="gradeX">
                                    <td><?=$no;?></td>
                                    <td><?=$key['kode_paket']?></td>
                                    <td><?=$key['nama_paket']?></td>
                                    <td><?=$key['deskripsi']?></td>
                                    <td align="right"><?='IDR '.number_format($key['harga'], 0 , '' , '.')?></td>
                                    <td><?=ucfirst($key['jenis'])?></td>
                                    <td><img src="<?=base_url('assets/images/gambar_paket/'.$key['gambar'].'')?>" width="50px"></td>
                                    <td>
                                        <?=anchor('packet/edit/'.$key['id'],'Edit')?> | 
                                        <?=anchor('packet/delete/'.$key['gambar'].'/id/'.$key['id'],'Delete',array('onclick'=>"return confirm('Do you really want to delete this?')"));?>
                                    </td>
                                </tr>
                                <?php $no++;} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fix"></div>
</div>
<?php $this->load->view('beautyplus/footer'); ?>