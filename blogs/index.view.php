<h1>Andere Blogs</h1>
<?php
foreach($blogs as $output){
    ?>
<div class="form-actions">
    <a href="http://<?= htmlspecialchars($output['ip'], ENT_QUOTES, "UTF-8");
    ?><?= htmlspecialchars($output['pfad'], ENT_QUOTES, "UTF-8");
    ?>"><?= htmlspecialchars($output['name'], ENT_QUOTES, "UTF-8");
    ?></a>
</div>
<?php } ?>