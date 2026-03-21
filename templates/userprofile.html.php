<div class="responsive-form">
        <h1>User profile</h1>
        <form action="index.php?action=delete" method="post">
                <?=htmlspecialchars($reviewer['name'], ENT_QUOTES,'UTF-8')?><br />  
                <a href="index.php?action=edit&id=<?=$film['id']?>">Change your name</a>  

                <?=htmlspecialchars($reviewer['email'], ENT_QUOTES,'UTF-8')?>
                <a href="index.php?action=edit&id=<?=$film['id']?>">Change your email</a>
                <input type="hidden" name="id" value="<?=$film['id']?>">
                <input type="submit" value="Delete your account">
        </form>
</div>
