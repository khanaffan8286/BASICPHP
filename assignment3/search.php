<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$server = "localhost";
$username = "root";
$password = "";
$database = "form";

$conn = mysqli_connect($server, $username, $password, $database);

$query = isset($_GET['query']) ? trim($_GET['query']) : '';
$escapedQuery = mysqli_real_escape_string($conn, $query);

$sql = "SELECT * FROM `form` 
        WHERE status = '1' AND 
        (firstname LIKE '%$escapedQuery%' OR 
         lastname LIKE '%$escapedQuery%' OR 
         email LIKE '%$escapedQuery%')";

$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-6">Search Results for "<?= htmlspecialchars($query) ?>"</h1>
        <a href="index.php" class="mb-4 inline-block text-blue-600 hover:underline">← Back to User List</a>
        
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-6 text-left">Name</th>
                        <th class="py-3 px-6 text-left">Email</th>
                        <th class="py-3 px-6 text-left">DOB</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm font-light">
                    <?php foreach ($users as $user): ?>
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left"><?= htmlspecialchars($user['firstname'] . ' ' . $user['lastname']) ?></td>
                            <td class="py-3 px-6 text-left"><?= htmlspecialchars($user['email']) ?></td>
                            <td class="py-3 px-6 text-left"><?= htmlspecialchars(date("d-m-Y", strtotime($user['dob']))) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (empty($users)): ?>
                        <tr>
                            <td colspan="3" class="py-4 px-6 text-center text-gray-500">No results found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
