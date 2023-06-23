<?php
session_start();
if ($_SESSION["login"] === true) {
  header("Location: order.php");
}
require_once __DIR__ . "/../repository/users.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["submit"])) {
    $users = new users;
    $data = $users->getByUsernameInLogin($_POST["username"]);
    $row = $data->fetch();
    if (password_verify($_POST["password"], $row["password"])) {
      $_SESSION["login"] = true;
      $_SESSION["role"] = $row["role"];
      $_SESSION["user_id"] = $row["id"];
    } else {
      $inValid = "Username/Password yang anda masukkan salah";
    }
  }
}
?>
<?php include_once __DIR__ . "/header.php" ?>

<div class="login-fitur w-[700px] max-[870px]:w-[530px] mx-auto p-8 my-52 bg-white shadow-lg">
  <img src="../img/Logo(2).png" alt="" class="mx-auto">

  <?php if (isset($_POST["submit"])) : ?>
    <h1 class="mx-auto text-red-600 italic my-5"><?= $inValid ?></h1>
  <?php endif; ?>
  <div class="login w-[35%] mx-auto mt-10">
    <form action="" method="post">
      <div class="flex flex-col gap-4">
        <div class="relative">
          <input type="text" placeholder="Username" class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" name="username">
          <svg class="absolute w-5 h-5 text-gray-400 left-3 top-2.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">

            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm0-2a6 6 0 100-12 6 6 0 000 12zm0-8a2 2 0 11-3.999-.001A2 2 0 0110 8z" clip-rule="evenodd" />
          </svg>
        </div>

        <div class="relative">
          <input type="password" placeholder="Password" class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" name="password">
          <svg class="absolute w-5 h-5 text-gray-400 left-3 top-2.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M4 7a4 4 0 016.5-3.33M2 10a10 10 0 1120 0v2a10 10 0 11-20 0v-2zm10 4v4m0 0H7m3-4h3m-3 4a3 3 0 100-6 3 3 0 000 6z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </div>
        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="submit">Login</button>
        <ul class="flex justify-between max-[870px]:block">
          <li class="font-bold text-slate-500"><a href="register.php">Registrasi</a></li>
          <li class="font-bold text-slate-500"><a href="">Forget Password</a></li>
        </ul>
      </div>
    </form>
  </div>
</div>
<?php include_once __DIR__ . "/footer.php" ?>