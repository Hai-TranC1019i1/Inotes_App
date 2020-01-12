<div class="head-list">
    <div class="btn-group selection">
        <button class="btn btn-secondary btn-lg" type="button">
            Type
        </button>
        <button type="button" class="btn btn-lg btn-secondary dropdown-toggle dropdown-toggle-split"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <div class="dropdown-menu">
<!--            --><?php //foreach ($types as $key => $type): ?>
<!--            --><?php //endforeach; ?>
            <a class="dropdown-item" href="#">Personal</a>
            <a class="dropdown-item" href="#">Job</a>
            <a class="dropdown-item" href="#">Family</a>
            <a class="dropdown-item" href="#">Friend</a>
            <a class="dropdown-item" href="#">Society</a>
        </div>
    </div>
    <form class="form-inline my-2 my-lg-0" method="post">
        <input class="form-control mr-sm-2" name="keyword" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <a href="./index.php?page=add"><button type="button" class="btn btn-outline-success my-2 my-sm-0">Create+</button></a>
</div>
<div class="list-group">
        <?php foreach ($notes as $key => $note): ?>
        <div class="list-note">
            <a href="./index.php?page=detail&id=<?php echo $note->getId(); ?>"><?php echo $note->getTitle(); ?></a>
            <div class="btn-group">
                <a href="./index.php?page=delete&id=<?php echo $note->getId(); ?>" ><button class="btn btn-outline-danger my-2 my-sm-0">Delete</button></a>
                <a href="./index.php?page=edit&id=<?php echo $note->getId(); ?>"><button class="btn btn-outline-success my-2 my-sm-0">Edit</button></a>
            </div>
        </div>
        <?php endforeach; ?>
</div>