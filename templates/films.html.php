<head>
        <style type="text/css">
                .active{
                background: rgb(241, 161, 12);
                color: white;
                }
        </style>
</head>

<!-- Total film reviews -->
<p><?=$totalFilms?> film reviews have been submitted</p>

<!-- Search bar-->
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

<!-- Pagination -->
<?php if ($pagination->current_page() > 1): ?>
        <a href="index.php?controller=film&action=list&page=<?= $pagination->prev_page()?>"> Previous page </a>
<?php endif; ?>

<?php for ($i = 1; $i <= $pages; $i++): ?>
        <?php if($pagination->is_showable($i)):?>
                <a class="<?= $pagination->is_active_class($i) ?>" href="index.php?controller=film&action=list&page=<?= $i ?>">
                        <?= $i ?>
                </a>
        <?php endif; ?>
<?php endfor; ?>

<?php if ($pagination->current_page() < $pagination->get_pagination_number()): ?>
        <a href="index.php?controller=film&action=list&page=<?= $pagination->next_page()?>"> Next page </a>
<?php endif; ?>

<!-- film review list -->
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



        