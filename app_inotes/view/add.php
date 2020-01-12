<h2>Create new note</h2>
<form method="post">
    <div class="form-group">
        <label for="exampleFormControlInput1">Title</label>
        <input type="text" name="title" class="form-control" id="exampleFormControlInput1">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Type</label>
        <select class="form-control" name="type" id="exampleFormControlSelect1">
            <option value="personal">Personal</option>
            <option value="job">Job</option>
            <option value="family">Family</option>
            <option value="friend">Friend</option>
            <option value="society">Society</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Content</label>
        <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div>
        <a href="./index.php"><button class="btn btn-outline-danger my-2 my-sm-0">Cancel</button></a>
        <input type="submit" class="btn btn-outline-success my-2 my-sm-0" value="Create">
    </div>
</form>