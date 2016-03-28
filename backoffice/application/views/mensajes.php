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
                                <table class="table table-striped table-bordered table-hover" id="dataTables-mensajes">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Texto</th>
                                            <th>Nombre</th>
                                            <th>Origen</th>
                                            <th>fecha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($mensajes as $key): ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $key->soc_id; ?></td>
                                            <td>
                                                <?php
                                                    if( $key->soc_origen=="tw" || $key->soc_origen=="inst" )
                                                    {
                                                        echo $key->soc_texto; 
                                                    }else{
                                                        echo $key->soc_mensaje;     
                                                    }                                                    
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    if( $key->soc_origen=="tw" || $key->soc_origen=="inst" )
                                                    {
                                                        echo $key->soc_usuario." - ".$key->soc_nombre_usuario;     
                                                    }else{
                                                        echo $key->soc_nombre; 
                                                    }
                                                    
                                                ?>
                                            </td>
                                            <td class="center" >
                                                <?php 
                                                    if( $key->soc_origen=="inst" )
                                                    { 
                                                        echo "Instagram"; 
                                                    } 
                                                    if( $key->soc_origen=="tw" )
                                                    { 
                                                        echo "Twitter"; 
                                                    }   
                                                    if( $key->soc_origen=="web" )
                                                    { 
                                                        echo "Web"; 
                                                    }     
                                                    if( $key->soc_origen=="mobile" )
                                                    { 
                                                        echo "Mobile"; 
                                                    }                                                                                                                                                              
                                                ?>
                                            </td>
                                            <td><?php echo $key->soc_fecha; ?></td>
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