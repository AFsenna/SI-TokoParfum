   </div>
   <script type="text/javascript" charset="utf8" src="assets/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript" charset="utf8" src="assets/js/dataTables.bootstrap4.min.js"></script>

   <script type="text/javascript" charset="utf8" src="assets/js/dataTables.buttons.min.js"></script>
   <script type="text/javascript" charset="utf8" src="assets/js/buttons.bootstrap4.min.js"></script>
   <script type="text/javascript" charset="utf8" src="assets/js/jszip.min.js"></script>
   <script type="text/javascript" charset="utf8" src="assets/js/pdfmake.min.js"></script>
   <script type="text/javascript" charset="utf8" src="assets/js/vfs_fonts.js"></script>
   <script type="text/javascript" charset="utf8" src="assets/js/buttons.html5.min.js"></script>

   <script src="assets/js/popper.min.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

   <!-- Modal -->
   <div class="modal fade show" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content">
               <div class="card" style="width: 53rem; height: 31rem;">
                   <div class="card-header text-light" style="background-color: #0F5675;">
                       <center>
                           <h4>My Profile</h4>
                       </center>
                   </div>
                   <div class="card-body">
                       <div class="row no-gutters mt-4">
                           <img src="assets/images/profilepicture.png" style="height: 250px; width: 250px">
                           <div class="card ml-5" style="width: 31rem; height: 20rem;">
                               <div class="row">
                                   <div class="col-md-5 ml-2 mt-3">
                                       <label>NIK</label>
                                   </div>
                                   <div class="col-md-5 mt-3">
                                       <?php
                                        $tampil = $_SESSION['pegawai']['nik_pegawai'];
                                        echo ": $tampil";
                                        ?>
                                   </div>
                               </div>
                               <hr>
                               <div class="row">
                                   <div class="col-md-5 ml-2">
                                       <label>Jabatan</label>
                                   </div>
                                   <div class="col-md-5">
                                       <?php
                                        $tampil = $_SESSION['jabatan'];
                                        echo ": $tampil";
                                        ?>
                                   </div>
                               </div>
                               <hr>
                               <div class="row">
                                   <div class="col-md-5 ml-2">
                                       <label>Nama</label>
                                   </div>
                                   <div class="col-md-5">
                                       <?php
                                        $tampil = $_SESSION['pegawai']['nama_pegawai'];
                                        echo ": $tampil";
                                        ?>
                                   </div>
                               </div>
                               <hr>
                               <div class="row">
                                   <div class="col-md-5 ml-2">
                                       <label>Nomor Telepon</label>
                                   </div>
                                   <div class="col-md-5">
                                       <?php
                                        $tampil = $_SESSION['pegawai']['notelp_pegawai'];
                                        echo ": $tampil";
                                        ?>
                                   </div>
                               </div>
                               <hr>
                               <div class="row">
                                   <div class="col-md-5 ml-2">
                                       <label>Email</label>
                                   </div>
                                   <div class="col-md-5">
                                       <?php
                                        $tampil = $_SESSION['pegawai']['email_pegawai'];
                                        echo ": $tampil";
                                        ?>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <button type="button" class="btn btn-secondary mt-4 mb-2 mr-3 float-right" data-dismiss="modal">Close</button>
                   </div>
               </div>
           </div>
       </div>
   </div>
   </div>
   <script>
       $("#btnTes").click(function() {
           $("#myModal").modal("show")
           //    console.log("senna");
       });
       $(document).ready(function() {
           var table = $('#example').DataTable({
               lengthChange: true,
           });
           $('[data-toggle="tooltip"]').tooltip();
           $('.select2').select2();
       });
   </script>

   </body>

   </html>