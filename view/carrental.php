<?php include_once __DIR__ . "/header.php" ?>
<div class="flex container-car-rental">
  <?php include_once __DIR__ . "/sidebaradmin.php" ?>
  <div class="w-[852px] max-[1000px]:w-[327px] bg-white mx-auto posting flex flex-col gap-10 my-36 rounded-xl shadow-gray-600 h-auto relative" id="posting">
    <div class="logo p-5">
      <img src="../img/Logo(2).png" alt="" class="mx-auto">
      <p class="text-slate-200 font-bold mt-3 text-center text-xl">Please Enter Your Car Data</p>
    </div>
    <!-- akhir logo -->

    <form action="" method="post" enctype="multipart/form-data">

      <h1 class="font-serif font-bold text-slate-400 text-center text-lg">isi data</h1>
      <div class="input-posting flex p-5 flex-wrap gap-4">
        <div class="mt-3" id="nama-product">
          <h1 class="font-bold text-lg mb-2">Car Name</h1>
          <input type="text" placeholder="Enter Your Car Name" name="" id="" class="w-[386px] bg-[#F6F7F9] max-[1000px]:w-[295px] p-3 rounded-xl group text-slate-400 placeholder:font-semibold placeholder:text-slate-400 hover:ring-1 hover:bg-blue-100 focus:text-blue-300 focus:font-bold focus:outline-none border focus:border-blue-400"></input>
        </div>

        <div class="mt-3" id="pick-up-location">
          <h1 class="font-bold text-lg mb-2">Steering</h1>
          <input type="text" placeholder="Steering" name="" id="" class="w-[386px] bg-[#F6F7F9] max-[1000px]:w-[295px] p-3 rounded-xl group text-slate-400 placeholder:font-semibold placeholder:text-slate-400 hover:ring-1 hover:bg-blue-100 focus:text-blue-300 focus:font-bold focus:outline-none border focus:border-blue-400"></input>
        </div>

        <div class="mt-3" id="pick-up-location">
          <h1 class="font-bold text-lg mb-2">Gasoline</h1>
          <input type="text" placeholder="Gasoline" name="" id="" class="w-[386px] bg-[#F6F7F9] max-[1000px]:w-[295px] p-3 rounded-xl group text-slate-400 placeholder:font-semibold placeholder:text-slate-400 hover:ring-1 hover:bg-blue-100 focus:text-blue-300 focus:font-bold focus:outline-none border focus:border-blue-400"></input>
        </div>

        <div class="mt-3" id="pick-up-location">
          <h1 class="font-bold text-lg mb-2">Description</h1>
          <textarea name="" id="" cols="38" rows="3" placeholder="Enter A Description For Car" class="rounded-xl p-3 placeholder:text-slate-400 hover:ring-1 focus:outline-none border bg-[#F6F7F9] focus:border-blue-400 focus:text-blue-300  max-[1000px]:w-[295px]"></textarea>
        </div>

        <div class="mt-3" id="pick-up-location">
          <h1 class="font-bold text-lg mb-2">Price</h1>
          <input type="text" placeholder="Price Car" name="" id="" class="w-[386px] bg-[#F6F7F9] max-[1000px]:w-[295px] p-3 rounded-xl group text-slate-400 placeholder:font-semibold placeholder:text-slate-400 hover:ring-1 hover:bg-blue-100 focus:text-blue-300 focus:font-bold focus:outline-none border focus:border-blue-400"></input>
        </div>

        <div class="mt-3" id="pick-up-location">
          <h1 class="font-bold text-lg mb-2">Capacity</h1>
          <select name="" id="" class="w-[386px] max-[1000px]:w-[295px] p-3 rounded-xl group text-slate-400 hover:text-red-500 hover:ring-1 hover:bg-blue-100">
            <option value="" class="group-hover:hidden">Select Your City
            </option>
            <option value="">2 Person</option>
            <option value="">4 Person</option>
            <option value="">6 Person</option>
            <option value="">8 Or More</option>
          </select>
        </div>
        <div class="mt-3" id="pick-up-location">
          <h1 class="font-bold text-lg mb-2">Type Car</h1>
          <select name="" id="" class="w-[386px] max-[1000px]:w-[295px] p-3 rounded-xl group text-slate-400 hover:text-red-500 hover:ring-1 hover:bg-blue-100">
            <option value="" class="group-hover:hidden">Select Your City
            </option>
            <option value="">Sport</option>
            <option value="">SUV</option>
            <option value="">6 Person</option>
            <option value="">8 Or More</option>
          </select>
        </div>

      </div>
      <!-- akhir posting -->
      <h1 class="font-serif font-bold text-slate-400 text-center text-lg">gambar</h1>

      <div class="upload input-posting flex p-5 flex-wrap gap-4">

        <div class="mt-3" id="pick-up-location">
          <h1 class="font-bold text-lg mb-2">Gambar-utama</h1>
          <input type="file" placeholder="Price Car" name="" id="" class="w-[386px] bg-[#F6F7F9] max-[1000px]:w-[295px] p-3 rounded-xl group text-slate-400 placeholder:font-semibold placeholder:text-slate-400 hover:ring-1 hover:bg-blue-100 focus:text-blue-300 focus:font-bold focus:outline-none border focus:border-blue-400 "></input>
        </div>

        <div class="mt-3" id="pick-up-location">
          <h1 class="font-bold text-lg mb-2">Gambar Keadaan Depan</h1>
          <input type="file" placeholder="Price Car" name="" id="" class="w-[386px] bg-[#F6F7F9] max-[1000px]:w-[295px] p-3 rounded-xl group text-slate-400 placeholder:font-semibold placeholder:text-slate-400 hover:ring-1 hover:bg-blue-100 focus:text-blue-300 focus:font-bold focus:outline-none border focus:border-blue-400 "></input>
        </div>

        <div class="mt-3" id="pick-up-location">
          <h1 class="font-bold text-lg mb-2">Gambar Keadaan belakang</h1>
          <input type="file" placeholder="Price Car" name="" id="" class="w-[386px] bg-[#F6F7F9] max-[1000px]:w-[295px] p-3 rounded-xl group text-slate-400 placeholder:font-semibold placeholder:text-slate-400 hover:ring-1 hover:bg-blue-100 focus:text-blue-300 focus:font-bold focus:outline-none border focus:border-blue-400 "></input>
        </div>
      </div>
  </div>
  </form>
</div>
<!-- akhir container car rental -->
<?php include_once __DIR__ . "/footer.php" ?>