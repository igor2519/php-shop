<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление блогом</li>
                </ol>
            </div>

            <a href="/admin/blog/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить блог</a>
            
            <h4>Список блогов</h4>

            <br/>

            <table class="table-bordered table-striped table">
                <tr>
                    <th>ID блога</th>
                    <th>Заголовок</th>
                    
                    <th></th>
                   
                </tr>
                <?php foreach ($productsList as $blog): ?>
                    <tr>
                        <td><?php echo $blog['id']; ?></td>
                        <td><?php echo $blog['title']; ?></td>
                        

                        <td><a href="/admin/blog/delete/<?php echo $blog['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

