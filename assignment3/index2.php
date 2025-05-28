



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registration Form</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- jQuery UI CSS -->
<!-- Load jQuery first -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>



<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">


</head>
<style>
  #dob {
  background-image: url('https://img.icons8.com/ios/20/calendar--v1.png');
  background-repeat: no-repeat;
  background-position: right 10px center;
  background-size: 20px;
  cursor: pointer;
}

</style>
<body class="bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center min-h-screen">




  <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-md m-4">
    <h2 class="text-2xl font-bold mb-6 text-center">Registration Form</h2>
    <form class="space-y-4" action="/MYFIRSTPHP/assignment3/process2.php" id="form" method="POST">
      <div>
        <label for="firstname" class="block text-sm font-medium text-gray-700">First Name</label>
        <input type="text" id="firstname" name="firstname" 
               class="mt-1 w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
               <span id="firstnameerror" class="text-sm text-center font-medium text-red-600"></span>
      </div>
      <div>
        <label for="lastname" class="block text-sm font-medium text-gray-700">Last Name</label>
        <input type="text" id="lastname" name="lastname" 
               class="mt-1 w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
               <span id="lastnameerror" class="text-sm text-center font-medium text-red-600"></span>
      </div>

      <div>
        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
        <textarea id="address" name="address" rows="2"
                  class="mt-1 w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        <span id="addresserror" class="text-sm text-center font-medium text-red-600"></span>
      </div>

      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" name="email" 
               class="mt-1 w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
               <span id="emailerror" class="text-sm text-center font-medium text-red-600"></span>
      </div>
      <div>
        <label for="Pass" class="block text-sm font-medium text-gray-700">Password</label>
        <div class="relative">
          <input type="password" id="Pass" name="Pass"
            class="mt-1 w-full px-4 py-2 pr-10 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
        
          <button type="button" id="btnsvg" onclick="Passshow()" class="absolute inset-y-0 right-2 flex items-center text-gray-500">
            <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
              <circle cx="12" cy="12" r="3"/>
            </svg>
          </button>
        </div>
               <span id="Passerror" class="text-sm text-center font-medium text-red-600"></span>
      </div>
      <div>
        <label for="ConfirmPassword" class="block text-sm font-medium text-gray-700">Confirm Password</label>
        <div class="relative">
          <input type="password" id="ConfirmPassword" name="ConfirmPassword"
            class="mt-1 w-full px-4 py-2 pr-10 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
        
          <button type="button" id="btnsvg1" onclick="Passshow1()" class="absolute inset-y-0 right-2 flex items-center text-gray-500">
            <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
              <circle cx="12" cy="12" r="3"/>
            </svg>
          </button>
        </div>
               <span id="ConfirmPassworderror" class="text-sm text-center font-medium text-red-600"></span>
      </div>
      <div>
        <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
        <select id="gender" name="gender"
                class="mt-1 w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
          <option value="">Select</option>
          <option value="Female">Female</option>
          <option value="Male">Male</option>
          
        </select>
        <span id="gendererror" class="text-sm text-center font-medium text-red-600"></span>
      </div>

   <div>
  <label for="dob">Date of Birth</label>
  <input type="date" id="dob" name="dob" class="border px-3 py-2 rounded w-full" />
  <span id="doberror" class="text-sm text-red-600"></span>
  
</div>

<div class="mt-4">
  <label for="age">Age</label>
  <input type="number" id="age" name="age" readonly class="border px-3 py-2 rounded w-full" />
</div>



      <div>
        <label for="zip" class="block text-sm font-medium text-gray-700">Zip code</label>
        <input type="number" id="zip"  name="zip"
               class="mt-1 w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
               <span id="ziperror" class="text-sm text-center font-medium text-red-600"></span>
               
      </div>
      <div>
        <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile number</label>
        <input type="number" id="mobile"  name="mobile"
               class="mt-1 w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
               <span id="mobileerror" class="text-sm text-center font-medium text-red-600"></span>
               
      </div>
      
      
      <button type="submit"
              class="mr-4 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200">
        Register
      </button>
      <a id="reset"
      type="button"
      href=""
      
              class=" bg-yellow-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200">
        Reset
    </a>
    </form>
  </div>


<script src="script2.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    // Calculate max date (18 years ago from today)
    const today = new Date();
    const maxYear = today.getFullYear() - 18;
    const maxMonth = String(today.getMonth() + 1).padStart(2, '0');
    const maxDay = String(today.getDate()).padStart(2, '0');
    const maxDate = `${maxYear}-${maxMonth}-${maxDay}`;

    // Optional: Set a reasonable minimum age (e.g. 100 years old)
    const minYear = today.getFullYear() - 100;
    const minDate = `${minYear}-01-01`;

    // Set min and max on DOB input
    $('#dob').attr('max', maxDate);
    $('#dob').attr('min', minDate);

    // Trigger check when DOB changes
    $('#dob').on('change', check_dob);
});

function check_dob() {
    var dob = $("#dob").val();
    var error_dob = false;

    if (dob !== '') {
        var birthDate = new Date(dob);
        var today = new Date();

        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }

        if (age >= 18) {
            $("#doberror").text('');
            $("#dob").css("border", "2px solid #34F458");
            $("#age").val(age);
        } else {
            $("#doberror").text("You must be at least 18 years old.");
            $("#dob").css("border", "2px solid #F90A0A");
            $("#age").val('');
        }
    } else {
        $("#doberror").text("Please select your date of birth.");
        $("#dob").css("border", "2px solid #F90A0A");
        $("#age").val('');
    }
}
</script>

<script>
  let passhide = false;

function Passshow() {
  let pass = $('#Pass');

  if (!passhide) {
    pass.attr('type', 'text');
    passhide = true;
  } else {
    pass.attr('type', 'password');
    passhide = false;
  }
}

let passhide1 = false;

function Passshow1() {
  let pass1 = $('#ConfirmPassword');

  if (!passhide1) {
    pass1.attr('type', 'text');
    passhide1 = true;
  } else {
    pass1.attr('type', 'password');
    passhide1 = false;
  }
}

</script>


<script>
  // Function to show the toast
  function showToast() {
    const toast = document.getElementById("toast");
    toast.classList.remove("opacity-0", "pointer-events-none");
    toast.classList.add("opacity-100");

    // Hide the toast after 3 seconds
    setTimeout(() => {
      toast.classList.add("opacity-0", "pointer-events-none");
      toast.classList.remove("opacity-100");
    }, 3000);
  }

  // Call the function after form submission or desired event
  showToast(); // You can call this after a form submission or success event
</script>
</body>
</html>

