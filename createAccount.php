<?php include "header.php"; ?>

        <?php

        $connection = mysqli_connect("localhost", "root", "", "dndcmdatabase");

        $result = $connection -> query("SELECT * FROM randnames");
        $num_rows = mysqli_num_rows($result);


        $my_id = rand(1, $num_rows);

        $result = $connection -> query("SELECT name FROM randnames WHERE id='$my_id'");
        $row = $result -> fetch_assoc();

        ?>

        <div class = "col-lg-4 col-lg-offset-4">

            <div class = "row">
                <div class = "alert alert dismissible alert-warning" id = "createAccountSuccess" style = "display: none">
                    <button type = "button" class = "close" data-dismiss = "alert">&times;</button>
                    <h4>Success!</h4>
                    <p>User successfully created!</p>
                </div>
            </div>

            <form class = "form-horizontal">
                <fieldset>
                    <div class = "well well-lg">
                        <legend>Create User</legend>

                        <div class = "row">
                            <div class = "form-group">
                                <label for = "inputUsername" class = "col-lg-2 control-label">Username</label>
                                <div class = "col-lg-10">
                                    <input type = "text" class = "form-control" id = "inputUsername" placeholder = <?php echo $row["name"]; ?>>
                                </div>
                            </div>
                            <div class = "form-group">
                                <label for = "inputPassword" class = "col-lg-2 control-label">Password</label>
                                <div class = "col-lg-10">
                                    <input type = "password" class = "form-control" id = "inputPassword" placeholder = "Password">
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-lg-2 col-lg-offset-10">
                                <div class = "form-group">
                                    <button type = "submit" class = "btn btn-default" id = "submitAccount">Submit</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </fieldset>
            </form>

        </div>


        <script type = "text/javascript">


            $(document).ready(function(){

                $("#submitAccount").click(function(){

                    event.preventDefault();

                    $.ajax({

                        url: "userStorage.php",
                        method: "POST",
                        data : {
                            username: $("#inputUsername").val(),
                            password: $("#inputPassword").val(),
                        },
                        success: function(data){

                            if(data == "stored"){

                                $("#createAccountSuccess").slideDown("medium");
                                $("#inputUsername").val("");
                                $("#inputPassword").val("");

                            }

                        },

                    })

                });

            });


        </script>


<?php include "footer.php"; ?>
