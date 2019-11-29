<?php
  require "header.php";
?>
<head>
    <title>Admin Pane</title>
</head>
    <main>
      <div class="wrapper-main">
        <section class="section-default">
          <?php
          if (!isset($_SESSION['admin'])) {
            echo '<h1>ACCESS DENIED: You do not have admin permission.</h1>';
          }
          else if (isset($_SESSION['admin'])) {
            echo '<h1>Admin Panel</h1>';
              
            $sql = "SELECT * FROM songs;";
            $result = mysqli_query($conn,$sql);
        
            echo "<table border='1'>";
            echo "<tr><td>Song_Id</td><td>Song_Name</td><td>Song_Artist</td><td>Song_Genre</td><td>File_Name</td><td>Uploader</td><td>Option</td></tr>\n";
                while($row = mysqli_fetch_assoc($result)){
                    $filelocation = "uploads/song/" . $row['File_Name'];
                    echo "<tr><td>{$row['Song_Id']}</td><td>{$row['Song_Name']}</td><td>{$row['Song_Artist']}</td><td>{$row['Song_Genre']}</td><td>{$row['File_Name']}</td><td>{$row['Uploader_id']}</td><td>Link</td></tr>\n";
                }
            echo "</table>";
              
          }
          ?>
        </section>
          
      </div>
        
        
    </main>


