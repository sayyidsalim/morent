
<?php include_once __DIR__ . "/header.php" ?>
<div class="container-dashbord flex gap-10">
  <?php include_once __DIR__ . "/sidebaradmin.php" 
  ?>
  <div class="content-dashbord flex mt-10 mb-10 gap-6 flex-wrap justify-center">
    <div class="detail-cars bg-white w-[534px] p-4 rounded-lg">
      <h1 class="font-bold text-xl font-serif">Detail Rental</h1>

      <div class="car-logo flex bg-cover gap-5 mt-8">
        <span class="bg-[url(../img/bgbiru.png)] p-2 rounded-xl flex items-center justify-center bg-cover">
          <img src="../img/image.png" alt="" width="132px">
        </span>
        <span>
          <h1 class="text-2xl font-bold">Nissan-gt</h1>
          <p class="mt-2 text-slate-400 font-bold">sport Car</p>
        </span>
      </div>
      <!-- akhir logo car -->

      <div class="date&time mt-10 flex flex-col gap-5">
        <span>
          <input type="radio">
          <label for="" class="font-bold text-lg font-serif ml-2">Pick Up</label>
        </span>

        <div class="flex justify-between mt-4">
          <span>
            <h1 class="font-bold text-xl">Locations</h1>
            <select name="" id="" class="w-24 bg-white p-4">
              <option value="">phpp</option>
            </select>
          </span>
          <span>
            <h1 class="font-bold text-xl">Locations</h1>
            <select name="" id="" class="w-24 bg-white p-4">
              <option value="">phpp</option>
            </select>
          </span>
          <span>
            <h1 class="font-bold text-xl">Locations</h1>
            <select name="" id="" class="w-24 bg-white p-4">
              <option value="">phpp</option>
            </select>
          </span>
        </div>

        <span class="">
          <input type="radio">
          <label for="" class="font-bold text-lg font-serif ml-2">Pick Up</label>
        </span>

        <div class="flex justify-between mt-4">
          <span>
            <h1 class="font-bold text-xl">Locations</h1>
            <select name="" id="" class="w-24 bg-white p-4">
              <option value="">phpp</option>
            </select>
          </span>
          <span>
            <h1 class="font-bold text-xl">Locations</h1>
            <select name="" id="" class="w-24 bg-white p-4">
              <option value="">phpp</option>
            </select>
          </span>
          <span>
            <h1 class="font-bold text-xl">Locations</h1>
            <select name="" id="" class="w-24 bg-white p-4">
              <option value="">phpp</option>
            </select>
          </span>
        </div>

      </div>

      <!-- akhir date dan time -->
      <hr class="w-[80%] h-1 mx-auto my-10">
      <div class="harga">
        <h1 class="text-2xl font-semibold">Total Rental Price</h1>
        <span class="flex justify-between">
          <p class="font-bold text-slate-400 text-sm mt-2">Overall price and includes rental discount</p>
          <h1 class="text-2xl font-bold">$80.00</h1>
        </span>
      </div>
    </div>
    <!-- akhir detail cars -->

    <div class="admin w-[534px] flex flex-col gap-10">
      <div class="top-5 bg-white rounded-xl p-5">
        <h1 class="text-2xl font-bold">Top 5 Car Rental</h1>
        <div id="chartContainer" style="height: 300px; width: 100%;">
        </div>
      </div>

      <div class="recent-transaction w-[534px] bg-white p-4 rounded-xl">
        <h1 class="font-bold text-2xl">Recent Transaction</h1>

        <a href="?id=<?= $_GET["id"] ?>">
          <div class="">
            <span class="flex justify-between mt-4">
              <img src="../img/image.png" alt="" width="132" class="">
              <span class="">
                <h4 class="font-bold text-md mr-24"> Nisan Gt</h4>
                <p class="text-sm font-bold text-slate-400">sport</p>
              </span>
              <span>
                <p class="text-slate-300 font-bold">12 juli</p>
                <h4 class="font-bold text-xl">$80.00</h4>
              </span>
            </span>
          </div>
        </a>

      </div>
    </div>
    <!-- akhir admin -->
  </div>
  <!-- akhir content dashbord -->
</div>
<!-- akhir container dashbor -->
<?php include_once __DIR__ . "/footer.php" ?>