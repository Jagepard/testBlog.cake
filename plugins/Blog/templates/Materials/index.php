<br>

<div class="row row-cols-1 row-cols-md-3 g-4" data-masonry='{"percentPosition": true }'>

<?php foreach($materials as $material): ?>

    <div class="col">
    <div class="card">
    <a href="<?= $this->Url->build('material'); ?>/<?= $material['id'] ?>_<?= $material['slug'] ?>">
    <img src="<?= $this->Url->build('images'); ?>/<?= $material['image'] ?>" class="card-img-top" alt="<?= $material['title']?>">
    </a>
      <div class="card-body">
        <h5 class="card-title"><a class="link-secondary link-underline link-underline-opacity-0" href="<?= $this->Url->build('material'); ?>/<?= $material['id'] ?>_<?= $material['slug'] ?>"><?= $material['title']?></a></h5>
        <!-- <p class="card-text"><?= htmlspecialchars_decode($material['text'])?></p> -->
      </div>
    </div>
  </div>

<?php endforeach; ?>

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
