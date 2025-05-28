<?php
include 'conn.php';

if(isset($_SESSION['email'])){
    header("Location: index.php");
}
else{
    
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-500 to-purple-600 min-h-screen flex items-center justify-center">

  <div class="bg-white bg-opacity-90 backdrop-blur-md rounded-lg shadow-lg p-8 max-w-sm w-full">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Welcome</h2>
    <form action="loginprocess.php" method="POST" class="space-y-6">
      <div>
        <label for="username" class="block text-gray-700 font-medium mb-2">Username</label>
        <input
          type="text"
          id="username"
          name="email"
          placeholder="Enter your username"
          required
          class="w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
      </div>
      <div>
        <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
        <input
          type="password"
          id="password"
          name="pass"
          placeholder="Enter your password"
          required
          class="w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
      </div>
      <button
        type="submit"
        name='login'
        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-md transition-colors"
      >
        Log In
      </button>
      <button
        type="submit"
        onclick="window.location.href='index2.php'";
        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-md transition-colors"
      >
        Registration
      </button>
    </form>
  </div>

</body>
</html>
