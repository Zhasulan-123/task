<?php include ROOT . '/views/layouts/admin/header.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Пользователя задачи</h1>
                </div><!-- /.col -->
                <div class="col-sm-6"></div>
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Список задач</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">

                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Пользователь</th>
                                        <th>E-mail</th>
                                        <th>Статус</th>
                                        <th>Задача</th>
                                        <th>Администратор</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if ($userPagination) : ?>
                                        <?php $i = 1;
                                        foreach ($userPagination as $item) : ?>
                                            <tr>
                                                <td><?= htmlspecialchars($item['id']); ?></td>
                                                <td><?= htmlspecialchars($item['fullname']); ?>&nbsp;<?= htmlspecialchars($item['name']); ?></td>
                                                <td><?= htmlspecialchars($item['email']); ?></td>
                                                <td>
                                                    <?php if ($item['status'] == 0) : ?>
                                                        <span class="badge bg-danger">Не выполнено</span>
                                                    <?php else : ?>
                                                        <span class="badge bg-success">Выполнено</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= htmlspecialchars($item['text']); ?></td>
                                                <td>
                                                    <?php if ($item['admin_is'] == 1) : ?>
                                                        <span class="badge bg-success">Отредактировано</span>
                                                    <?php else : ?>
                                                        <span class="badge bg-danger">Нет</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" href="/admin/update/<?php echo $item['id']; ?>">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="7" style="text-align: center; color: red;">Задача пусто!!!</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <nav aria-label="Contacts Page Navigation">
                        <?php echo $pagination->get(); ?>
                    </nav>
                </div>
            </div>

        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include ROOT . '/views/layouts/admin/footer.php'; ?>