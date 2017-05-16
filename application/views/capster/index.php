<?php $this->load->view('beautyplus/header'); ?>
<body>
    
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Capster's Master</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel panel-heading">
                        <a href="<?=site_url('capster/register')?>" class="btn btn-primary">Add New Capster</a>
                    </div>
                    <div class="panel panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Capster Code</th>
                                    <th>Capster Name</th>
                                    <th>Capster Salary</th>
                                    <th>Capster Contact</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Capster Code</th>
                                    <th>Capster Name</th>
                                    <th>Capster Salary</th>
                                    <th>Capster Contact</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $no=1;foreach ($capster as $key) { ?>
                                <tr class="gradeX">
                                    <td><?=$no?></td>
                                    <td><?=$key['kode']?></td>
                                    <td><?=$key['nama']?></td>
                                    <td align="right"><?='IDR '.number_format($key['salary'], 0 , '' , '.')?></td>
                                    <td><?=$key['kontak']?></td>
                                    <td>
                                        <?=anchor('capster/edit/'.$key['id'],'Edit')?> | 
                                        <?=anchor('capster/delete/tb_capster/id/'.$key['id'],'Delete',array('onclick'=>"return confirm('Do you really want to delete this?')"));?>
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
        </div>
    </div>
    <div class="fix"></div>
</div>
<?php $this->load->view('beautyplus/footer'); ?>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>