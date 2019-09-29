<div class="row">            
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Form Survey</h4>
        <form class="form-sample">
          <p>
          <div class="row blockquote blockquote-primary">
            Menurut anda seberapa besar penekanan pada pembelajaran di bawah ini dilaksanakan di program studi anda?
          </div>
          </p>
          <div class="row">
      
            <div class="col-md-12 blockquote blockquote-primary">
            <?php for($i = 1; $i <= 3 ; $i++): ?>
              <div class="form-group row">

                <label class="col-sm-3 col-form-label">Pertanyaan<?= $i?></label>
                <div class="col-sm-2">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="membershipRadios<?= $i?>" id="membershipRadios1" value="option1" checked>
                      Sangat Besar
                    </label>
                  </div>
                </div>

                <div class="col-sm-2">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="membershipRadios<?= $i?>" id="membershipRadios2" value="option2" checked>
                      Besar
                    </label>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="membershipRadios<?= $i?>" id="membershipRadios3" value="option3" checked>
                      Cukup Besar
                    </label>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="membershipRadios<?= $i?>" id="membershipRadios4" value="option4">
                      Kurang
                    </label>
                  </div>
                </div>
            
              </div>
              <hr>
              <?php endFor;?>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </div>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>