<?=htmlspecialchars($reviewer['name'], ENT_QUOTES,'UTF-8')?><br />  
<a href="index.php?action=edit&id=<?=$film['id']?>">Change your name</a>  

<?=htmlspecialchars($reviewer['email'], ENT_QUOTES,'UTF-8')?>
<a href="index.php?action=edit&id=<?=$film['id']?>">Change your email</a>

<form action="index.php?action=delete" method="post">
        <input type="hidden" name="id" value="<?=$film['id']?>">
        <input type="submit" value="Delete your account">
</form>
