<?= $this->Flash->render() ?>
<table class="table table-striped table-hover">
<tr>
    <td>#</td>
    <td></td>
    <td></td>
    <td><a href="<?= $this->Url->build(); ?>/material/add"><button type="button" class="btn btn-info">add</button></a></td>
</tr>
<?php foreach($materials as $material): ?>
    <tr>
    <td><p><?= $material['id']?></p></td>
    <td><?php if (!empty($material['image'])): ?><img src="<?= $this->Url->buildFromPath('Blog.Materials::index') ?>uploads/thumb/<?= $material['image']?>"><?php endif; ?></td>
    <td><p><?= $material['title']?></p></td>
    <td>
    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
        <a href="<?= $this->Url->build("admin/material/edit/{$material['id']}"); ?>"><button type="button" class="btn btn-success">edit</button></a>
        <a href="<?= $this->Url->build("admin/material/delete/{$material['id']}"); ?>"><button type="button" class="btn btn-danger">delete</button></a>
    </div>
    </td>
    </tr>
<?php endforeach; ?>

</table>

<?php if (!empty($this->Paginator->numbers())) : ?>
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <?php 
      echo $this->Paginator->first();
      echo $this->Paginator->prev();
      echo $this->Paginator->numbers();
      echo $this->Paginator->next();
      echo $this->Paginator->last();
    ?>
  </ul>
</nav>
<?php endif; ?>