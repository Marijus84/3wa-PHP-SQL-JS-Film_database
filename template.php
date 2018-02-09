



<div class="inp col-md-5" style="width: 100%">

    <div class="form-group" >
    <label>ID</label>
    <input type="text" name="id" class="form-control"  value = "<?= $film['id'];?>">
    </div>
    <div class="form-group">
    <label>Title</label>
    <input type="text" name="title"  class="form-control" value = "<?= $film['title'];?>">
    </div>
    <div class="form-group">
    <label>Quality</label>
    <input type="text" name="quality"  class="form-control" value = "<?= $film['quality'];?>">
    </div>
    <div class="form-group">
    <label>Duration in minutes </label>
    <input type="number" name="duration"  class="form-control"  value = "<?= $film['duration'];?>">
    </div>
    <div class="form-group">
    <label>Premiere date</label>
    <input type="number" min="1900" max="2020" name="year"  class="form-control"  value = "<?= $film['year'];?>">
    </div>
    <div class="form-group">
    <label>Description</label>
    <input type="text" name="description"  class="form-control"  value = "<?= $film['description'];?>">
    </div>
    <div class="form-group">
    <label>Image link</label>
    <input type="text" name="image"  class="form-control" value = "<?= $film['image'];?>">
    </div>
    <div class="form-group">
    <label>Trailer link</label>
    <input type="text" name="trailer"  class="form-control" value = "<?= $film['trailer'];?>">
    </div>
    <div style="width: 100%; text-align: center;">
      <button class="btn btn-primary" type="submit"><?= $buttonId ?></button>
    </div>

</div>
