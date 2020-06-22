<?php include ROOT . '/views/layouts/header.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Создать задачу</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Главная</a></li>
                        <li class="breadcrumb-item active">Создать задачу</li>
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
                        <div class="col-md-12">

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
                                    <h3 class="card-title">Создать задачу</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" action="/user/task" id="taskForm" method="post">
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Имя: *</label>
                                                    <input type="text" name="name" class="form-control" id="name" placeholder="Имя">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="fullname">Фамилия: *</label>
                                                    <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Фамилия">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="email">E-mail: *</label>
                                                    <input type="email" name="email" class="form-control" id="email" placeholder="E-mail">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="text">Текст задачи: *</label>
                                                    <textarea class="form-control" name="text" rows="3" id="text" placeholder="Текст задачи"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Сохранить задачу" />
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
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