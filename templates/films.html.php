<p><?=$totalFilms?> film reviews have been submitted</p>
<?php
foreach($films as $film): ?>
        <blockquote>
                <?=htmlspecialchars($film['title'], ENT_QUOTES,'UTF-8')?><br />    
                <?=htmlspecialchars($film['review'], ENT_QUOTES,'UTF-8')?>

                (by <a href="mailto:<?=htmlspecialchars($film['email'], ENT_QUOTES, 'UTF-8' );?>">
                <?=htmlspecialchars($film['reviewer'], ENT_QUOTES, 'UTF-8'); ?></a>)

                <a href="editreview.php?action=edit&id=<?=$film['id']?>">Edit</a>

                <form action="deletefilm.php?action=delete" method="post">
                        <input type="hidden" name="id" value="<?=$film['id']?>">
                        <input type="submit" value="Delete">
                </form>
        </blockquote>
<?php endforeach;?>]

        