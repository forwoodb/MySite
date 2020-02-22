<?php

// Dev DB
// $link = mysqli_connect('localhost', 'root', 'root', 'grocery_db');
// Production DB
$link = mysqli_connect('localhost', 'brenoqmo', 'hbaw5xqfsTFA', 'brenoqmo_grocery_db');

if (mysqli_connect_error()) {
  die('An error occurred while connecting to the database');
}

if ($_POST) {
  $item = $_POST['item'];
  $price = $_POST['price'];
  $price_type = $_POST['price_type'];
  $brand = $_POST['brand'];
  $location = $_POST['location'];
  $servings = $_POST['servings'];

  $query = "INSERT INTO items (item, price, price_type, brand, location, servings) VALUES('$item', '$price', '$price_type', '$brand', '$location', '$servings')";
  mysqli_query($link, $query);
}

if ($_GET) {
  $del_item = $_GET['del_item'];
  $query = "DELETE FROM items WHERE id=".$del_item;
  mysqli_query($link, $query);
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Food App</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container">

      <h1>Food App</h1>
      <h1>List</h1>
      <h1>Add Item</h1>

      <div class="form-wrapper">
        <form class="input-form" method="post">
          <div class="top-row">
            <label for="">
              Item: <input type="text" name="item">
            </label>
            <label for="">
              Price: <input type="text" name="price">
            </label>
            <label for="">
              Price Type: <!-- <input type="text" name="price_type"> -->
              <select class="" name="price_type">
                <option value="Regular">Regular</option>
                <option value="Sale">Sale</option>
                <option value="Coupon">Coupon</option>
              </select>
            </label>
          </div>
          <div class="bottom-row">
            <label for="">
              Brand:
              <input type="text" name="brand">
            </label>
            <label for="">
              Location:
              <input type="text" name="location">
            </label>
            <label for="">
              Servings:
              <input type="text" name="servings">
            </label>

          </div>

          <!-- Add Button -->
          <input type="submit" value="Submit" class="submit">
        </form>
      </div>

      <div class="store-wrapper">
        <h1>Store</h1>

        <table>
          <thead>
            <th>Item</th>
            <th>Price</th>
            <th>Price Type</th>
            <th>Brand</th>
            <th>Location</th>
            <th>Servings</th>
            <th>Price/Serving</th>
          </thead>
          <tbody>
            <?php

            $query = "SELECT * FROM items";

            if ($result = mysqli_query($link, $query)) {
              while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                  <td><?php echo $row['item']; ?></td>
                  <td><?php echo '$'.$row['price']; ?></td>
                  <td><?php echo $row['price_type']; ?></td>
                  <td><?php echo $row['brand']; ?></td>
                  <td><?php echo $row['location']; ?></td>
                  <td><?php echo $row['servings']; ?></td>
                  <td>
                    <?php

                    if ($row['servings'] == 0) {
                      echo '';
                    } else {
                      echo '$'.round($row['price']/$row['servings'], 2);
                    }

                    ?>
                  </td>
                  <td class="button">
                    <form class="" action="edit_item.php?edit_item=<?php echo $row['id'] ?>" method="post">
                      <input type="submit" name="" value="Edit" class="submit edit">
                    </form>
                  </td>
                  <td class="button">
                    <form action="index.php?del_item=<?php echo $row['id']; ?>" method="post">
                      <input type="submit" value="Delete" class="submit delete">
                    </form>
                  </td>
                </tr>
              <?php }
            } ?>
          </tbody>
        </table>
      </div>


    </div>
  </body>
</html>




