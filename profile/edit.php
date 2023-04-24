<?php
// Connect to database
include('../config.php');
session_start();
// Get user data
$user_id = $_SESSION['user_id'];
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
}
$sql = "SELECT * FROM user_data WHERE user_id = $user_id";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row['username'];
    $fullname = $row['fullname'];
    $bio = $row['bio'];
    $profile_link = $row['profile_link'];
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //   $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $bio = $_POST['bio'];

    // Handle profile image upload
    if ($_FILES['profile_image']['name']) {
        $image_name = $_FILES['profile_image']['name'];
        $image_tmp_name = $_FILES['profile_image']['tmp_name'];
        $ext = (explode(".", basename($image_name)))[1];
        echo $ext;
        $target_dir = "../assets/image/profile/" . $username . "." . $ext;
        if (file_exists($target_dir)) {
            chmod($target_dir, 0755); //Change the file permissions if allowed
            unlink($target_dir); //remove the file
        }
        move_uploaded_file($image_tmp_name, $target_dir);
        $sql = "UPDATE user_data SET profile_link = '/assets/image/profile/$username.$ext', fullname = '$fullname', bio = '$bio' WHERE user_id = $user_id";
    } else {
        $sql = "UPDATE user_data SET fullname = '$fullname', bio = '$bio' WHERE user_id = $user_id";

    }
    // Update user data
    if ($db->query($sql) === TRUE) {
        echo "Profile updated successfully";
        header('Location: /profile');
    } else {
        echo "Error";
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hive</title>
    <link rel="stylesheet" href="../assets/css/add.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <section class="home">
        <section class="sidenav">
            <div class="logo">Hive</div>
            <div class="link_container">
                <ul>
                    <li class="link_list">
                        <a href="/" class="navlink"><i class="fa-solid fa-house"></i><span
                                class="navlink_text">home</span></a>
                    </li>
                    <li class="link_list">
                        <a href="/add" class="navlink"><i class="fa-solid fa-circle-plus" style=""></i><span
                                class="navlink_text">add</span></a>
                    </li>
                    <li class="link_list">
                        <a href="/add-users" class="navlink"><i class="fa-solid fa-user-plus"></i></i><span
                                class="navlink_text">add users</span></a>
                    </li>
                    <li class="link_list">
                        <a href="/profile" class="navlink"><i class="fa-solid fa-circle-user"></i><span
                                class="navlink_text">profile</span></a>
                    </li>
                </ul>
            </div>
        </section>
        <section class="add_post_area">
            <h1>Edit Profile</h1>
            <form method="post" enctype="multipart/form-data">
                <div class="image-container">
                    <img src="<?php echo $profile_link; ?>" alt="Profile Image" class="image-pre">
                    <input type="file" id="profile_image" name="profile_image" accept="image/*" class="image-inp">
                </div>
                <input type="text" id="username" name="username" value="<?php echo $username; ?>" required disabled>
                <input type="text" id="fullname" name="fullname" value="<?php echo $fullname; ?>">
                <textarea id="bio" name="bio" rows="5" cols="10"><?php echo $bio; ?></textarea>
                <input type="submit" value="Save">
                <button type="button" class="logout">Logout</button>
            </form>
        </section>
    </section>
</body>
<script>
    const imageInp = document.querySelector('.image-inp');
    const imagePre = document.querySelector('.image-pre');
    imageInp.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.addEventListener('load', function () {
                imagePre.setAttribute('src', this.result);
            });
            reader.readAsDataURL(file);
        }
    });
    const logout = document.querySelector('.logout');
    logout.addEventListener('click', function () {
        window.location.href = '/logout.php';
    });
</script>

</html>