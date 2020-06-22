<?php include ROOT . '/views/layouts/admin/header.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Редактировать задач</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Главная</a></li>
                        <li class="breadcrumb-item active">Редактировать</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <?php if (isset($success) && is_array($success)) : ?>
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Данный сохранино !!!</h5>
                            <?php foreach ($success as $ok) : ?>
                                <?php echo $ok; ?><br>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Редактировать</small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" id="editUser" action="/admin/update/<?= $userList['id']; ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Задача:</label>
                                    <textarea class="form-control" name="text" rows="3" placeholder="Текст задача"><?php echo $userList['text']; ?></textarea>
                                </div>

                                <div class="form-group mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="status" <?php if ($userList['status'] == 1) echo 'checked'; ?> class="custom-control-input" id="status">
                                        <label class="custom-control-label" for="status">выполнено</label>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="submit" name="submit" class="btn btn-primary" value="Сохранить" />
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->


                </div>
            </div>

        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include ROOT . '/views/layouts/admin/footer.php'; ?>