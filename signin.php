<?php
session_start();
if (isset($_POST['signin'])){
    require 'dbclass.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email = '$email' ;";
    $rows = get_data($sql);
     
    if (count($rows)  == 1 && password_verify($password ,$rows[0]['password'])){
        $_SESSION['user'] = $rows[0];
        $_SESSION['community_token'] = date('YmdHis');
        echo  json_encode(['success' => true , 'message' => 'Logged In Successfully']);       
    } else{
        echo  json_encode(['success' => false , 'message' => 'Invalid Email']);
    }
    exit(0);
}


if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['user']);
    unset($_SESSION['community_token']);
}

?>



<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Kapsaret, Community, Kogo">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Community | Sign In</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="./assets/css/dashlite.css?ver=2.2.0">
    <link id="skin-default" rel="stylesheet" href="./assets/css/theme.css?ver=2.2.0">
</head>

<body class="nk-body bg-white npc-default pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-split nk-split-page nk-split-md">
                        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                            <div class="absolute-top-right d-lg-none p-1 p-sm-5">
                                <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em
                                        class="icon ni ni-info"></em></a>
                            </div>
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <!-- <div class="brand-logo pb-5">
                                    <a href="html/index.html" class="logo-link">
                                        <img class="logo-light logo-img logo-img-lg" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">                                       
                                    </a> -->
                                <!-- </div>  -->
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Sign-In</h5>
                                        <div class="nk-block-des">
                                            <p>Access the Community Data Manager using your email and password.</p>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <form id="signin" action="#">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email</label>
                                        </div>
                                        <input type="email" class="form-control form-control-lg" id="email"
                                            placeholder="Enter your email address" required>
                                    </div><!-- .foem-group -->
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Password</label>

                                        </div>
                                        <div class="form-control-wrap">
                                            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch"
                                                data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" class="form-control form-control-lg" id="password"
                                                placeholder="Enter your password" required>
                                        </div>
                                    </div><!-- .foem-group -->
                                    <div class="form-group">
                                        <button id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign
                                            in</button>
                                    </div>
                                </form><!-- form -->

                            </div>
                        </div><!-- .nk-split-content -->
                        <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right"
                            data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
                            <div class="slider-wrap w-100 w-max-550px p-sm-5 m-auto">
                                <div class="slider-init">
                                    <div class="slider-item">
                                        <div class="p-5"></div>
                                        <div class="nk-feature nk-feature-center py-5">
                                            <div class="nk-feature-img ">
                                                <img class="round " src="./images/community.jpg" alt="">
                                            </div>
                                            <div class="nk-feature-content py-2">
                                                <h4>Community</h4>
                                                <p>A community that cares !</p>
                                            </div>
                                        </div>
                                    </div><!-- .slider-item -->
                                </div><!-- .slider-init -->
                            </div><!-- .slider-wrap -->
                        </div><!-- .nk-split-content -->
                    </div><!-- .nk-split -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"
        integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ=="
        crossorigin="anonymous"></script>
    <script src="./assets/js/bundle.js?ver=2.2.0"></script>
    <script src="./assets/js/scripts.js?ver=2.2.0"></script>

    <!-- <script src="./assets/js/example-toastr.js?ver=2.2.0"></script> -->

    <script>
    var signin = document.getElementById("signin");
    signin.addEventListener("submit", async function(e) {
        e.preventDefault();
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        let fd = new FormData();
        fd.append("email", email)
        fd.append("password", password)
        fd.append("signin", 1)
        let resp = await axios.post('signin.php', fd);
        console.log(resp.data);

        NioApp.Toast(resp.data.message, resp.data.success ? 'success' : 'error', {
            position: 'top-right'
        });
        if (resp.data.success) {
            window.location.href = 'index.php';
        }
    });
    </script>

</html>