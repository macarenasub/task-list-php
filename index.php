<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<div class="container p-4">

    <div class="row">

        <div class="col-md-4 mb-4">

            <?php if (isset($_SESSION['message'])) { ?>
                <!-- Mensaje de guardado-->
                <div class="alert alert-<?= $_SESSION['message_type']; ?> 
                    alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php session_unset();
            } ?>
            <!-- Cierro sesión-->
            <div class="card">
                <div class="card-header">
                    Crear tarea
                </div>
                <div class="card-body">
                    <form action="save_task.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Título de la tarea" autofocus>
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="2" class="form-control" placeholder="Descripción de la tarea"></textarea>
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="save_task" value="Guardar">
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th class="d-none d-sm-table-cell">Creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM task";
                    $result_tasks = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result_tasks)) { ?>
                        <tr>
                            <td><?php echo $row['title'] ?></td>
                            <td><?php echo $row['description'] ?></td>
                            <td class="d-none d-sm-table-cell"><?php echo $row['created_at'] ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                &nbsp;
                                <a href="delete_task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php include("includes/footer.php") ?>