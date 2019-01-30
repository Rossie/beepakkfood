<?php require_once(__DIR__.'/parts/_header.php'); ?>

<div class="container">
  <div class="row">

    <!--pre>
    <?php var_export($allfood); ?>
    </pre-->

    <ul class="nav nav-tabs nav-stacked w-100">
        <li class="nav-item">
            <a href="<?php echo site_url('/typeproduct'); ?>" class="nav-link <?php echo $list == "product" ? "active" : ""; ?>">Termékek</a>
        </li>
        <li class="nav-item">
            <a href="<?php echo site_url('/typebase'); ?>" class="nav-link <?php echo $list == "base" ? "active" : ""; ?>">Alapanyagok</a>
        </li>
        <?php if (isset($_POST["search"])) :?>
        <li class="nav-item">
            <a href="" class="nav-link active">Keresés találatok</a>
        </li>
        <?php endif; ?>
    </ul>

    <table class="table product-table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <!--<th>Weight (g)</th>
          <th>Dehidr. time (m)</th>
          <th>Work time (m)</th-->
          <th>Price (Ft)</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($allfood as $food) : ?>            
        <tr>
          <td scope="row"><?php echo $food->id; ?></td>
          <td><a href="<?php echo site_url('edit/'. $food->id); ?>"><?php echo $food->name; ?></a></td>
          <!--td><?php echo $food->weight; ?></td>
          <td><?php echo $food->dehidr_time; ?></td>
          <td><?php echo $food->work_time; ?></td-->
          <td><?php echo $food->price_1000g; ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="6">
            <a name="" id="" class="btn btn-primary" href="<?php echo site_url('newitem'); ?>" role="button"><i class="fa fa-plus" aria-hidden="true"></i> Új</a>
          </td>
        </tr>
      </tfoot>
    </table>

  </div>
</div>

<?php require_once(__DIR__.'/parts/_footer.php'); ?>