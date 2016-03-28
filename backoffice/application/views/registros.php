<div id="page-wrapper">

		<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $titulo; ?></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>ID Facebook</th>
                                            <th>Nombre</th>
                                            <th>Origen</th>
                                            <th>fecha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($registros as $key): ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $key->reg_id; ?></td>
                                            <td><?php echo $key->reg_id_facebook; ?></td>
                                            <td><?php echo $key->reg_nombre; ?></td>
                                            <td class="center" ><?php echo $key->reg_origen; ?></td>
                                            <td><?php echo $key->reg_fecha; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

  		</div>
        <!-- /#page-wrapper -->         