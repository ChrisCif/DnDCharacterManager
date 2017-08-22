<?php include "header.php"; ?>

        <div class = "col-lg-6 col-lg-offset-3">

            <div class = "row row-header">
                <h1>My Characters</h1>
            </div>

            <div class = "row">

                <div class = "col-lg-8 col-lg-offset-2" id = "charList">
                    <!-- Character List goes here -->
                </div>

            </div>

        </div>


        <?php

        $connection = mysqli_connect("localhost", "root", "", "dndcmdatabase");


        // TODO This currently pulls all characters rather than those associated with user
        //$user = $_POST["user"];
        $result = $connection -> query("SELECT * FROM characters WHERE 1");

        $charArray = array();
        $row = $result -> fetch_row();
        while($row){

            array_push($charArray, $row);
            $row = $result -> fetch_row();

        }

        ?>


        <script type = "text/javascript">


            var characters;

            var orsik = new Character("Orsik", "Dwarf", "Paladin", 4, "dwarf.jpg");
            var phyn = new Character("Phyn", "Wood Elf", "Ranger", 3, "ranger.jpg");
            var lars = new Character("Lars", "Human", "Barbarian", 1, "barbarian.jpg");

            characters = [orsik, phyn, lars];

            $(document).ready(function(){

                var characterList = <?php echo json_encode($charArray); ?>;

                for(var x = 0; x < characterList.length; x++){

                    /*
                    Character Columns
                    0. user
                    1. name
                    2. race
                    3. class
                    4. level
                    5. image
                    6. id
                     */


                    $("#charList").append("" +
                        "<div class = 'row panel panel-default'>" +
                        "   <div class = 'panel-body'>" +
                        "       <div class = 'col-lg-3'>" +
                        "           <img class = 'profPic' src = 'img/"+characterList[x][5]+"'/>" +
                        "       </div>" +
                        "       <div class = 'col-lg-6'>" +
                        "           <h2>"+characterList[x][1]+"</h2>" +
                        "           <p>"+characterList[x][2]+" "+characterList[x][3]+"</p>" +
                        "       </div>" +
                        "       <div class = 'col-lg-3'>" +
                        "           <p>Lv. <span class = 'lvText'>"+characterList[x][4]+"</span></p>" +
                        "       </div>" +
                        "   </div>" +
                        "</div>");


                }

            });


        </script>

<?php include "footer.php"; ?>
