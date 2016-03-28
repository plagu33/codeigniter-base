<div id="page-wrapper">

		<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $title; ?></h1>
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
                                <table class="table table-striped table-bordered table-hover" id="dataTables-videos">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>ID Facebook</th>
                                            <th>Nombre</th>
                                            <th>Video</th>
                                            <th>Opción</th>
                                            <th>Estado</th>
                                            <th>Fecha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($videos as $key): ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $key->vid_id; ?></td>
                                            <td><?php echo $key->vid_id_facebook; ?></td>
                                            <td><?php echo $key->vid_nombre; ?></td>
                                            <td>                                            
                                                <?php
                                                    echo '<video width="320" height="240" controls src="../uploads/'.$key->vid_nombre_video.'.mp4"></video>'; 
                                                ?>
                                            </td>
                                            <td><?php echo $key->vid_opcion; ?></td>
                                            <td>
                                                <?php 
                                                    if( $key->vid_estado==1 )
                                                    {
                                                        echo '<select name="estado" id="estado" onchange="cambiar_estado('.$key->vid_id.',$(this).val())" >
                                                                    <option value="0" >Despublicado</option>
                                                                    <option value="1" selected >Publicado</option>
                                                              </select>';
                                                    }else{
                                                        echo '<select name="estado" id="estado" >
                                                                    <option value="0" selected >Despublicado</option>
                                                                    <option value="1"  >Publicado</option>
                                                              </select>';                                                        
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $key->vid_fecha; ?></td>
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