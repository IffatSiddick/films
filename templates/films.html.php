<p><?=$totalFilms?> film reviews have been submitted</p>

<form method="get" class="search-bar">
        <input type="hidden" name="controller" value="film">
        <input type="hidden" name="action" value="list">

        <input type="text" name="search" placeholder="Search by film or reveiwer"
                value="<?= htmlspecialchars($search, ENT_QUOTES, 'UTF-8') ?>">
        <button type="submit">Search</button>

        <?php if ($films == []): ?>
                <p>There are no films or reviewers that match your search.</p>
        <?php endif; ?>

        <?php if (!empty($search)): ?>
                <a class="clear-link" href="index.php?controller=film&amp;action=list">Clear</a>
        <?php endif; ?>
</form>

<?php for ($i = 1; $i <= $pages; $i++): ?>
    <a href="index.php?controller=film&action=list&page=<?= $i ?>">
        <?= $i ?>
    </a>
<?php endfor; ?>

<?php
foreach($films as $film): ?>
        <blockquote>
                <?=htmlspecialchars($film['title'], ENT_QUOTES,'UTF-8')?><br />    
                <?=htmlspecialchars($film['review'], ENT_QUOTES,'UTF-8')?>

                (by <a href="mailto:<?=htmlspecialchars($film['email'], ENT_QUOTES, 'UTF-8' );?>">
                <?=htmlspecialchars($film['name'], ENT_QUOTES, 'UTF-8'); ?></a>)

                <a href="index.php?action=edit&id=<?=$film['id']?>">Edit</a>

                <form action="index.php?action=delete" method="post">
                        <input type="hidden" name="id" value="<?=$film['id']?>">
                        <input type="submit" value="Delete">
                </form>
        </blockquote>
<?php endforeach;?>



        