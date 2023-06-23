<?php
include_once __DIR__ . "/../repository/products.php";
// memanggil data dan menampilkannya..
$products = new products;
$data = $products->getAllInSingleById($_GET["id"]);
$row = $data->fetch(PDO::FETCH_ASSOC);
?>

<?php include_once __DIR__ . "/header.php" ?>
<div class="container-single flex flex-wrap gap-8 max-[1400px]:justify-center">
  <?php include_once __DIR__ . "/sidebar.php" ?>
  <div class="content-1">
    <div class="">


    </div>
    <div class="card-single bg-[url(../img/bgbiru.png)] w-[492px] h-[360px] p-5 bg-cover mt-5 rounded-lg group">
      <h1 class="text-3xl text-white">Sports car with the best <br> design and acceleration</h1>
      <p class="text-slate-200 text-xl mt-3">Safety and comfort while driving a <br>
        futuristic and elegant sports car</p>
      <img src="../img/<?= $row["gambar_1"] ?>" alt="gambar mobil rental" class="mx-auto w-[380px] mt-16">
    </div>
    <!-- akhir card single -->

    <div class="flex justify-between">
      <div class="w-[148px] h-[124px] rounded-lg border border-blue-800 flex justify-center items-center mt-4">
        <div class="bg-[url(../img/bgbiru.png)] bg-cover w-[132px] h-[108px] rounded-lg flex items-center">
          <img src="../img/<?= $row["gambar_1"] ?>" alt="">
        </div>
      </div>

      <div class=" w-[148px] h-[124px] rounded-lg mt-4 flex items-center">
        <img src="../img/<?= $row["gambar_2"] ?>" alt="" class="mx-auto">
      </div>

      <div class="w-[148px] h-[124px] rounded-lg mt-4 flex items-center">
        <img src="../img/<?= $row["gambar_3"] ?>" alt="" class="mx-auto">
      </div>
    </div>
  </div>
  <!-- akhir content 1 -->

  <div class="content-2 mb-5">
    <div class="documentation w-[492px] h-[500px] bg-white mt-5 rounded-lg p-5">
      <h1 class="font-bold text-xl"><?= $row["name"] ?></h1>
      <p>
        <i class="fa-regular fa-star text-yellow-400"></i>
        <i class="fa-regular fa-star"></i>
        <i class="fa-regular fa-star"></i>
        <i class="fa-regular fa-star"></i>
        <i class="fa-regular fa-star"></i>
        <span>anjenk</span>
      </p>
      <p class="mt-5">
        <?= $row["description"] ?>
      </p>
      <div class="flex detail-1 mx-auto justify-between mt-20">
        <span class="text-slate-400 font-bold">Type Car</span>
        <span class="font-bold"><?= $row["kategori"] ?></span>
        <span class="text-slate-400 font-bold">Capacity</span>
        <span class="font-bold"><?= $row["person"] ?></span>
      </div>

      <div class="flex detail-1 mx-auto justify-between mt-5">
        <span class="text-slate-400 font-bold">Steering</span>
        <span class="font-bold"><?= $row["steering"] ?></span>
        <span class="text-slate-400 font-bold">Gasoline</span>
        <span class="font-bold"><?= $row["gasoline"] ?></span>
      </div>

      <div class="transaksi-single flex">
        <h1 class="text-3xl font-bold mt-7">$<?= $row["harga"] ?>.00/<span class="text-sm font-extrabold text-slate-300">day</span>
        </h1>

      </div>
      <button class="bg-[#3563E9] text-slate-200 w-24 h-12 rounded-md float-right hover:-translate-y-2 duration-150 group">
        <span class="font-semibold"><a href="order.php?id=<?= $_GET["id"] ?>">Rent Now</a></span>
      </button>
    </div>

  </div>
</div>
<!-- akhir container single -->
<?php include_once __DIR__ . "/footer.php" ?>