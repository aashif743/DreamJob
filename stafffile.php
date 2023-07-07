<?php
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'dreamjob');

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file

        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $nic = $_POST['nic'];
        $driving = $_POST['drive'];
        $mobile = $_POST['mobile'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $province = $_POST['province'];
        $email = $_POST['email'];
        $year = $_POST['ol'];
        $indexno = $_POST['oindex'];
        $year1 = $_POST['al'];
        $indexno1 = $_POST['aindex'];
        $type = "Staff Assistant";

    $filename = $_FILES['FileName']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['FileName']['tmp_name'];
    $size = $_FILES['FileName']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['FileName']['size'] > 5000000) { // file shouldn't be larger than 5Megabyte(5Mb)
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO cvdocs (FileName, Size, FilePath, FName, LName, Nic, Drive, Mno, Dob, Address, City, Province, Email, Year, IndexNo, Year1, IndexNo1, Status) VALUES ('$filename', $size, '$destination', '$firstname', '$lastname', '$nic', '$driving', '$mobile', '$dob', '$address', '$city', '$province', '$email', '$year', '$indexno', '$year1', '$indexno1', '$type')";
            if (mysqli_query($conn, $sql)) {
                
                echo '<script type = "text/javascript">
                            alert("File Upload Successfully!");
                        window.location = "alert.php";
                     </script>
                    ';;
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}