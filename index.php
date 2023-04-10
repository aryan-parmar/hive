<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: /login');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hive</title>
    <link rel="stylesheet" href="./assets/css/home.css" />
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
                        <a href="#" class="navlink"><i class="fa-solid fa-house"></i><span
                                class="navlink_text">home</span></a>
                    </li>
                    <li class="link_list">
                        <a href="#" class="navlink"><i class="fa-solid fa-compass spin"></i><span
                                class="navlink_text">explore</span></a>
                    </li>
                    <li class="link_list">
                        <a href="#" class="navlink"><i class="fa-solid fa-circle-user"></i><span
                                class="navlink_text">profile</span></a>
                    </li>
                </ul>
            </div>
        </section>
        <section class="post_area">
            <div class="post_container">
                <div class="post_title">
                    <img src="./assets/image/profile.jpg" alt="profile" />
                    <h6>aryyy</h6>
                    <button><i class="fa-solid fa-bars"></i></button>
                </div>
                <div class="post_img">
                    <img src="./assets/image/profile.jpg" alt="post" />
                </div>
                <div class="post_footer">
                    <div class="post_caption">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad eius
                            dolor dicta assumenda totam. Commodi, enim fuga? Laudantium,
                            placeat magnam nam nisi voluptate reiciendis qui modi fugit
                            atque, aspernatur ratione!
                        </p>
                    </div>
                    <div class="post_interections">
                        <i class="fa-regular fa-heart like"></i>
                        <div class="input_container">
                            <input type="text" placeholder="Comment..." />
                            <button><i class="fa-solid fa-paper-plane"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="post_container">
                <div class="post_title">
                    <img src="./assets/image/dog.png" alt="profile" />
                    <h6>aryyy</h6>
                    <button><i class="fa-solid fa-bars"></i></button>
                </div>
                <div class="post_img">
                    <img src="./assets/image/dog.png" alt="post" />
                </div>
                <div class="post_footer">
                    <div class="post_caption">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad eius
                            dolor dicta assumenda totam. Commodi, enim fuga? Laudantium,
                            placeat magnam nam nisi voluptate reiciendis qui modi fugit
                            atque, aspernatur ratione!
                        </p>
                    </div>
                    <div class="post_interections">
                        <i class="fa-regular fa-heart like"></i>
                        <div class="input_container">
                            <input type="text" placeholder="Comment..." />
                            <button><i class="fa-solid fa-paper-plane"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="suggestion_area">
            <div class="suggestion_container">
                <div class="title">Suggestions</div>
                <div class="suggestion_list">
                    <div class="suggestion">
                        <img src="./assets/image/profile.jpg" alt="profile" />
                        <div class="data">
                            <h3 class="fullname">Aryan parmar</h3>
                            <h3 class="username"><span>@</span>aryy</h3>
                        </div>
                        <button class="follow"><span>👀</span> Follow</button>
                    </div>
                </div>
            </div>
        </section>
    </section>
</body>
<script src="./assets/js/home.js"></script>

</html>