       <!-- Main Footer -->
       <footer class="main-footer">
           <!-- To the right -->
           <div class="float-right d-none d-sm-inline"></div>
           <!-- Default to the left -->
           <strong>Copyright &copy; <?= date('Y'); ?></strong>
       </footer>
       </div>
       <!-- ./wrapper -->

       <!-- REQUIRED SCRIPTS -->

       <!-- jQuery -->
       <script src="/public/plugins/jquery/jquery.min.js"></script>
       <!-- Bootstrap 4 -->
       <script src="/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
       <!-- jquery-validation -->
       <script src="/public/plugins/jquery-validation/jquery.validate.min.js"></script>
       <script src="/public/plugins/jquery-validation/additional-methods.min.js"></script>
       <!-- AdminLTE App -->
       <script src="/public/dist/js/adminlte.min.js"></script>

       <script type="text/javascript">
           $(document).ready(function() {
               $.validator.setDefaults({

               });
               $('#taskForm').validate({
                   rules: {
                       name: {
                           required: true,
                       },
                       email: {
                           required: true,
                           email: true,
                       },
                       fullname: {
                           required: true,
                       },
                       text: {
                           required: true
                       },
                   },
                   messages: {
                       name: {
                           required: "Поля обязательны для заполнения",
                       },
                       email: {
                           required: "Поля обязательны для заполнения",
                           email: "Пожалуйста, введите действительный адрес электронной почты"
                       },
                       fullname: {
                           required: "Поля обязательны для заполнения",
                       },
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

       <script type="text/javascript">
           $(document).ready(function() {
               $.validator.setDefaults({

               });
               $('#quickForm').validate({
                   rules: {
                       username: {
                           required: true,
                       },
                       password: {
                           required: true,
                           minlength: 3
                       },
                   },
                   messages: {
                       username: {
                           required: "Поля обязательны для заполнения",
                       },
                       password: {
                           required: "Поля обязательны для заполнения",
                           minlength: "Минимальный символь 3 для зополнение"
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