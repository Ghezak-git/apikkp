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
                        <h4 class="page-title">Tambah User</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Tambah User</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">MANAGE USERS</div>
                            <div class="panel-heading"><button style="margin-right:10px" class="btn btn-info" data-toggle="modal" data-target="#tambah_user">Tambah User
                            </button>
                            <a class="btn btn-success"  href="report/lap_user.php" target="_blank">Laporan User
                            </a></div>
                            <div class="modal fade" id="tambah_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                <form action="../function/f_tambah_user.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="exampleModalLabel1">Tambah User</h4> </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="control-label">NIP Guru:</label>
                                                    <input type="text" name="nip_guru" class="form-control"> </div>
                                                <div class="form-group">
                                                    <label class="control-label">Email:</label>
                                                    <input type="text" name="email" class="form-control"> </div>
                                                <div class="form-group">
                                                    <label class="control-label">Full Name:</label>
                                                    <input type="text" name="fullname" class="form-control"> </div>
                                                <div class="form-group">
                                                    <label class="control-label">Gambar:</label>
                                                    <input type="file" name="gambar" class="form-control"> </div>
                                                <div class="form-group">
                                                    <label class="control-label">Username:</label>
                                                    <input type="text" name="username" class="form-control"> </div>
                                                <div class="form-group">
                                                    <label class="control-label">Password:</label>
                                                    <input type="text" name="password" class="form-control"> </div>
                                                <div class="form-group">
                                                    <label class="control-label">Status:</label>
                                                    <select class="form-control" name="status">
                                                        <option value="admin">Admin</option>
                                                        <option value="guru">Guru</option>
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
                                            <th>NIP GURU</th>
                                            <th>FULLNAME</th>
                                            <th>EMAIL</th>
                                            <th>USERNAME</th>
                                            <th>STATUS</th>
                                            <th width="300">MANAGE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php 
										include '../config.php'; 

										  $q = "SELECT * FROM tbl_user ORDER BY create_date DESC";
										  $ex = mysqli_query($koneksi,$q);
										  $a = 1;
										  while ($r = mysqli_fetch_array($ex)) {
                                    	 ?>
                                        <tr>
                                        	<td class="text-center"><?php echo $a; ?></td>
                                            <td style="width: 80px;"><img src="modul/<?php echo $r['gambar'] ?>" alt="user img" class="img-circle" width="50" height="50" /></td>
                                            <td><?php echo $r['nip_guru']; ?></td>
                                            <td><?php echo $r['fullname']; ?></td>
                                            <td><?php echo $r['email']; ?></td>
                                            <td><?php echo $r['username']; ?></td>
                                            <td><?php echo $r['status']; ?></td>
                                            <td>
                                            	<button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5" data-toggle="modal" data-target="#edit_user<?php echo $r['id_user']; ?>"><i class="ti-pencil-alt"></i></button>
                                                <a href="../function/f_delete_user.php?id_user=<?php echo $r['id_user']; ?>&&file=<?php echo $r['gambar'] ?>"><button type="button" class="btn btn-danger btn-outline btn-circle btn-lg m-r-5"><i class="ti-trash"></i></button></a>
                                                <?php if ($r['keadaan'] == "aktif") { ?>
                                                <a href="../function/f_aktif.php?id_user=<?php echo $r['id_user']; ?>&&keadaan=<?php echo $r['keadaan']; ?>"><button type="button" class="btn btn-success btn-outline btn-circle btn-lg m-r-5"><i class="ti-check-box"></i></button></a>
                                                <?php }else{ ?>
                                                <a href="../function/f_aktif.php?id_user=<?php echo $r['id_user']; ?>&&keadaan=<?php echo $r['keadaan']; ?>"><button type="button" class="btn btn-danger btn-outline btn-circle btn-lg m-r-5"><i class="ti-check-box"></i></button></a>
                                                <?php } ?>
                                                
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="edit_user<?php echo $r['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="exampleModalLabel1">Edit User</h4> </div>
                                                    <div class="modal-body">
                                                    <form action="../function/f_edit_user.php" method="POST" enctype="multipart/form-data">
                                                        <?php
                                                        $id = $r['id_user']; 
                                                        $query_edit = mysqli_query($koneksi,"SELECT * FROM tbl_user WHERE id_user='$id'");
                                                        while ($row = mysqli_fetch_array($query_edit)) {  
                                                        ?>
                                                        <div class="form-group">
                                                            <label class="control-label">NIP Guru:</label>
                                                            <input type="hidden" name="id_user" value="<?php echo $row['id_user'] ?>">
                                                            <input type="text" name="e_nip_guru" class="form-control" value="<?php echo $row['nip_guru'] ?>"> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Email:</label>
                                                            <input type="text" name="e_email" class="form-control" value="<?php echo $row['email'] ?>"> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Full Name:</label>
                                                            <input type="text" name="e_fullname" class="form-control" value="<?php echo $row['fullname'] ?>"> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Gambar:</label><br>
                                                            <img src="modul/<?php echo $row['gambar']; ?>" style="width: 50px">
                                                            <input type="hidden" name="g_gambar" value="<?php echo $row['gambar']; ?>">
                                                            <input type="file" name="e_gambar" class="form-control"> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Username:</label>
                                                            <input type="text" name="e_username" class="form-control" value="<?php echo $row['username'] ?>"> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Password:</label>
                                                            <input type="text" name="e_password" class="form-control" value="<?php echo $row['password'] ?>"> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Status:</label>
                                                            <?php if ($row['status'] == "admin"){ ?>
                                                            <select class="form-control" name="e_status">
                                                                <option value="admin">Admin</option>
                                                                <option value="guru">Guru</option>
                                                            </select>
                                                            <?php }else{ ?>
                                                            <select class="form-control" name="e_status">
                                                                <option value="guru">Guru</option>
                                                                <option value="admin">Admin</option>
                                                            </select>
                                                            <?php } ?>
                                                            
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
                <!-- /row -->
                <!-- ============================================================== -->
            </div>

            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by themedesigner.in </footer>
        </div>
        <!-- ============================================================== -->
<?php include 'footer.php'; ?>
