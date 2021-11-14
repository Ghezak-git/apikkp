<?php include 'header.php'; ?>
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <?php 
        if ($_SESSION['status'] != "admin") {
            echo "<script>alert('Maaf Anda Bukan Admin');location='javascript:history.go(-1)';</script>";
        }
         ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">TAMBAH SISWA</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Tambah Siswa</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">MANAGE SISWA</div>
                            <div class="panel-heading"><button style="margin-right:10px" class="btn btn-info" data-toggle="modal" data-target="#tambah_siswa">Tambah Siswa
                            </button>
                            <a class="btn btn-success" href="report/lap_siswa.php" target="_blank" >Laporan Siswa
                            </a></div>
                            <div class="modal fade" id="tambah_siswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                <form action="../function/f_tambah_siswa.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="exampleModalLabel1">Tambah Siswa</h4> </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="control-label">NIK Siswa:</label>
                                                    <input type="text" name="nik_siswa" class="form-control"> </div>
                                                <div class="form-group">
                                                    <label class="control-label">Full Name:</label>
                                                    <input type="text" name="fullname" class="form-control"> </div>
                                                <div class="form-group">
                                                    <label class="control-label">Gambar:</label>
                                                    <input type="file" name="gambar" class="form-control"> </div>
                                                <div class="form-group">
                                                    <label class="control-label">Email:</label>
                                                    <input type="email" name="email" class="form-control"> </div>
                                                <div class="form-group">
                                                    <label class="control-label">Password:</label>
                                                    <input type="text" name="password" class="form-control"> </div>
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
                                            <th></th>
                                            <th>NIK SISWA</th>
                                            <th>FULLNAME</th>
                                            <th>EMAIL</th>
                                            <th>KELAS</th>
                                            <th width="300">MANAGE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        include '../config.php'; 

                                          $q = "select * from tbl_siswa order by create_date desc";
                                          $ex = mysqli_query($koneksi,$q);
                                          $a = 1;
                                          while ($r = mysqli_fetch_array($ex)) {
                                         ?>
                                        <tr>
                                            <td class="text-center"><?php echo $a; ?></td>
                                            <td style="width: 80px;"><img src="modul/<?php echo $r['gambar'] ?>" alt="user img" class="img-circle" width="50" height="50" /></td>
                                            <td><?php echo $r['nik_siswa']; ?></td>
                                            <td><?php echo $r['name']; ?></td>
                                            <td><?php echo $r['email']; ?></td>
                                            <td><?php echo $r['kelas']; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5" data-toggle="modal" data-target="#edit_siswa<?php echo $r['id_siswa']; ?>"><i class="ti-pencil-alt"></i></button>
                                                <a href="../function/f_delete_siswa.php?id_siswa=<?php echo $r['id_siswa']; ?>&&file=<?php echo $r['gambar'] ?>"><button type="button" class="btn btn-danger btn-outline btn-circle btn-lg m-r-5"><i class="ti-trash"></i></button></a>
                                                <?php if ($r['status'] == "aktif") { ?>
                                                <a href="../function/f_aktif_siswa.php?id_siswa=<?php echo $r['id_siswa']; ?>&&status=<?php echo $r['status']; ?>"><button type="button" class="btn btn-success btn-outline btn-circle btn-lg m-r-5"><i class="ti-check-box"></i></button></a>
                                                <?php }else{ ?>
                                                <a href="../function/f_aktif_siswa.php?id_siswa=<?php echo $r['id_siswa']; ?>&&status=<?php echo $r['status']; ?>"><button type="button" class="btn btn-danger btn-outline btn-circle btn-lg m-r-5"><i class="ti-check-box"></i></button></a>
                                                <?php } ?>
                                                
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="edit_siswa<?php echo $r['id_siswa']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="exampleModalLabel1">Edit User</h4> </div>
                                                    <div class="modal-body">
                                                    <form action="../function/f_edit_siswa.php" method="post" enctype="multipart/form-data">
                                                        <?php
                                                        $id = $r['id_siswa']; 
                                                        $query_edit = mysqli_query($koneksi,"SELECT * FROM tbl_siswa WHERE id_siswa='$id'");
                                                        while ($row = mysqli_fetch_array($query_edit)) {  
                                                        ?>
                                                        <div class="form-group">
                                                            <label class="control-label">NIK Siswa:</label>
                                                            <input type="hidden" name="id_siswa" value="<?php echo $row['id_siswa'] ?>">
                                                            <input type="text" name="e_nik1_siswa" class="form-control" value="<?php echo $row['nik_siswa'] ?>"> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Full Name:</label>
                                                            <input type="text" name="e_fullname" class="form-control" value="<?php echo $row['name'] ?>"> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Gambar:</label><br>
                                                            <img src="http://gi.yazuha.com/admin/modul/<?php echo $row['gambar']; ?>" style="width: 50px">
                                                            <input type="hidden" name="g_gambar" value="<?php echo $row['gambar']; ?>">
                                                            <input type="file" name="e_gambar" class="form-control"> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Email:</label>
                                                            <input type="text" name="e_email" class="form-control" value="<?php echo $row['email'] ?>"> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Password:</label>
                                                            <input type="text" name="e_password" class="form-control" value="<?php echo $row['password'] ?>"> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Kelas:</label>
                                                            <select class="form-control" name="e_kelas">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                <option value="6">6</option>
                                                            </select>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
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
