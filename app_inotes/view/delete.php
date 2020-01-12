<a href="./index.php"><button class="btn btn-outline-success my-2 my-sm-0">Cancel</button></a>
<form class="note-detail" method="post">
    <h2>Did you want to delete the note?</h2>
    <input type="hidden" name="id" value="<?php echo $note->getId(); ?>">
    <p><?php echo $note->getTitle(); ?></p>
    <p><?php echo $note->getContent(); ?></p>
    <input type="submit" class="btn btn-outline-danger my-2 my-sm-0" value="Delete">
<!--    <a href="./index.php"><button class="btn btn-outline-success my-2 my-sm-0">Cancel</button></a>-->
</form>


<!--why button cancel in form will submit and out form not?-->