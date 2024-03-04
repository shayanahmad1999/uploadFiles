<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>File Directory</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f4f4f4;
    }

    nav {
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }

    nav a {
      display: block;
      margin-bottom: 10px;
      text-decoration: none;
      color: #333;
      padding: 8px 12px;
      border-radius: 3px;
      transition: background-color 0.3s ease;
    }

    nav a:hover {
      background-color: #f0f0f0;
    }

    input[type=text],
    input[type=file],
    select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type=submit] {
      width: 100%;
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type=submit]:hover {
      background-color: #45a049;
    }

    div {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }
  </style>
</head>

<body>

  <nav>
    <?php
    $upload_dir = "uploads/";

    if (is_dir($upload_dir)) {
      if ($dh = opendir($upload_dir)) {
        while (($file = readdir($dh)) !== false) {
          if ($file != '.' && $file != '..') {
            $fileNameWithoutExtension = pathinfo($file, PATHINFO_FILENAME);
            echo "<a href='$upload_dir$file'>$fileNameWithoutExtension</a>";
          }
        }
        closedir($dh);
      }
    }
    ?>
  </nav>
  <div>
    <form action="upload.php" method="post" enctype="multipart/form-data">
      <label for="fname">File Upload</label>
      <input type="file" name="fileToUpload" id="fileToUpload">

      <!-- <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label for="country">Country</label>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select> -->

      <input type="submit" value="Submit">
      <input type="hidden" value="Upload File" name="submit">
    </form>
  </div>
</body>

</html>