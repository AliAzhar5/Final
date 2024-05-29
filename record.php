<?php include 'check.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link
      href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap"
      rel="stylesheet"
    />
    <title>Records</title>
</head>
<body class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
    <div class="max-w-screen-xl m-0 sm:m-20 bg-white shadow sm:rounded-lg flex justify-center flex-1 mt-8">
        <div class="p-6 sm:p-12">
          <div class="flex justify-between items-center">
            <h1 class="text-2xl xl:text-3xl font-extrabold">Book Records</h1>
            <button onclick="window.location.href = 'index.html'" class="px-4 py-2 bg-green-500 text-white rounded-lg">Add New Record</button>
          </div>
          <div class="overflow-x-auto mt-8">
            <table class="w-full table-fixed">
              <thead>
                <tr>
                  <th class="px-6 py-3 bg-green-500 text-gray-100 font-semibold">Name</th>
                  <th class="px-6 py-3 bg-green-500 text-gray-100 font-semibold">Gender</th>
                  <th class="px-6 py-3 bg-green-500 text-gray-100 font-semibold">Email</th>
                  <th class="px-6 py-3 bg-green-500 text-gray-100 font-semibold">Address</th>
                  <th class="px-6 py-3 bg-green-500 text-gray-100 font-semibold">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="px-6 py-2">Ali Azhar</td>
                  <td class="px-6 py-2">Male</td>
                  <td class="px-6 py-2">aliazhar@gmail.com</td>
                  <td class="px-6 py-2">Lahore</td>
                  <td class="px-6 py-2">
                    <button class="px-4 py-2 bg-indigo-500 text-white rounded-lg">Edit</button>
                    <button class="px-4 py-2 bg-red-500 text-white rounded-lg ml-2">Delete</button>
                  </td>
                </tr>
                <tr>
                  <td class="px-6 py-2">Hammad</td>
                  <td class="px-6 py-2">Male</td>
                  <td class="px-6 py-2">hammad@gmail.com</td>
                  <td class="px-6 py-2">Lahore</td>
                  <td class="px-6 py-2">
                    <button class="px-4 py-2 bg-indigo-500 text-white rounded-lg">Edit</button>
                    <button class="px-4 py-2 bg-red-500 text-white rounded-lg ml-2">Delete</button>
                  </td>
                </tr>

                <?php
                    $query = "SELECT * FROM register";
                    $data = mysqli_query($conn, $query);
                    $total = mysqli_num_rows($data);
                    
                    if ($total != 0){   
                        while($result = mysqli_fetch_assoc($data)){
                            echo "
                                <tr>
                                    <td class='px-6 py-2'>".$result['Name']."</td>
                                    <td class='px-6 py-2'>".$result['Gender']."</td>
                                    <td class='px-6 py-2'>".$result['Email']."</td>
                                    <td class='px-6 py-2'>".$result['Address']."</td>
                                    <td class='px-6 py-2'>
                                      <a href='update.php?id=$result[Email]' class='px-4 py-2 bg-indigo-500 text-white rounded-lg'>Edit</a>
                                      <a href='update.php?id=$result[Email]' class='px-4 py-2 bg-red-500 text-white rounded-lg ml-2'>Delete</a>
                                    </td>
                                </tr>
                            ";
                        }
                    }
                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
      
  </body>
</html>

