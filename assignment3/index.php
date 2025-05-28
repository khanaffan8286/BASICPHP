<?php
 session_start();

if(isset($_SESSION['email'])){
  
}
else{

    header("Location: login.php");
}
   


$server = "localhost";
    $username = "root"; 
    $Pass = "";
    $database = "form"; 

  $conn = mysqli_connect($server, $username, $Pass,$database);

  $sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'firstname';
$sortOrder = isset($_GET['order']) && strtolower($_GET['order']) === 'desc' ? 'DESC' : 'ASC';
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 10;
$offset = ($page - 1) * $limit;


$allowedSorts = ['firstname', 'email', 'dob'];
if (!in_array($sortColumn, $allowedSorts)) {
    $sortColumn = 'firstname';
}


$countQuery = "SELECT COUNT(*) as total FROM `form`";
$countResult = mysqli_query($conn, $countQuery);
$totalRows = mysqli_fetch_assoc($countResult)['total'];
$totalPages = ceil($totalRows / $limit);


$sql = $sql = "SELECT * FROM `form` WHERE status = '1' ORDER BY $sortColumn $sortOrder LIMIT $limit OFFSET $offset";

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
       <h1 class="text-2xl font-bold mb-6">User List</h1>
       <a href="logout.php" class=" bg-yellow-600 absolute top-4 right-4 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200">Logged Out</a>
       <div class="flex justify-end mb-4">
  <a class="btn bg-blue-500 text-white px-4 py-2 rounded" href="index2.php">Add User</a>


        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <?php
                    function sortLink($column, $label, $currentSort, $currentOrder) {
                        $order = ($currentSort === $column && $currentOrder === 'asc') ? 'desc' : 'asc';
                        return "<a href='?sort=$column&order=$order' class='hover:underline'>$label</a>";
                    }
                    $sort = $_GET['sort'] ?? 'firstname';
                    $order = $_GET['order'] ?? 'asc';
                    ?>
                    <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <tr>
                            <th class="py-3 px-6 text-left"><?= sortLink('firstname', 'Name', $sort, $order) ?></th>
                            <th class="py-3 px-6 text-left"><?= sortLink('email', 'Email', $sort, $order) ?></th>
                            <th class="py-3 px-6 text-left"><?= sortLink('dob', 'DOB', $sort, $order) ?></th>
                            <th class="py-3 px-6 text-center">Actions</th>
                        </tr>
                    </thead>

                <tbody class="text-gray-700 text-sm font-light">
                    
                    <?php foreach ($users as $user): ?>
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <!-- <td class="py-3 px-6 text-left">
                                <?= htmlspecialchars($user['id'] ) ?>
                            </td> -->
                            <td class="py-3 px-6 text-left">
                                <?= htmlspecialchars($user['firstname'] . ' ' . $user['lastname']) ?>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <?= htmlspecialchars($user['email']) ?>
                            </td>
                            <td class="py-3 px-6 text-left">
                              <?= htmlspecialchars(date("d-m-Y", strtotime($user['dob']))) ?>

                            </td>
                             <!-- <td class="py-3 px-6 text-left">
                                <?= htmlspecialchars($user['Address']) ?>
                            </td> -->
                         <td class="py-3 px-6 text-center">
    <!-- Edit Form -->
    <form action="edit.php" method="POST" style="display: inline;">
        <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
        <input type="hidden" name="firstname" value="<?= htmlspecialchars($user['firstname']) ?>">
        <input type="hidden" name="email" value="<?= htmlspecialchars($user['email']) ?>">
        <input type="hidden" name="lastname" value="<?= htmlspecialchars($user['lastname']) ?>">
        <input type="hidden" name="dob" value="<?= htmlspecialchars($user['dob']) ?>">
        <input type="hidden" name="Address" value="<?= htmlspecialchars($user['Address']) ?>">
         <input type="hidden" name="Pass" value="<?= htmlspecialchars($user['Pass']) ?>">
          <input type="hidden" name="ConfirmPassword" value="<?= htmlspecialchars($user['ConfirmPassword']) ?>">
            <input type="hidden" name="Age" value="<?= htmlspecialchars($user['Age']) ?>">
           <input type="hidden" name="Gender" value="<?= htmlspecialchars($user['Gender']) ?>">
            <input type="hidden" name="Zipcode" value="<?= htmlspecialchars($user['Zipcode']) ?>">
             <input type="hidden" name="Mobilenumber" value="<?= htmlspecialchars($user['Mobilenumber']) ?>">
         
           
        <button type="submit" class="text-blue-600 hover:underline mr-3 bg-transparent border-none p-0 cursor-pointer">
            Edit
        </button>
    </form>

    <!-- Delete Form -->
    <form action="delete.php" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete the user <?= htmlspecialchars($user['firstname'].' '.$user['lastname']) ?>?');">
        <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
        <input type="hidden" name="status" value="<?= htmlspecialchars($user['status']) ?>">
       
        <button type="submit" class="text-red-600 hover:underline bg-transparent border-none p-0 cursor-pointer" >
            Delete
        </button>
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
    <!-- <?php if ($page > 1): ?>
        <a href="?sort=<?= $sort ?>&order=<?= $order ?>&page=<?= $page - 1 ?>" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Previous</a>
    <?php endif; ?> -->

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?sort=<?= $sort ?>&order=<?= $order ?>&page=<?= $i ?>"
           class="px-3 py-2 <?= $i == $page ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' ?> rounded hover:bg-blue-400"><?= $i ?></a>
    <?php endfor; ?>

    <!-- <?php if ($page < $totalPages): ?>
        <a href="?sort=<?= $sort ?>&order=<?= $order ?>&page=<?= $page + 1 ?>" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Next</a>
    <?php endif; ?> -->
</div>

        </div>
    </div>
</body>
</html>
