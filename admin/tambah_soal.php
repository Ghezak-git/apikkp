<?php include 'header.php'; ?>
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Tambah Soal</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                        <ol class="breadcrumb">
                            <li><a href="guru.php">Dashboard</a></li>
                            <li><a href="tambah_quiz.php">Tambah Pelajaran</a></li>
                            <li class="active">Tambah Soal</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <form id="form-id" class="form-horizontal" action="../function/f_tambah_soal.php" method="POST">
                    <div class="col-md-8">
                        <div class="white-box">
                            <h3 class="box-title m-b-30">Form Tambah Soal</h3>
                                <div class="form-group">
                                    <label class="col-md-12">Soal</label>
                                    <div class="col-md-12">
                                        <input type="hidden" name="g_id_soal" id="g_id_soal">
                                        <input type="hidden" name="id_quiz" value="<?php echo $_GET['id_quiz'] ?>">
                                        <textarea id="g_soal" name="soal" class="form-control" rows="5" placeholder="Soal"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <input id="g_optiona_a" name="option_a" type="text" class="form-control" placeholder="Option A">
                                    </div>
                                    <div class="col-md-6">
                                        <input id="g_optiona_b" name="option_b" type="text" class="form-control" placeholder="Option B">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <input id="g_optiona_c" name="option_c" type="text" class="form-control" placeholder="Option C">
                                    </div>
                                    <div class="col-md-6">
                                        <input id="g_optiona_d" name="option_d" type="text" class="form-control" placeholder="Option D">
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="white-box">
                             <h3 class="box-title m-b-30">Form Pembahasan</h3>
                                <div class="form-group">
                                    <label class="col-sm-12">Jawaban</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="jawaban" id="g_jawaban">
                                            <option>----</option>
                                            <option value="pilihan_1">A</option>
                                            <option value="pilihan_2">B</option>
                                            <option value="pilihan_3">C</option>
                                            <option value="pilihan_4">D</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Pembahasan</label>
                                    <div class="col-md-12">
                                        <textarea id="g_pembahasan" name="pembahasan" class="form-control" rows="4" placeholder="Soal"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                	<div class="col-md-12">
                                        <button type="submit" id="simpan" class="btn btn-success">Simpan</button>
                                        <button type="submit" id="edit" class="btn btn-info">Edit</button>
                                        <button type="button" id="cancel" class="btn btn-danger">Cancel</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                    </form>
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-30">Table Soal</h3>
                            <form id="form-import" class="form-horizontal" action="f_import_excel.php?id_quiz=<?php echo $_GET['id_quiz'] ?>"  method="POST" enctype="multipart/form-data">
                                <input type="file" class="col-md-3" name="file">
                                <button class="btn btn-success" name="import" type="submit">Import</button>
                                <a href="../Format.xlsx" class="btn btn-default">
                                    <span class="glyphicon glyphicon-download"></span>
                                    Download Format
                                </a>
                            </form>
                            <br><br>
                            <div class="table-responsive">
                                <table class="table table-hover manage-u-table">
                                    <thead>
                                        <tr>
                                            <th width="70" class="text-center">#</th>
                                            <th>SOAL</th>
                                            <th>PILIHAN 1</th>
                                            <th>PILIHAN 2</th>
                                            <th>PILIHAN 3</th>
                                            <th>PILIHAN 4</th>
                                            <th>JAWABAN</th>
                                            <th width="200">PEMBAHASAN</th>
                                            <th width="200">MANAGE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php 
                                    		include '../config.php'; 

										  	$q = "select * from tbl_soal where id_quiz='$_GET[id_quiz]'";
										  	$ex = mysqli_query($koneksi,$q);
                                            $s = mysqli_num_rows($ex);
											$a = 1;
											while ($r = mysqli_fetch_array($ex)) {

                                    		$soal = substr($r['soal'],0,20);
                                    		$pilihan1 = substr($r['pilihan_1'],0,10);
                                    		$pilihan2 = substr($r['pilihan_2'],0,10);
                                    		$pilihan3 = substr($r['pilihan_3'],0,10);
                                    		$pilihan4 = substr($r['pilihan_4'],0,10);
                                    		$pembahasan = substr($r['pembahasan'],0,30);
                                    	 ?>
                                        <tr>
                                            <td class="text-center"><?php echo $a++; ?></td>
                                            <td><?php echo $soal; ?>...</td>
                                            <td><?php echo $pilihan1; ?></td>
                                            <td><?php echo $pilihan2; ?></td>
                                            <td><?php echo $pilihan3; ?></td>
                                            <td><?php echo $pilihan4; ?></td>
                                            <td><?php echo $r['jawaban']; ?></td>
                                            <td><?php echo $pembahasan; ?>...</td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-outline btn-circle btn-lg m-r-5" data-toggle="modal" data-target="#lihat_soal<?php echo $r['id_soal']; ?>"><i class="ti-eye"></i></button>
                                                <button id="<?php echo $r['id_soal'] ?>" type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5 edit1"><i class="ti-pencil-alt"></i></button>
                                                <a href="../function/f_delete_soal.php?id_soal=<?php echo $r['id_soal']; ?>&&id_quiz=<?php echo $_GET['id_quiz'] ?>"><button type="button" class="btn btn-danger btn-outline btn-circle btn-lg m-r-5"><i class="ti-trash"></i></button></a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="lihat_soal<?php echo $r['id_soal']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="exampleModalLabel1">Lihat Soal</h4> </div>
                                                    <div class="modal-body">
                                                        <?php
                                                        $id = $r['id_soal']; 
                                                        $query_edit = mysqli_query($koneksi,"SELECT * FROM tbl_soal WHERE id_soal='$id'");
                                                        while ($row = mysqli_fetch_array($query_edit)) {  
                                                        ?>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-12"><?php echo $row['soal']; ?></label>
                                                            <br><br><br>
                                                            <label class="control-label col-md-6">A. <?php echo $row['pilihan_1']; ?></label>
                                                            <label class="control-label col-md-6">B. <?php echo $row['pilihan_2']; ?></label>
                                                            <br><br><br>
                                                            <label class="control-label col-md-6">C. <?php echo $row['pilihan_3']; ?></label>
                                                            <label class="control-label col-md-6">D. <?php echo $row['pilihan_4']; ?></label>
                                                            <br><br><br>
                                                            <?php if ($row['jawaban'] == "pilihan_1"){
                                                                $jawaban = "A";
                                                            }elseif ($row['jawaban'] == "pilihan_2") {
                                                                $jawaban = "B";
                                                            }elseif ($row['jawaban'] == "pilihan_3") {
                                                                $jawaban = "C";
                                                            }elseif ($row['jawaban'] == "pilihan_4") {
                                                                $jawaban = "D";
                                                            }

                                                            ?>
                                                            <label class="control-label col-md-6">Jawaban = <?php echo $jawaban; ?></label>
                                                            <br><br><br>
                                                            <label class="control-label col-md-12">Pembahasan = <?php echo $r['pembahasan']; ?></label>
                                                            <br>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    	<?php } ?>
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




    	<script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
        <script>
        	$(document).ready(function(){
        		$("#edit").hide();
        		$("#cancel").hide();

        		$(document).on('click','.edit1', function(e){
                    e.preventDefault();
                    var id = $(this).attr('id');
                    $.ajax({
                        url :'json/detail_quiz.php?id_soal='+id,
                        method: "GET",
                        dataType: "JSON",
                        success:function(data){
                            if (data != "") {
                                $("#form-id").attr('action',"../function/f_edit_soal.php");
                                $("#form-id").attr('method',"GET");
                                $('#g_soal').val(data.soal);
                                $('#g_optiona_a').val(data.pilihan_1);
                                $('#g_optiona_b').val(data.pilihan_2);
                                $('#g_optiona_c').val(data.pilihan_3);
                                $('#g_optiona_d').val(data.pilihan_4);
                                $('#g_pembahasan').val(data.pembahasan);
                                $('#g_id_soal').val(data.id_soal);
                                $('#g_jawaban').val(data.jawaban);
                                $('#g_jawaban').trigger('change');
                            } 
                        }
                    })
        			$("#edit").show();
        			$("#simpan").hide();
        			$("#cancel").show();
        		});
        		$("#cancel").click(function(){
                    var soal = "SOAL"
                    $("#form-id").attr('action',"../function/f_tambah_soal.php");
                    $("#form-id").attr('method',"POST");
        			$("#edit").hide();
        			$("#simpan").show();
        			$("#cancel").hide();
                    $("#form-id")[0].reset();
        		});
        	});
        </script>
        <!-- ============================================================== -->
<?php include 'footer.php'; ?>
