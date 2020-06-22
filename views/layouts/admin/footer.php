       <!-- Main Footer -->
       <footer class="main-footer">
           <strong>Copyright &copy; <?= date('Y') ?></strong>
           <div class="float-right d-none d-sm-inline-block">
               <b>Version</b> 3.0.2
           </div>
       </footer>
       </div>
       <!-- ./wrapper -->

       <!-- REQUIRED SCRIPTS -->
       <!-- jQuery -->
       <script src="/public/plugins/jquery/jquery.min.js"></script>
       <!-- Bootstrap -->
       <script src="/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
       <!-- jquery-validation -->
       <script src="/public/plugins/jquery-validation/jquery.validate.min.js"></script>
       <script src="/public/plugins/jquery-validation/additional-methods.min.js"></script>
       <!-- overlayScrollbars -->
       <script src="/public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
       <!-- AdminLTE App -->
       <script src="/public/dist/js/adminlte.js"></script>

       <!-- OPTIONAL SCRIPTS -->
       <script src="/public/dist/js/demo.js"></script>

       <!-- PAGE SCRIPTS -->
       <script src="/public/dist/js/pages/dashboard2.js"></script>

       <script type="text/javascript">
           $(document).ready(function() {
               $.validator.setDefaults({

               });
               $('#editUser').validate({
                   rules: {
                       text: {
                           required: true,
                       },
                   },
                   messages: {
                       text: {
                           required: "Поля обязательны для заполнения",
                       },
                   },
                   errorElement: 'span',
                   errorPlacement: function(error, element) {
                       error.addClass('invalid-feedback');
                       element.closest('.form-group').append(error);
                   },
                   highlight: function(element, errorClass, validClass) {
                       $(element).addClass('is-invalid');
                   },
                   unhighlight: function(element, errorClass, validClass) {
                       $(element).removeClass('is-invalid');
                   }
               });
           });
       </script>
       </body>

       </html>