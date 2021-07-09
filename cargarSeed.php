<?php include "includes/header.php" ?>
<?php include "includes/db.php" ?>
<!-- Page content-->
<div class="container">
    <div class="text-center mt-5">

        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                    <form>
                        <div class="form-group row">
                            <label for="textarea" class="col-4 col-form-label">Semillas</label>
                            <div class="col-8" style="margin-bottom: 10pt;">
                                <textarea id="textarea" name="textarea" cols="40" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-4 col-8 d-grid gap-2">
                                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>


                </div>

            </div>
        </div>

    </div>
</div>

<?php include "includes/footer.php" ?>