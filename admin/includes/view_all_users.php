<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>Username</th>
      <th>FirstName</th>
      <th>LastName</th>
      <th>Email</th>
      <th>Role</th>
      <th>Date</th>

    </tr>
  </thead>
  <tbody>

    <?php

    $query = "SELECT * FROM users";
    $select_users = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_users)) {
      $user_id = $row['user_id'];
      $username = $row['username'];
      $user_password = $row['user_password'];
      $user_firstname = $row['user_firstname'];
      $user_lastname = $row['user_lastname'];
      $user_email = $row['user_email'];
      $user_image = $row['user_image'];
      $user_role = $row['user_role'];


      echo "<tr>";

      echo "<td>{$comment_id}</td>";
      echo "<td>{$comment_author}</td>";
      echo "<td>{$comment_content}</td>";

      // $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
      // $select_categories_id = mysqli_query($connection, $query);
      // while ($row = mysqli_fetch_assoc($select_categories_id)) {
      //   $cat_id = $row['cat_id'];
      //   $cat_title = $row['cat_title'];

      //   echo "<td>$cat_title</td>";
      // }

      echo "<td>{$comment_email}</td>";
      echo "<td>{$comment_status}</td>";

      $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
      $select_post_id_query = mysqli_query($connection, $query);

      while ($row = mysqli_fetch_assoc($select_post_id_query)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];

        echo "<td><a href=''></a>$post_title</td>";
      }






      echo "<td> $comment_date</td>";

      echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
      echo "<td><a href='comments.php?reject=$comment_id'>Reject</a></td>";


      echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
      echo "</tr>";
    }

    ?>

  </tbody>

</table>

<?php


if (isset($_GET['approve'])) {

  $the_comment_id = $_GET['approve'];
  $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id ";
  $approve_comment_query = mysqli_query($connection, $query);
  header("Location: comments.php");
  exit;
}


if (isset($_GET['reject'])) {

  $the_comment_id = $_GET['reject'];
  $query = "UPDATE comments SET comment_status = 'rejected' WHERE comment_id = $the_comment_id ";
  $reject_comment_query = mysqli_query($connection, $query);
  header("Location: comments.php");
  exit;
}


if (isset($_GET['delete'])) {
  $the_comment_id = $_GET['delete'];
  $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id} ";
  $delete_query = mysqli_query($connection, $query);
  header("Location: comments.php");
  exit;
}


?>