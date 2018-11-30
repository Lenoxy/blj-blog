 <?php include 'index.model.php'; ?>

 <?php include  '../navigation.view.php'; ?>


 <h1>Beiträge anzeigen</h1>

<?php foreach($posts as $output): ?>

    <div class="form-actions">
        <h2><?= htmlspecialchars($output['created_by'], ENT_QUOTES, "UTF-8"); ?></h2>
        <h4><?= htmlspecialchars($output['post_title'], ENT_QUOTES, "UTF-8"); ?></h4>
        <p><?= htmlspecialchars($output['post_text'], ENT_QUOTES, "UTF-8"); ?></p>    
       
        <?php if(htmlspecialchars($output['image'], ENT_QUOTES, "UTF-8") !== ''): ?>
            <img class="image" src="<?= htmlspecialchars($output['image'], ENT_QUOTES, "UTF-8"); ?>" alt="Bild nicht verfügbar."/>
        <?php endif; ?>
       
        <p><?= htmlspecialchars($output['created_at'], ENT_QUOTES, "UTF-8"); ?></p>
    <hr>
    </div>
<?php endforeach; ?>
