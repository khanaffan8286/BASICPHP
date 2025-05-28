<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <!-- component -->
    <?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $Pass = $_POST['pass'];
    echo '<div class="bg-green-100 p-4 rounded-lg">
    <h2 class="text-green-800 text-xl font-bold">Thank You!</h2>
    <p class="text-gray-700">Your message has been successfully submitted.</p>
</div>';
  }
  ?>
<header>
  <nav>
    <div class="">
      <div class="flex justify-between h-16 px-10 shadow items-center">
        <div class="flex items-center space-x-8">
          <h1 class="text-xl lg:text-2xl font-bold cursor-pointer">Tailwind</h1>
          <div class="hidden md:flex justify-around space-x-4">
            <a href="#" class="hover:text-indigo-600 text-gray-700">Home</a>
            <a href="#" class="hover:text-indigo-600 text-gray-700">About</a>
            <a href="#" class="hover:text-indigo-600 text-gray-700">Service</a>
            <a href="#" class="hover:text-indigo-600 text-gray-700">Contact</a>
          </div>
        </div>
        <div class="flex space-x-4 items-center">
          <a href="#" class="text-gray-800 text-sm">LOGIN</a>
          <a href="#" class="bg-indigo-600 px-4 py-2 rounded text-white hover:bg-indigo-500 text-sm">SIGNUP</a>
        </div>
      </div>
    </div>
  </nav>
  
  <div class="h-screen bg-gray-100 flex justify-center">
    <div class="py-6 px-8 h-80 mt-20 bg-white rounded shadow-xl">
      <form action="/myfirstphp/post.php" method="POST">
       

        <div>
       
          <label for="email" class="block text-gray-800 font-bold">email:</label>
          <input type="email" name="email" id="email" placeholder="@email" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
          </div>
          <div class="mb-6">
          <label for="Pass" class="block text-gray-800 font-bold">Pass</label>
          <input type="Pass" name="Pass" id="pass" placeholder="Pass" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
       

         
        </div>
        <butt type="submit" class="cursor-pointer py-2 px-4 block mt-6 bg-indigo-500 text-white font-bold w-full text-center rounded">Login</butt>
      </form>
    </div>
  </div>
</header>
</body>
</html>