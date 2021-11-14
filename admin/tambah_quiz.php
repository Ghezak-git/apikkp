<?php include 'header.php'; ?>
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Manage Pelajaran</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                        <ol class="breadcrumb">
                            <li><a href="guru.php">Dashboard</a></li>
                            <li class="active">Manage Pelajaran</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">MANAGE PELAJARAN</div>
                            <div class="panel-heading"><button style="margin-right:20px;" class="btn btn-info" data-toggle="modal" data-target="#tambah_pelajaran">Tambah Pelajaran
                            </button><a class="btn btn-success" href ="report/lap_pelajaran.php" target="_blank">Laporan Pelajaran</a>
                            </a></div>
                            <div class="modal fade" id="tambah_pelajaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                <form action="../function/f_tambah_quiz.php" method="POST" >
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="exampleModalLabel1">Tambah User</h4> </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="control-label">Keterangan:</label>
                                                    <input type="text" name="nama" class="form-control"> 
                                                    <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'] ?>" class="form-control"> 
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Kelas:</label>
                                                    <select class="form-control" name="kelas">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                    </select>
                                                </div>
                                            </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover manage-u-table">
                                    <thead>
                                        <tr>
                                            <th width="70" class="text-center">#</th>
                                            <th>KTERANGAN</th>
                                            <th>KELAS</th>
                                            <th width="300">MANAGE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php 
										  include '../config.php'; 
                                          $id_user_g = $_SESSION['id_user'];
										  $q = "select * from tbl_quiz where id_user='$id_user_g'";
										  $ex = mysqli_query($koneksi,$q);
										  $a = 1;
										  while ($r = mysqli_fetch_array($ex)) {
                                    	 ?>
                                        <tr>
                                        	<td class="text-center"><?php echo $a; ?></td>
                                            <td><?php echo $r['nama']; ?></td>
                                            <td><?php echo $r['kelas']; ?></td>
                                            <td>
                                                <a href="tambah_soal.php?id_quiz=<?php echo $r['id_quiz'] ?>"><button type="button" class="btn btn-success btn-outline btn-circle btn-lg m-r-5"><i class="ti-eye"></i></button></a>
                                            	<button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5" data-toggle="modal" data-target="#edit_quiz<?php echo $r['id_quiz']; ?>"><i class="ti-pencil-alt"></i></button>
                                                <a href="../function/f_delete_quiz.php?id_quiz=<?php echo $r['id_quiz']; ?>"><button type="button" class="btn btn-danger btn-outline btn-circle btn-lg m-r-5"><i class="ti-trash"></i></button></a>
                                            </td>
                                        </tr>
                                        <div class="modal fade edit_quiz_a" id="edit_quiz<?php echo $r['id_quiz']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                        <form action="../function/f_edit_quiz.php" method="GET" >
                                            <?php
                                                $id = $r['id_quiz']; 
                                                $query_edit = mysqli_query($koneksi,"SELECT * FROM tbl_quiz WHERE id_quiz='$id'");
                                                    while ($row = mysqli_fetch_array($query_edit)) {  
                                        ?>
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="exampleModalLabel1">Edit Quiz</h4> </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label class="control-label">Keterangan:</label>
                                                            <input type="hidden" name="id_quiz" value="<?php echo $r['id_quiz'] ?>" class="form-control"> 
                                                            <input type="text" name="g_nama" value="<?php echo $r['nama'] ?>" class="form-control"> 
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Kelas:</label>
                                                            <select class="form-control" name="g_kelas">
                                                                <option value="0">----</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Edit</button>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        </form>
                                        </div>
                                   		<?php $a = $a +1; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /row -->
                <!-- ============================================================== -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by themedesigner.in </footer>
        </div>
        <!-- ============================================================== -->
<?php include 'footer.php'; ?>
