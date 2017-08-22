<?php include "header.php"; ?>


        <div class = "col-lg-4 col-lg-offset-4">

            <div class = "row">
                <div class = "alert alert dismissible alert-warning" id = "createCharacterSuccess" style = "display: none">
                    <button type = "button" class = "close" data-dismiss = "alert">&times;</button>
                    <h4>Success!</h4>
                    <p>Welcome to the Adventurer's Guild, <span id = "appendNameHere"></span></p>
                </div>
            </div>

            <div class = "well well-lg">

                <form class = "form-horizontal">
                    <fieldset>

                        <div class = "row">

                            <legend>Create New Character</legend>

                            <div class = "form-group">
                                <label for = "inputName" class = "col-lg-2 col-lg-offset-2 control-label">Name</label>
                                <div class = "col-lg-6">
                                    <input type = "text" class = "form-control" id = "inputName" placeholder = "Name">
                                </div>
                            </div>

                            <div class = "form-group">
                                <label for = "inputRace" class = "col-lg-2 col-lg-offset-2 control-label">Race</label>
                                <div class = "col-lg-6">
                                    <input type = "text" class = "form-control" id = "inputRace" placeholder = "Race">
                                </div>
                            </div>

                            <div class = "form-group">
                                <label for = "inputClass" class = "col-lg-2 col-lg-offset-2 control-label">Class</label>
                                <div class = "col-lg-6">
                                    <input type = "text" class = "form-control" id = "inputClass" placeholder = "Class">
                                </div>
                            </div>

                            <div class = "form-group">
                                <label for = "inputLevel" class = "col-lg-2 col-lg-offset-2 control-label">Level</label>
                                <div class = "col-lg-3">
                                    <input type = "number" min = "1" max = "20" class = "form-control" id = "inputLevel">
                                </div>
                            </div>

                            <!-- TODO This input should be an upload -->
                            <div class = "form-group">
                                <label for = "inputImg" class = "col-lg-2 col-lg-offset-2 control-label">Image</label>
                                <div class = "col-lg-6">
                                    <input type = "text" class = "form-control" id = "inputImg" placeholder = "Image">
                                </div>
                            </div>

                        </div>

                        <div class = "row">
                            <div class = "formgroup">

                                <button type = "submit" class = "col-lg-6 col-lg-offset-3 btn btn-danger" id = "submitCharacter"> Create</button>

                            </div>
                        </div>

                    </fieldset>
                </form>

            </div>

        </div>


        <script>

            $(document).ready(function(){

                $("#submitCharacter").click(function(){

                   event.preventDefault();

                   console.log($("#inputName").val());
                   console.log($("#inputRace").val());
                   console.log($("#inputClass").val());
                   console.log($("#inputLevel").val());
                   console.log($("#inputImg").val());

                   $.ajax({

                       url: "characterStorage.php",
                       method: "POST",
                       data: {

                           // TODO This will always submit under this user currently
                           user: "Ciferoni",
                           name: $("#inputName").val(),
                           race: $("#inputRace").val(),
                           clss: $("#inputClass").val(),
                           //level: $("#inputLevel").val(),
                           img: $("#inputImg").val(),

                       },
                       success: function(data){

                           if(data == "stored"){

                               $("#appendNameHere").append($("#inputName").val());

                               $("#createCharacterSuccess").slideDown("medium");
                               $("#inputName").val("");
                               $("#inputRace").val("");
                               $("#inputClass").val("");
                               $("#inputLevel").val("");
                               $("#inputImg").val("");

                           }
                           else
                               console.log("Problems: "+data);

                       },

                   })

                });

            });

        </script>


<?php include "footer.php"; ?>