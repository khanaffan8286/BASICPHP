
<html>

<head>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<div class="overflow-x-auto rounded-lg border border-gray-300 shadow-md">
  <table class="min-w-full bg-white text-sm">
    <thead class="bg-gradient-to-r from-blue-600 to-blue-500 text-white">
      <tr>
        <th class="py-3 px-6 text-left font-semibold">ID</th>
        <th class="py-3 px-6 text-left font-semibold">firstname</th>
            <th class="py-3 px-6 text-left font-semibold">lastname</th>
        <th class="py-3 px-6 text-left font-semibold">email</th>
        <th class="py-3 px-6 text-left font-semibold">phone</th>
        <th class="py-3 px-6 text-left font-semibold">gender</th>
        <th class="py-3 px-6 text-left font-semibold">Date of Birth</th>
        <th class="py-3 px-6 text-left font-semibold">Age</th>
        <th class="py-3 px-6 text-left font-semibold">Zip Code</th>
        <th class="py-3 px-6 text-left font-semibold">status</th>
        <th class="py-3 px-6 text-left font-semibold col-2">Action</th>


      </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
        <?php  if(!empty($arr)){
            foreach($arr as $key => $value){

                if($value->status==1){
                    $status = '<span class="bg-green-500 p-2 rounded">Active</span>';
                }
                else{
                    $status = '<span class="bg-red-500 p-2 rounded">Deactive</span>';
                }
         ?>
      <tr class="hover:bg-gray-100 transition duration-150 ease-in-out">
        <td class="py-4 px-6 text-gray-800"><?=++$key?></td>
        <td class="py-4 px-6 text-gray-800"><?= $value->name?></td>
        <td class="py-4 px-6 text-gray-800"><?= $value->email?></td>
        <td class="py-4 px-6 text-gray-800"><?= $value->phone?></td>
        <td class="py-4 px-6 text-gray-800"><?= $value->language?></td>
        <td class="py-4 px-6 text-gray-800"><?= $value->gender?></td>
        <td class="py-4 px-6 text-gray-800"><?= $value->qualification?></td>
        <td class="py-4 px-6 text-gray-800"><img  src="<?= base_url()?>./uploads/<?=$value->image?>" width="40px"></td>
        <td class="py-4 px-6 text-gray-800"><?= $value->updated_on?></td>
        <td class="py-4 px-6 text-gray-800"><?= $value->added_on?></td>
        <td class="py-4 px-6 text-gray-800"><?= $status?></td>
         <td class="py-4 px-6 text-gray-700">
          <button class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded mr-2">Edit</button>
          <button class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded">Delete</button>
        </td>
        
        
      </tr>
      <?php }} else{?>

        <tr class="hover:bg-gray-100 transition duration-150 ease-in-out">
        <td class="py-4 px-6 text-gray-800">No record found</td>
       
      </tr>
      <?php }?>




    </tbody>
  </table>
</div>
</html>