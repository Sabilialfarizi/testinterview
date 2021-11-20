<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Klasemen Liga 1</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="ajax/ajax.js"></script>
</head>

<body>
    <div class="container">
        <p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Klasemen <b>Liga 1 </b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                                class="material-icons"></i> <span>Add Pertandingan</span></a>
                        <!-- <a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple"><i class="material-icons"></i> <span>Delete</span></a>						 -->
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="selectAll">
                                <label for="selectAll"></label>
                            </span>
                        </th>
                        <th>Peringkat</th>
                        <th>Point</th>
                        <th>Nama Team</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    
				$result = mysqli_query($conn,"SELECT * FROM klasemen ORDER by Point Desc");
					$i=1;
					while($row = mysqli_fetch_array($result)) {
				?>
                    <tr id="<?php echo $row["id"]; ?>">
                        <td>
                            <span class="custom-checkbox">
                                <input type="checkbox" class="user_checkbox" data-user-id="<?php echo $row["id"]; ?>">
                                <label for="checkbox2"></label>
                            </span>
                        </td>
                        <td><?=$i?></td>
                        <td><?php echo $row["Point"]; ?></td>
                        <td><?php echo $row["nama_team"]; ?></td>


                        <!-- <td>
                            <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                                <i class="material-icons update" data-toggle="tooltip"
                                    data-id="<?php echo $row["id"]; ?>" data-point="<?php echo $row["point"]; ?>"
                                    data-nama_team="<?php echo $row["nama_team"]; ?>" title="Edit"></i>
                            </a>

                        </td> -->
                    </tr>
                    <?php
				$i++;
				}
				?>
                </tbody>
            </table>

        </div>
    </div>
    <!-- Add Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
            <form action="insert.php" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Pertandingan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <select  aria-label="Default select example" id="home_team" name="home_team" class="form-control" required>
                             
                            <option selected>Home Team</option>
                                <option value="Chelsea">Chelsea</option>
                                <option value="Arsenal">Arsenal</option>
                                <option value="Manchseter City">Manchester City</option>
                            </select>
                            <!-- <label>Home Team</label>
							<input type="text" id="home_team" name="home_team" class="form-control" required> -->
                        </div>
                        <div class="form-group">
                        <select  aria-label="Default select example" id="away_team" name="away_team" class="form-control" required>
                        <option selected>Away Team</option>        
                        <option value="Chelsea">Chelsea</option>
                                <option value="Arsenal">Arsenal</option>
                                <option value="Manchseter City">Manchester City</option>
                            </select>
                            <!-- <label>Away Team</label>
                            <input type="text" id="away_team" name="home_team" class="form-control" required> -->
                        </div>
                        <div class="form-group">
                            <input type="text" id="score_home" name="score_home" class="form-control"  placeholder="Score Home" required>
                        </div>
                        <input type="text" id="score_away" name="score_away" class="form-control"  placeholder="Score Away" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <input type="hidden" value="1" name="type"> -->
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

</body>

</html>