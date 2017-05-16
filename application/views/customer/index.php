<?php $this->load->view('beautyplus/header'); ?>
<body>
    
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Customer's Master</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel panel-heading">
                        <a href="<?=site_url('customer/register')?>" class="btn btn-primary">Add New Customer</a>
                    </div>
                    <div class="panel panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Customer Code</th>
                                    <th>Customer Name</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1;foreach ($customer as $key) { ?>
                                <tr class="gradeX">
                                    <td><?=$no?></td>
                                    <td><?=$key['kode']?></td>
                                    <td><?=$key['nama']?></td>
                                    <td><?=$key['telepon']?></td>
                                    <td><?=$key['email']?></td>
                                    <td><?=$key['alamat']?></td>
                                    <td>
                                        <?=anchor('customer/edit/'.$key['id'],'Edit')?> | 
                                        <?=anchor('customer/delete/tb_customer/id/'.$key['id'],'Delete',array('onclick'=>"return confirm('Do you really want to delete this?')"));?>
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