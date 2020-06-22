<?php include ROOT . '/views/layouts/header.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Авторизация</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Главная</a></li>
                        <li class="breadcrumb-item active">Авторизация</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <?php if (isset($errors) && is_array($errors)) : ?>
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-ban"></i> Ошибка!</h5>
                                    <?php foreach ($errors as $error) : ?>
                                        <?php echo $error; ?><br>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <!-- jquery validation -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Авторизация</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" id="quickForm" method="post">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputName">Логин</label>
                                            <input type="text" name="username" class="form-control" id="exampleInputName" placeholder="Логин">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword">Пороль</label>
                                            <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Пороль">
                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Вход" />
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include ROOT . '/views/layouts/footer.php'; ?>