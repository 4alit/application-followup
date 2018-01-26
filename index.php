<?php
//I made some little changes in the code. I would make php and html in separate files and add js for the loops as well. But probable not for this simple example 
//I do not think we need a class for the example. But we can use it like this if you want
/* class Interview {

  public function getTitle() {
  return 'Interview test';
  }

  public function getPeople() {
  return array(
  array('id' => 1, 'first_name' => 'John', 'last_name' => 'Smith', 'email' => 'john.smith@hotmail.com'),
  array('id' => 2, 'first_name' => 'Paul', 'last_name' => 'Allen', 'email' => 'paul.allen@microsoft.com'),
  array('id' => 3, 'first_name' => 'James', 'last_name' => 'Johnston', 'email' => 'james.johnston@gmail.com'),
  array('id' => 4, 'first_name' => 'Steve', 'last_name' => 'Buscemi', 'email' => 'steve.buscemi@yahoo.com'),
  array('id' => 5, 'first_name' => 'Doug', 'last_name' => 'Simons', 'email' => 'doug.simons@hotmail.com')
  );
  }

  public function getLipsum() {
  return  $lipsum = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus incidunt, quasi aliquid, quod officia commodi magni eum? Provident, sed necessitatibus perferendis nisi illum quos, incidunt sit tempora quasi, pariatur natus.';
  }
  }

  $obj = new Interview();
  $title = $obj->getTitle();
  $lipsum = $obj->getLipsum();
  $people = $obj->getPeople(); */

$title = 'Interview test';
$people = array(
    array('id' => 1, 'first_name' => 'John', 'last_name' => 'Smith', 'email' => 'john.smith@hotmail.com'),
    array('id' => 2, 'first_name' => 'Paul', 'last_name' => 'Allen', 'email' => 'paul.allen@microsoft.com'),
    array('id' => 3, 'first_name' => 'James', 'last_name' => 'Johnston', 'email' => 'james.johnston@gmail.com'),
    array('id' => 4, 'first_name' => 'Steve', 'last_name' => 'Buscemi', 'email' => 'steve.buscemi@yahoo.com'),
    array('id' => 5, 'first_name' => 'Doug', 'last_name' => 'Simons', 'email' => 'doug.simons@hotmail.com')
);
$lipsum = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus incidunt, quasi aliquid, quod officia commodi magni eum? Provident, sed necessitatibus perferendis nisi illum quos, incidunt sit tempora quasi, pariatur natus.';
//I moved the if statement from html to here. I am not sure it's good solution. but for me it looks better
$personToSubmit = 'Imput the data!';
if ($_POST) {
    if (!empty(implode($_POST))) {
        $personToSubmit = implode(' ', $_POST);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Interview test</title>
        <style>
            body {font: normal 14px/1.5 sans-serif;}
        </style>
    </head>
    <body>

        <h1><?php echo $title; ?></h1>
        <?php
        for ($i = 0; $i < 10; $i++) {
            echo '<p>' . $lipsum . '</p>';
        }
        ?>

        <hr>
        <form method="post" action=""><!--I removed $_SERVER['REQUEST_URI']. we do not need it here and it's not safe-->
            <p><label for="firstName">First name</label> <input type="text" name="first_name" id="firstName"></p>
            <p><label for="lastName">Last name</label> <input type="text" name="last_name" id="lastName"></p>
            <p><label for="email">Email</label> <input type="text" name="email" id="email"></p>
            <p><input type="submit" value="Submit" /></p>
        </form>
        <p><strong>Person</strong> <?php echo $personToSubmit; ?></p>
        <hr>

        <table>
            <thead>
                <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($people as $person){ ?>
                    <tr>
                        <td><?php echo $person['first_name']; ?></td>
                        <td><?php echo $person['last_name']; ?></td>
                        <td><?php echo $person['email']; ?></td>
                    </tr>
                <?php }; ?>
            </tbody>
        </table>

    </body>
</html>
