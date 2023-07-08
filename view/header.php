<?php
require_once __DIR__ . "/../repository/admin.php";
$admin = new admin;
for ($i = 1; $i <= 6; $i++) {
  $data[$i] = $admin->getByStatistict($i);
}
require_once __DIR__ . "/../repository/search.php";
if (isset($_POST["search"])) {
  $search = new search;
  $dataCari = $search->searchBy($_POST["search"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Morent</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="../app/fontawesome-free-6.4.0-web/css/all.css">
  <script>
    /**
     * disini saya membuat sebuah script untuk memanggil canvas yang akan mengisi sebuah halaman dashbord statistict fitur
     */
    var kategori = ["sport", "SUV", "MPV", "sedan", "coupe", "hatchback"];
    window.onload = function() {
      var options = {
        animationEnabled: true,
        data: [{
          type: "doughnut",
          innerRadius: "40%",
          showInLegend: true,
          legendText: "{label}",
          indexLabel: "{label}: #percent%",
          dataPoints: [{
              label: kategori[0],
              y: <?= $data[1] ?>
            },
            {
              label: kategori[1],
              y: <?= $data[2] ?>
            },
            {
              label: kategori[2],
              y: <?= $data[3] ?>
            },
            {
              label: kategori[3],
              y: <?= $data[4] ?>
            },
            {
              label: kategori[4],
              y: <?= $data[5] ?>
            },
            {
              label: kategori[5],
              y: <?= $data[6] ?>
            }
          ]
        }]
      };
      $("#chartContainer").CanvasJSChart(options);

    }
  </script>
</head>
</head>

<body class="bg-[#C3D4E9] overflow-x-hidden">
  <nav class="bg-[#ffff] w-[100%]">
    <div class="container-navbar w-full flex p-8">
      <div class="logo w-[20%] mt-1 group z-10" id="logo">
        <a href="index.php" class="inline-block group-hover:scale-125 duration-200">
          <img src="../img/Logo(2).png" alt="">
        </a>
      </div>
      <!-- akhir logo -->
      <div class="pencarian w-[45%] transition-all" id="pencarian">
        <form action="" method="post">
          <input type="search" name="search" placeholder="search something here" class="w-full p-2 rounded-full ring-1 max-[767px]:p-1 max-[767px]:mx-10 hover:ring-2 placeholder:text-blue-400 hover:placeholder:text-blue-600 hover:placeholder:text-center duration-300 lg:mx-8 md:mx-6 placeholder:text-sm focus:outline-none text-blue-400 font-semibold" id="pencarian-input">
        </form>
      </div>
      <!-- akhir pencarian -->
      <div class="user mb-1 ml-36 w-[25%] max-[767px]:ml-14">
        <ul class="flex max-[767px]:block">
          <li class="mr-4 max-[767px]:hidden list">
            <button class="border rounded-full w-10 h-10 hover:bg-gray-200 group duration-150">
              <i class="fa-solid fa-heart fa-bounce fa-lg"></i>
            </button>
          </li>

          <li class="mr-4 max-[767px]:hidden list">
            <button class="border rounded-full w-10 h-10 hover:bg-gray-200 group duration-150">
              <i class="fa-solid fa-bell fa-beat fa-lg"></i>
            </button>
          </li>

          <li class="mr-4 max-[767px]:hidden list">
            <button class="border rounded-full w-10 h-10 hover:bg-gray-200 group duration-150">
              <i class="fa-solid fa-gear fa-flip fa-lg"></i>
            </button>
          </li>

          <li class="ml-10 mr-3 max-[767px]:ml-10 max-[767px]:translate-y-[-2] ">
            <button class="border rounded-full w-10 h-10 hover:bg-gray-200 group duration-150" id="user">
              <i class="fa-heart fa-lg"></i>
            </button>
          </li>
        </ul>
      </div>
      <!-- akhit user -->
    </div>
    <!-- akhir container logo -->
  </nav>
  <!-- akhir navbar -->