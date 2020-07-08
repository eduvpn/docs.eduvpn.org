<?php foreach ($docsCategoryList as $categoryName => $docsList): ?>
<h3><?=$this->e($categoryName); ?></h3>
    <dl class="index">
<?php foreach ($docsList as $doc): ?>
        <dt>
            <a href="<?php echo $this->e($doc['fileName']); ?>"><?php echo $this->e($doc['title']); ?></a>
        </dt>
        <dd><?php echo $this->e($doc['description']); ?></dd>
<?php endforeach; ?>
    </dl>
<?php endforeach; ?>
