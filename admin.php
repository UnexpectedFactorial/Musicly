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
        
            echo "<table class='songtable'>";
            echo "<tr><td class='th'>Song_Id</td><td class='th'>Song_Name</td><td class='th'>Song_Artist</td><td class='th'>Song_Genre</td><td class='th'>File_Name</td><td class='th'>Uploader</td><td class='th'>Current Rating</td><td class='th'>Option</td></tr>\n";
                while($row = mysqli_fetch_assoc($result)){
                    $filelocation = "uploads/song/" . $row['File_Name'];
                     echo "<tr>";
					echo "<td>".$row['Song_Id']."</td>";
					echo "<td>".$row['Song_Name']."</td>";
					echo "<td>".$row['Song_Artist']."</td>";
					echo "<td>".$row['Song_Genre']."</td>";
					echo "<td>".$row['File_Name']."</td>";
					echo "<td>".$row['Uploader_id']."</td>";
					echo "<td>".$row['Avg_Rating']."</td>";
					echo "<td><a href=delete.php?Song_Id=".$row['Song_Id']." id='delete'>Delete</a></td>";
                }
                
            echo "</table>";
              
          }
          ?>
        </section>
          
      </div>
        
        
    </main>
