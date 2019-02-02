<?php require_once(__DIR__.'/parts/_header.php'); ?>

<div class="container">
  <div class="row">

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
        <li class="nav-item ml-auto">
            <a href="<?php echo site_url('newitem'); ?>" class="nav-link btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></a>
        </li>
    </ul>

    <table class="table product-table">
      <thead>
        <tr>
          <th class="text-muted">Id</th>
          <th>Név</th>
          <th>Súly (g) (késztermék)</th>
          <!--th>Ár (Ft)</th-->
          <th>Ár (1000g Ft)</th>
          <th>Leírás</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($allfood as $food) : ?>            
        <tr>
          <td scope="row" class="text-muted"><?php echo $food->id; ?></td>
          <td><a href="<?php echo site_url('edit/'. $food->id); ?>"><?php echo $food->name; ?></a></td>
          <td><?php echo number_format($food->weight); ?></td>
          <?php if ($list == "base"): ?>
          <td><?php echo number_format($food->price_1000g); ?></td>
          <?php else: ?>
          <td><?php echo number_format($food->price_1000g * 1000 / $food->weight); ?></td>
          <?php endif; ?>
          <td><?php echo mb_substr($food->descr, 0, 100); ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
      <!--tfoot>
        <tr>
          <td colspan="6">
            <a name="" id="" class="btn btn-primary" href="<?php echo site_url('newitem'); ?>" role="button"><i class="fa fa-plus" aria-hidden="true"></i> Új</a>
          </td>
        </tr>
      </tfoot-->
    </table>

  </div>
</div>

<?php require_once(__DIR__.'/parts/_footer.php'); ?>