<?php require_once(__DIR__.'/parts/_header.php'); ?>

<div class="container">

<div class="row">
  <div class="col mb-3">
    <a href="<?php echo site_url(''); ?>" class="ml-auto"><i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i></a>  
  </div>
</div>
<div class="row">
  <div class="col-lg-4 mb-3 my-lg-0">
    <form action="<?php echo $formaction; ?>" method="post">
      <div class="card border-primary">
        <div class="card-body">
          <h4 class="card-title"><?php echo getPropVal($food, 'name'); ?></h4>
            <div class="form-group">
              <label for="name">Név</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="helpIdName" placeholder="Név" value="<?php echo getPropVal($food, 'name'); ?>">
              <small id="helpIdName" class="form-text text-muted">Név</small>
            </div>
            <div class="form-group">
              <label for="weight">Weight (g)</label>
              <input type="text" name="weight" id="weight" class="form-control" placeholder="Weight" aria-describedby="helpId" value="<?php echo getPropVal($food, 'weight', '1000'); ?>">
            </div>
            <div class="form-group">
              <label for="dehidr_time">Aszalási idő (perc)</label>
              <input type="text" name="dehidr_time" id="dehidr_time" class="form-control" placeholder="Aszalási idő" aria-describedby="helpId" value="<?php echo getPropVal($food, 'dehidr_time'); ?>">
            </div>
            <div class="form-group">
              <label for="work_time">Elkészítési idő (perc)</label>
              <input type="text" name="work_time" id="work_time" class="form-control" placeholder="Elkészítési idő" aria-describedby="helpId" value="<?php echo getPropVal($food, 'work_time'); ?>">
            </div>
            <div class="form-group">
              <label for="price_1000g">Ár (1000 g)</label>
              <input type="text" name="price_1000g" id="price_1000g" class="form-control" placeholder="Ár (1000 g)" aria-describedby="helpId" value="<?php echo getPropVal($food, 'price_1000g'); ?>">
            </div>
            <div class="form-group">
              <label for="descr">Leírás</label>
              <textarea class="form-control" name="descr" id="descr" rows="3"><?php echo html_escape(getPropVal($food, 'descr')); ?></textarea>
            </div>

          </form>   
        </div>    
        <div class="card-footer text-right">
          <button type="submit" class="btn btn-primary" name="save_product" value="1"><i class="fa fa-check" aria-hidden="true"></i> Ment</button>
        </div>
          
      </div>
    </form>
  </div>

  <?php if (isset($ingredients)) : ?>
  <div class="col-lg-7">
    <form action="<?php echo site_url('edit/'.getPropVal($food, 'id')); ?>" method="post">
      <input type="hidden" name="food_id" id="input" class="form-control" value="<?php echo getPropVal($food, 'id'); ?>">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Összetevők</h4>
          
          <table class="table">
            <thead>
              <tr>
                <th>Név</th>
                <th>Mennyiség</th>
                <th></th>
              </tr>
            </thead>
            <tbody>

              <?php foreach ($ingredients as $ingr) : ?>
              <tr class="<?php echo empty($ingr->quantity_g) ? 'text-muted' : ''; ?>">
                <td scope="row"><a href="<?php echo site_url('edit/'. $ingr->id); ?>"><?php echo $ingr->name; ?></a></td>
                <td>
                  <input type="text" class="form-control" name="quantity_g[<?php echo $ingr->id; ?>]" id="quantity_g" placeholder="Mennyiség (g)" value="<?php echo $ingr->quantity_g ;?>">
                </td>
              </tr>
              <?php endforeach; ?>

            </tbody>
          </table>

        </div>
        <div class="card-footer text-right">
          <button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Ment</button>
        </div>
      </div>
    </form>
  </div>
  <?php endif; ?>

</div>

<?php require_once(__DIR__.'/parts/_footer.php'); ?>