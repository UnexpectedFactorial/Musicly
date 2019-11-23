<?php
	session_start();

	$loggedIn = false;

	if (isset($_SESSION['loggedIn']) && isset($_SESSION['name'])) {
		$loggedIn = true; 
	}
//checks if user is logged in


	$conn = new mysqli('localhost','root','','commentstore');

	function createCommentRow($data) {
		return 
			<div class="userComments">
				<div class="comment">
					<div class="user">$data['name']<span class="time">'.$data['createdOn'].'</span></div>
					<div class="userComment">'.$data['comment'].'</div>
				</div>
			</div>

;
	}


	if(isset($_POST['getAllComments'])) {
		$start = $conn->real_escapt_string($_POST['start']);

		$response = "";
		$sql = $conn->query(innerjoinquery) //placeholder name
		while($data = $sql->fetch_assoc())
			$response .=createCommentRow($data);
	}
		//needs sql query to join commentstore database with users database
		//template: SELECT name, comment, DATE_FORMAT(commentstore.createdOn, %d,%m,%y AS createdOn FROM (other db) comment INNER JOIN commentstore.userID = (otherdb_id) ORDER BY conmmentstore.id DESC LIMIT $start,20
	if(isset($_POST['addComment'])) {
		$comment = $conn->real_escape_string($_POST['comment']);

		$conn->query("INSERT INTO commentstore (userID, comment, createdOn) VALUES ('','$comment',NOW())");
		 //before $comment is wherever we store out sessionID

		$sql = $conn->query(innerjoinquery) //placeholder name from above, LIMIT 1 instead
		$data = $sql->fetch_assoc();
		exit(createCommentRow($data));

		exit('success');
	}

	$sqlNumComments = $conn->query ("SELECT id FROM commentstore");
	$numComments = $sqlNumComments->numrows;
?>
<!DOCTYPE html>
<html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport">
	<title>Comments Section</title>
	<link rel="stylesheet" 
		href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
		crossorigin="anonymous">
		
	<style type="text/css">
		.comment {
			margin-bottom: 20px;
		}
		.user {
			font-weight: bold;
			color: black;
		}

		.time {
			color: gray;
		}

		.userComment {
			color: #000;
		}

		.replies .comment {
			margin-top: 20px;
		}

		.replies {
			margin-left: 20px;
			margin-top: 20px;
		}

	</style>	
</head>
<body>

	<div class="row">
		<div class="col-md-12" align="center">
			<textarea class="form-control" id="commentMain" placeholder="Add a comment..." cols="30" rows="2"></textarea><br>
			<button style="float:right" class="btn-primary btn" id="addComment">Post</button>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h2><b id ="numComments"><?php echo $numComments ?>Placeholder</b></h2>

	</div>
</div>


<script 
			src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script
			src="http://code.jquery.com/jquery-3.4.1.min.js"
			integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			crossorigin="anonymous"></script>
<script 	src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript">
	var max = <?php echo $numComments ?>;
	$(document).ready(function () {
		$("#addComment").on('click', function () {
			var comment = $("#mainComment").val();

			if (comment.length > 1) {
				$.ajax({
					url: 'index.php',
					method: 'POST',
					datatype: 'text',
					data: {
						addComment: 1,
						comment: comment
					}, success: function (response) {
						max++;
						$("#numComments").text(max + " Comments");
						$(".userComments").prepend(response); //updates your comment instantly as soon as posted
					}
			});
		} else
			alert('Please check your inputs');
	});
});

	getAllComments(0, max);

	function getAllComments(start, max) {
		if (start > max) {
			return;

		}

						$.ajax({
					url: 'index.php',
					method: 'POST',
					datatype: 'text',
					data: {
						getAllComments: 1,
						start: start
					}, success: function (response) {
						$(".userComments").append(response);
						getAllComments((start+20), max);
					}
	};

</script>
</body>
</html>