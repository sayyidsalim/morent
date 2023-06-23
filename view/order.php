<?php
session_start();
if ($_SESSION["login"] != true) {
  header("Location = login.php");
}
include_once __DIR__ . "/../repository/products.php";
include_once __DIR__ . "/../repository/order.php";
$products = new products;
$product_id = $_GET["id"];
$user_id = $_SESSION["user_id"];
$dataProduct = $products->getForOrder($product_id);
$harga_product = $dataProduct["harga"];


if (isset($_SERVER["REQUEST_METHOD"]) == "POST") {
  if (isset($_POST["submit"])) {
    $location_pick = $_POST["location_pick"];
    $date_pick = $_POST["date_pick"];
    $time_pick = $_POST["time_pick"];

    $location_drop = $_POST["location_drop"];
    $date_drop = $_POST["date_drop"];
    $time_drop = $_POST["time_drop"];

    $waktu_order_dimulai = $time_pick . "  " . $date_pick . "  " . $location_pick;
    $waktu_order_selesai = $time_drop . "  " . $date_drop . "  " . $location_drop;

    $nama_penerima = $_POST["nama_info"];
    $alamat_penerima = $_POST["alamat_info"];
    $telepon_penerima = $_POST["telepon_info"];
    $negara_penerima = $_POST["negara_info"];
    $nama_rekening = $_POST["nama_rekening"];
    $nomor_rekening = $_POST["nomer_rekening"];
    $order = new order;
    $idOrder = $insert =
      $order->insertInOrder(
        $product_id,
        $user_id,
        $waktu_order_dimulai,
        $waktu_order_selesai,
        $nama_penerima,
        $alamat_penerima,
        $telepon_penerima,
        $negara_penerima,
        $harga_product
      );

    if (isset($_POST["cash"]) || isset($_POST["bank_bri"])) {
      $cash = $_POST["cash"];
      $bank_bri = $_POST["bank_bri"];
      if (isset($_POST["cash"])) {
        $metode_pembayaran = $cash;
        $nama_rekening = null;
        $nomor_rekening = null;
        $pembayaran = $order->pembayaran($idOrder, $metode_pembayaran, $nama_rekening, $nomor_rekening);
        if ($nama_rekening != null || $nomor_rekening != null) {
          $pembayaran = false;
          $invalid = "anda tidak perlu memasukkan data rekening";
        }
      } else if (isset($_POST["bank_bri"])) {
        $metode_pembayaran = $_POST["bank_bri"];
        $pembayaran = $order->pembayaran($idOrder, $metode_pembayaran, $nama_rekening, $nomor_rekening);
        if ($nomor_rekening == null || $nama_rekening == null) {
          $pembayaran = false;
          $invalid = "anda perlu memasukkan data rekening";
        }
      }
    }
    if ($pembayaran == false) {
      return false;
      $invalid = "mohon lihat kembali data yang anda isikan";
    } else {
      if ($_SESSION["role"] == "admin") {
        header("Location: dashbord.php");
        echo "<script>ada data baru masuk</script>";
      } else if ($_SESSION["role"] == "user") {
        header("Location: index.php");
        echo "<script>data anda sedang di proses</script>";
      }
    }
  }
}
?>
<?php include_once __DIR__ . "/header.php" ?>
<div class="container-order flex gap-10 mt-20 mb-20 justify-center flex-wrap">
  <div class="transction flex flex-col gap-5 max-[1000px]:order-2 max-[1000px]:px-20">
    <div class="transaction-date w-[852px] max-[1000px]:w-[327px]  bg-white p-5 rounded-lg max-[1000px]:order-2">
      <div class="logo mb-3">
        <h1 class="font-semibold text-2xl font-serif">Rental Info</h1>
        <h3 class="text-slate-400 text-md font-semibold">Please Select Your Date</h3>
        <p class="float-right text-slate-400 font-bold">Step 2 of 4</p>
      </div>
      <?php if (isset($_POST["submit"])) : ?>
        <h1><?= $invalid ?></h1>
      <?php endif; ?>
      <form action="" method="post">
        <input type="radio" id="pick-up_order" class="">
        <label for="pick-up_order" class="font-bold font-serif ml-2 text-lg">Pick-Up</label>
        <div class="pick-up__order flex mt-3 gap-3 flex-wrap">
          <div class="mt-3" id="pick-up-location">
            <h1 class="font-bold text-lg mb-2">Location</h1>
            <select name="location_pick" id="" class="w-[386px] max-[1000px]:w-[295px] bg-[#F6F7F9] p-3 rounded-xl group text-slate-400 hover:text-red-500 hover:ring-1 hover:bg-blue-100">
              <option value="" class="group-hover:hidden">Select Your Locations
              </option>
              <?php foreach ($contries as $cont) : ?>
                <option value="<?= $cont ?>"><?= $cont ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="mt-3" id="date_pick">
            <h1 class="font-bold text-lg mb-2">Date</h1>
            <input type="date" name="date_pick" id="" class="w-[386px] max-[1000px]:w-[295px] bg-[#F6F7F9] p-3 rounded-xl group text-slate-400 hover:text-red-500 hover:ring-1 hover:bg-blue-200">
            </input>
          </div>

          <div class="mt-3" id="time_pick">
            <h1 class="font-bold text-lg mb-2">Time</h1>
            <input type="Time" name="time_pick" id="" class="w-[386px] max-[1000px]:w-[295px] bg-[#F6F7F9] p-3 rounded-xl group text-slate-400 hover:text-red-500 hover:ring-1 hover:bg-blue-200">
            </input>
          </div>

        </div>
        <!--  -->

        <input type="radio" id="drop" class="">
        <label for="pick-up_order" class="font-bold font-serif ml-2 text-lg">Drop-Off</label>
        <div class="pick-up__order flex mt-3 gap-3 flex-wrap">
          <div class="mt-3" id="location_drop">
            <h1 class="font-bold text-lg mb-2">Location</h1>
            <select name="location_drop" id="" class="w-[386px] max-[1000px]:w-[295px] bg-[#F6F7F9] p-3 rounded-xl group text-slate-400 hover:text-red-500 hover:ring-1 hover:bg-blue-100">
              <option value="" class="group-hover:hidden">Select Your City
              </option>
              <?php foreach ($contries as $cont) : ?>
                <option value="<?= $cont ?>"><?= $cont ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="mt-3" id="date_drop">
            <h1 class="font-bold text-lg mb-2">Date</h1>
            <input type="date" name="date_drop" id="" class="w-[386px] max-[1000px]:w-[295px] bg-[#F6F7F9] p-3 rounded-xl group text-slate-400 hover:text-red-500 hover:ring-1 hover:bg-blue-200">
            </input>
          </div>

          <div class="mt-3" id="time_drop">
            <h1 class="font-bold text-lg mb-2">Time</h1>
            <input type="time" name="time_drop" placeholder="Enter Your Time" id="" class="w-[386px] max-[1000px]:w-[295px] bg-[#F6F7F9] p-3 rounded-xl group text-slate-400 hover:text-red-500 hover:ring-1 hover:bg-blue-200">
            </input>
          </div>
        </div>
    </div>
    <!-- akhir transaction date -->

    <div class="transaction-info w-[852px] bg-white rounded-lg p-5 max-[1000px]:order-1 max-[1000px]:w-[327px] ">
      <div class="logo mb-3">
        <h1 class="font-semibold text-2xl font-serif">Billing Info</h1>
        <h3 class="text-slate-400 text-md font-semibold">Plase Enter Your Billing Info</h3>
        <p class="float-right text-slate-400 font-bold">Step 1 of 4</p>
      </div>

      <div class="flex mt-3 gap-5 flex-wrap">
        <div class="mt-3" id="name_info">
          <h1 class="font-bold text-lg mb-2">Name</h1>
          <input type="text" placeholder="Your Name" name="nama_info" id="" class="w-[350px] bg-[#F6F7F9] max-[1000px]:w-[295px] p-3 rounded-xl group text-slate-400 placeholder:font-semibold placeholder:text-slate-400 hover:ring-1 hover:bg-blue-100 focus:text-blue-300 focus:font-bold"></input>
        </div>

        <div class="mt-3" id="alamat_info">
          <h1 class="font-bold text-lg mb-2">Addres</h1>
          <input type="text" placeholder="Addres" name="alamat_info" id="" class="w-[350px] bg-[#F6F7F9] max-[1000px]:w-[295px] p-3 rounded-xl group text-slate-400 placeholder:font-semibold placeholder:text-slate-400 hover:ring-1 hover:bg-blue-100  focus:text-blue-300 focus:font-bold"></input>
        </div>

        <div class="mt-3" id="telepon_info">
          <h1 class="font-bold text-lg mb-2">Phone Number</h1>
          <input type="text" placeholder="Phone Number" name="telepon_info" id="" class="w-[350px] bg-[#F6F7F9] max-[1000px]:w-[295px] p-3 rounded-xl group text-slate-400 placeholder:font-semibold placeholder:text-slate-400 hover:ring-1 hover:bg-blue-100 focus:text-blue-300 focus:font-bold"></input>
        </div>

        <div class="mt-3" id="negara_info">
          <h1 class="font-bold text-lg mb-2">Town/City</h1>
          <input type="text" placeholder="Town Or City" name="negara_info" id="" class="w-[350px] bg-[#F6F7F9] max-[1000px]:w-[295px] p-3 rounded-xl group text-slate-400 placeholder:font-semibold placeholder:text-slate-400 hover:ring-1 hover:bg-blue-100 focus:text-blue-300 focus:font-bold"></input>
        </div>
      </div>
    </div>
    <!-- akhir transaction info -->

    <div class="payment-method w-[852px] bg-white rounded-lg p-5 max-[1000px]:order-1 max-[1000px]:w-[327px] ">
      <div class="logo mb-3">
        <h1 class="font-semibold text-2xl font-serif">Payment Method</h1>
        <h3 class="text-slate-400 text-md font-semibold">Plase Enter Your Payment Method</h3>
        <p class="float-right text-slate-400 font-bold">Step 3 of 4</p>
      </div>

      <div class="bank">
        <input type="radio" name="bank_bri" value="bank bri">
        <label for="" class="bank font-semibold font-serif text-xl">Bank Bri</label>
        <br>
        <input type="radio" name="cash" value="cash">
        <label for="" class="cash font font-semibold font-serif text-xl">cash</label>
        <div class="flex mt-3 gap-5 flex-wrap bg-[#E3E3E3] p-4 rounded-lg justify-center">
          <div class="mt-3" id="pick-up-location">
            <h1 class="font-bold text-lg mb-2">Nama Rekening</h1>
            <input type="text" placeholder="Your Name" name="nama_rekening" id="" class="w-[362px] bg-[#F6F7F9] max-[1000px]:w-[263px] p-3 rounded-xl group text-slate-400 placeholder:font-semibold placeholder:text-slate-400 hover:ring-1 hover:bg-blue-100 focus:text-blue-300 focus:font-bold"></input>
          </div>

          <div class="mt-3" id="pick-up-location">
            <h1 class="font-bold text-lg mb-2">No Rekening</h1>
            <input type="text" placeholder="Nomer Rekening" name="nomer_rekening" id="" class="w-[362px] bg-[#F6F7F9] max-[1000px]:w-[263px] p-3 rounded-xl group text-slate-400 placeholder:font-semibold placeholder:text-slate-400 hover:ring-1 hover:bg-blue-100  focus:text-blue-300 focus:font-bold"></input>
          </div>
        </div>
      </div>
      <div class="submit-order bg-green-400 w-32 mx-auto p-4 rounded-lg flex items-center justify-center hover:-translate-y-4 duration-75 mt-10">
        <button class="font-bold text-xl font-serif text-red-800" type="submit" name="submit">order</button>
      </div>
      </form>
    </div>
    <!-- akhir payment method -->
  </div>
  <!-- akhir transaction -->
  <div class="car-rentalin w-[492px] h-[450px] max-[1000px]:h-[480px] max-[1000px]:w-[327px] bg-white rounded-lg max-[1000px]:order-1 p-5">
    <h1 class="text-lg font-bold">Rental Summary</h1>
    <p class="text-slate-400 font-bold text-sm mt-2">Prices may change depending on the length of the rental and the price of your rental car.</p>

    <div class="flex gap-10 mt-2">
      <span class="imag-order-product bg-[url(../img/bgbiru.png)] bg-cover mt-3 p-4 rounded-xl">
        <img src="../img/<?= $dataProduct["gambar_1"] ?>" alt="" class="w-32">
      </span>
      <span>
        <h1 class="text-xl font-bold mt-2"><?= $dataProduct["name"] ?></h1>
      </span>
    </div>

    <hr class="w-[80%] mx-auto bg-black my-10 flex-wrap">
    <div class="flex justify-between">
      <p class=" text-slate-400 font-bold text-lg">Subtotal</p>
      <p class="font-bold text-xl"><?= $dataProduct['harga'] ?></p>
    </div>
    <div class="flex justify-between mt-4">
      <p class=" text-slate-400 font-semibold text-lg">Tax</p>
      <p class="font-bold text-xl">$.0</p>
    </div>
    <div class="flex justify-between mt-3">
      <span>
        <h1 class="font-bold mt-5 text-2xl">Total Rental Price</h1>
        <p>Overall price and includes rental discount</p>
      </span>
      <h1 class="font-bold text-xl mt-10"><?= $dataProduct["harga"] ?></h1>
    </div>
  </div>
</div>
<!-- akhir container-order -->
<?php include_once __DIR__ . "/footer.php" ?>