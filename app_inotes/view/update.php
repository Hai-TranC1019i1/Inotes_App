<h2>Edit note</h2>
<?php if (isset($message)):?>
<p class="alert-note"><?php echo $message; ?></p>
<?php endif; ?>
<form method="post">
    <input type="hidden" value="<?php echo $note->getId(); ?>" name="id">
    <div class="form-group">
        <label for="exampleFormControlInput1">Title</label>
        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="<?php echo $note->getTitle(); ?>">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Type</label>
        <select class="form-control" name="type" id="exampleFormControlSelect1">
            <option value="personal" <?php if ($note->getType() == 'personal') echo 'selected'; ?>>Personal</option>
            <option value="job" <?php if ($note->getType() == 'job') echo 'selected'; ?>>Job</option>
            <option value="family"<?php if ($note->getType() == 'family') echo 'selected'; ?>>Family</option>
            <option value="friend"<?php if ($note->getType() == 'friend') echo 'selected'; ?>>Friend</option>
            <option value="society"<?php if ($note->getType() == 'society') echo 'selected'; ?>>Society</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Content</label>
        <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"><?php echo $note->getContent(); ?></textarea>
    </div>
    <div>
    </div>
        <a href="./index.php"><button class="btn btn-outline-danger my-2 my-sm-0">Cancel</button></a>
        <input type="submit" class="btn btn-outline-success my-2 my-sm-0" value="Edit">
    </div>
</form>