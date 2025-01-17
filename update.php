<?php include 'check.php'; 
include 'check.php'; 

$email = isset($_GET['email']) ? $_GET['email'] : '';

$query = "SELECT * FROM register WHERE Email = '$email'";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if($total > 0){
    $result = mysqli_fetch_assoc($data);
}else{
    $result = null;
}

?>

<!DOCTYPE html>
<html>
  <head>
    <link
      href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css">
    <meta
      name="viewport"
      content="width=device-width,initial-scale=1,maximum-scale=1"
    />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js"
      defer
    ></script>
  </head>
  
<body class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">

  </head>
  <body class="min-h-screen bg-gray-100 text-gray-900 flex flex-col">
    
    <div class="max-w-screen-xl m-0 sm:m-20 bg-white shadow sm:rounded-lg flex justify-center flex-1" >
    
      <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
        <div>
          <img
            src="https://storage.googleapis.com/devitary-image-host.appspot.com/15846435184459982716-LogoMakr_7POjrN.png"
            class="w-32 mx-auto"
          />
        </div>
        <div class="mt-12 flex flex-col items-center">
          <form action="#" method="POST">
            <h1 class="text-2xl xl:text-3xl font-extrabold">
              Update Registration
            </h1>
            <div class="w-full flex-1 mt-8">
              <div class="mx-auto max-w-xs">
                <input
                  class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                  type="text"
                  placeholder="name"
                  name = "name"
                  value="<?php echo isset($result['name']) ? $result['Name'] : ''; ?>"
                />
                <input
                  class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                  type="text"
                  placeholder="gender"
                  name = "gender"
                />
                <input
                  class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                  type="text"
                  placeholder="email"
                  name = "email"
                />
                <input
                  class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                  type="text"
                  placeholder="Address"
                  name = "address"
                />
                <button
                  class="mt-5 tracking-wide font-semibold bg-green-700 text-gray-100 w-full py-4 rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none"
                  type = "submit"    
                  name = "submit">
                  <svg
                    class="w-6 h-6 -ml-2"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                    <circle cx="8.5" cy="7" r="4" />
                    <path d="M20 8v6M23 11h-6" />
                  </svg>
                  <span class="ml-3">
                    Update
                  </span>
                </button>
              </form>

              <p class="mt-6 text-xs text-gray-600 text-center">
                The Recorded Data will be
                <a href="record.html" class="border-b border-gray-500 border-dotted">
                  Shown Here
                </a>
                and its
                <a href="#" class="border-b border-gray-500 border-dotted">
                  Privacy Policy
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="flex-1 bg-green-100 text-center hidden lg:flex">
        <div
          class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat"
          style="background-image: url('designer_life.svg');"
        ></div>
      </div>
    </div>
    
  </body>
</html>

<?php

    if (isset($_POST['submit'])){
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $gender = mysqli_real_escape_string($conn, $_POST['gender']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $address = mysqli_real_escape_string($conn, $_POST['address']);

      $query = "INSERT INTO register (Name, Gender, Email, Address) VALUES ('$name', '$gender', '$email', '$address')";
      $data = mysqli_query($conn, $query);

      if ($data) {
        echo "Data inserted successfully";
      }else {
        echo "Data not inserted";
    }
    
    }

?>