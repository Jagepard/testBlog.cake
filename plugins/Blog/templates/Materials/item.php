<br>
<?php if (!empty($material['image'])): ?>
<img src="<?= $this->Url->buildFromPath('Blog.Materials::index') ?>uploads/<?= $material['image'] ?>" class="card-img-top" alt="<?= $material['title']?>">
<?php endif; ?>
<h2><?= $material['title']?></h2>
<p><?= htmlspecialchars_decode($material['text'])?></p>