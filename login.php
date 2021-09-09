<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Xss Cookies</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        html,body {
            margin: 0;
            padding: 0;
            height: 100vh;
        }

        .container {
            height: 100vh;
        }

        .row {
            height: 100vh;
        }

    </style>
    <script src="js/notiflix-aio-2.7.0.min.js"></script>

</head>
<body class="bg-dark">
    <div class="container">
        <div class="row align-items-center justify-content-md-center">
            <div class="col-sm-12 col-lg-6">
                <h3 class="text-light">Xss Cookies 登录</h3>
                <form class="text-light" method="POST" action="./login.php">
                    <div class="mb-3">
                        <label for="username" class="form-label">用户名</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">密码</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" class="form-check-input" id="Check">
                        <label class="form-check-label" for="Check">记住密码</label>
                    </div>
                    <button type="submit" class="btn btn-primary">立即登录</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        Notiflix.Report.Init({
            messageFontSize:'18px',
        });
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                include("./config.php");
                session_start();
                $username = $_POST["username"];
                $password = $_POST["password"];
                if ($username === $admin_user && $password === $admin_pass) {
                    $_SESSION["admin"] = true;
                    $success = "
                    Notiflix.Report.Success('登录成功',
                        '即将跳转到管理页面...',
                        '立即跳转',
                        function(){
                            window.location.href = './index.php';
                        });
                        setTimeout(function(){
                            window.location.href = './index.php';
                        },3000);
                    ";
                    echo $success;
                } else {
                    $error = "Notiflix.Report.Failure('登录失败',
                                '账号或密码错误！',
                                '确定');
                    ";
                    echo $error;
                }
            }
        ?>
    </script>
</body>
</html>
