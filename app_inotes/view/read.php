<div class="note-detail">
    <h2><?php echo $note->getTitle(); ?></h2>
    <p><?php echo $note->getContent(); ?></p>
    <a href=".index?page=delete&id=<?php echo $note->getId(); ?>" ><button class="btn btn-outline-danger my-2 my-sm-0">Delete</button></a>
    <a href=".index?page=edit&id=<?php echo $note->getId(); ?>"><button class="btn btn-outline-success my-2 my-sm-0">Edit</button></a>
</div>