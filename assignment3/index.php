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

// Get sorting info
$sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'firstname';
$sortOrder = isset($_GET['order']) && strtolower($_GET['order']) === 'desc' ? 'DESC' : 'ASC';
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

// Get search query
$searchQuery = isset($_GET['query']) ? trim($_GET['query']) : '';
$escapedSearch = mysqli_real_escape_string($conn, $searchQuery);

// Validate sort column
$allowedSorts = ['firstname', 'email', 'dob'];
if (!in_array($sortColumn, $allowedSorts)) {
    $sortColumn = 'firstname';
}

// Base WHERE clause
$where = "WHERE status = '1'";
if (!empty($escapedSearch)) {
    $where .= " AND (firstname LIKE '%$escapedSearch%' 
                 OR lastname LIKE '%$escapedSearch%' 
                 OR email LIKE '%$escapedSearch%')";
}

// Count for pagination
$countQuery = "SELECT COUNT(*) as total FROM `form` $where";
$countResult = mysqli_query($conn, $countQuery);
$totalRows = mysqli_fetch_assoc($countResult)['total'];
$totalPages = ceil($totalRows / $limit);

// Main query
$sql = "SELECT * FROM `form` $where ORDER BY $sortColumn $sortOrder LIMIT $limit OFFSET $offset";
$check = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($check, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-2">User List</h1>
        <?php if (!empty($searchQuery)): ?>
            <p class="text-sm text-gray-600 mb-4">Showing results for "<strong><?= htmlspecialchars($searchQuery) ?></strong>"</p>
        <?php endif; ?>
        <a href="logout.php" class="bg-yellow-600 absolute top-4 right-4 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200">Log Out</a>
        <div class="flex justify-end mb-4">
            <form action="index.php" method="GET" class="mr-12">
                <input 
                    type="text" 
                    name="query" 
                    value="<?= htmlspecialchars($searchQuery) ?>"
                    placeholder="Search..." 
                    class="px-4 py-2 rounded-l-lg border border-slate-400 bg-slate-100 text-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-500"
                />
                <button 
                    type="submit" 
                    class="bg-slate-500 text-white px-4 py-2 rounded-r-lg hover:bg-slate-600 transition duration-200"
                >
                    Search
                </button>
            </form>
            <a class="btn bg-blue-500 text-white px-4 py-2 rounded" href="index2.php">Add User</a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <?php
                function sortLink($column, $label, $currentSort, $currentOrder, $query) {
                    $order = ($currentSort === $column && $currentOrder === 'asc') ? 'desc' : 'asc';
                    $urlQuery = !empty($query) ? "&query=" . urlencode($query) : "";
                    return "<a href='?sort=$column&order=$order$urlQuery' class='hover:underline'>$label</a>";
                }

                $sort = $_GET['sort'] ?? 'firstname';
                $order = $_GET['order'] ?? 'asc';
                ?>
                <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-6 text-left"><?= sortLink('firstname', 'Name', $sort, $order, $searchQuery) ?></th>
                        <th class="py-3 px-6 text-left"><?= sortLink('email', 'Email', $sort, $order, $searchQuery) ?></th>
                        <th class="py-3 px-6 text-left"><?= sortLink('dob', 'DOB', $sort, $order, $searchQuery) ?></th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm font-light">
                    <?php foreach ($users as $user): ?>
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left"><?= htmlspecialchars($user['firstname'] . ' ' . $user['lastname']) ?></td>
                            <td class="py-3 px-6 text-left"><?= htmlspecialchars($user['email']) ?></td>
                            <td class="py-3 px-6 text-left"><?= htmlspecialchars(date("d-m-Y", strtotime($user['dob']))) ?></td>
                            <td class="py-3 px-6 text-center">
                                <!-- Edit Form -->
                                <form action="edit.php" method="POST" style="display: inline;">
                                    <?php foreach ($user as $key => $value): ?>
                                        <input type="hidden" name="<?= htmlspecialchars($key) ?>" value="<?= htmlspecialchars($value) ?>">
                                    <?php endforeach; ?>
                                    <button type="submit" class="text-blue-600 hover:underline mr-3 bg-transparent border-none p-0 cursor-pointer">Edit</button>
                                </form>
                                <!-- Delete Form -->
                                <form action="delete.php" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete <?= htmlspecialchars($user['firstname'].' '.$user['lastname']) ?>?');">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
                                    <input type="hidden" name="status" value="<?= htmlspecialchars($user['status']) ?>">
                                    <button type="submit" class="text-red-600 hover:underline bg-transparent border-none p-0 cursor-pointer">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (empty($users)): ?>
                        <tr>
                            <td colspan="4" class="py-4 px-6 text-center text-gray-500">No users found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <div class="mt-4 flex justify-center space-x-2">
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a href="?sort=<?= $sort ?>&order=<?= $order ?>&page=<?= $i ?><?= !empty($searchQuery) ? '&query=' . urlencode($searchQuery) : '' ?>"
                       class="px-3 py-2 <?= $i == $page ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' ?> rounded hover:bg-blue-400">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</body>
</html>
