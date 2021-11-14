<?php include 'header.php'; ?>
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">MANNAGE MODUL</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                        <ol class="breadcrumb">
                            <li><a href="guru.php">Dashboard</a></li>
                            <li class="active">Manage Modul</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                 <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">MANAGE MODUL</div>
                            <div class="panel-heading"><button style="margin-right:20px;" class="btn btn-info" data-toggle="modal" data-target="#tambah_modul">Tambah Modul
                            </button>
                            <?php 
                                if($_SESSION['status'] == "admin"){
                            ?>
                            <a class="btn btn-success" href="report/lap_modul.php" target="_blank">Laporan Modul
                            </a>
                            <?php }else{} ?> 
                            </div>
                            <div class="modal fade" id="tambah_modul" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                <form action="../function/f_tambah_modul.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="exampleModalLabel1">Tambah Modul</h4> 
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label class="control-label">Keterangan:</label>
                                                <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'] ?>"> 
                                                <input type="text" name="keterangan" class="form-control"> 
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
                                            <div class="form-group">
                                                <label class="control-label">File:</label>
                                                <input type="file" name="modul" class="form-control"> 
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
                                            <th>KETERANGAN</th>
                                            <th>KELAS</th>
                                            <th>NAMA GURU</th>
                                            <th width="300">MANAGE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        include '../config.php'; 

                                          $q = "select * from tbl_modul";
                                          $ex = mysqli_query($koneksi,$q);
                                          $a = 1;
                                          while ($r = mysqli_fetch_array($ex)) {
                                         ?>
                                        <tr>
                                            <td class="text-center"><?php echo $a; ?></td>
                                            <td><?php echo $r['keterangan']; ?></td>
                                            <td><?php echo $r['kelas']; ?></td>
                                            <td><?php echo $r['id_user']; ?></td>
                                            <td>
                                                <a href="../function/f_delete_modul.php?id_modul=<?php echo $r['id_modul']; ?>&&file=<?php echo $r['modul'] ?>"><button type="button" class="btn btn-danger btn-outline btn-circle btn-lg m-r-5"><i class="ti-trash"></i></button></a>
                                                <a href="<?php echo "modul/$r[modul]" ?>"><button type="button" class="btn btn-success btn-outline btn-circle btn-lg m-r-5"><i class="ti-download"></i></button></a>
                                            </td>
                                        </tr>
                                        <?php $a = $a +1; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by themedesigner.in </footer>
        </div>
        <!-- ============================================================== -->
<?php include 'footer.php'; ?>
