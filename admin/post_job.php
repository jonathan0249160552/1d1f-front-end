<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php require 'nav_bar.php' ?>

    <div class="container">
        <div class="card m-4 p-4 alert-success">
        <div class="form-group">
            <form action="#" method="post" id="job_form">
                <input type="text" name="company_name" placeholder="company name" class="form-control" id=""> <br>
                <label for="">Brief Job Description</label>
                <textarea name="jobDescription" class="form-control" id="" cols="30" rows="10" required></textarea>

                <input type="text" name="jobTitle" class="form-control" id="" placeholder="job title" required>
              
                <input type="number" name="contact" id="" placeholder="contact" class="form-control">
                <input type="email" name="email" id="" placeholder="email" class="form-control">
                <input type="file" class="form-control" name="jobImage" id="" required accept=".pdf">
                <div class="Alert"></div>
                <input type="submit" class="btn btn-primary m-2" value="Post" >
                
            </form>
        </div>
        </div>
    </div>


    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/jquery-3.5.1.jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script>
        $("#job_form").submit(function(e) {
            e.preventDefault();
            // alert("Are you sure you want to Upload")
            $("#post").val("Please wait...");

            $.ajax({
                url: "assets/php/process.php",
                method: "post",
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),


                success: function(response) {
                    console.log(response);
                    $("#post").val("Post");
                    $('.Alert').html(response);
                },
            });
        });
    </script>
</body>

</html>