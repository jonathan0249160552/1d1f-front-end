<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">


</head>

<body>

  <?php require 'nav_bar.php'; ?>

  <div class="card-body">
    <div class="toolbar table-responsive showUsers">

    </div>

  </div>
  </div>
  </div>

  <script src="assets/js/jquery-3.5.1.jquery.min.js"></script>
  <!-- <script src="assets/js/jquery-3.3.1.min.js"></script> -->
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>


 
  <script>
    $(document).ready(function() {
      displayUsers();
      //display all note of a user
      function displayUsers() {
        $.ajax({
          url: 'assets/php/process.php',
          method: 'post',
          data: {
            action: 'displayUsers'
          },
          success: function(response) {
            $(".showUsers").html(response);
            // console.log(response);
            // $("table").DataTable({
            // order:[0,'desc']
            // });
          }
        });
      }



      $('body').on("click", ".deleteBtn", function(e) {
        del_id = $(this).attr('id');
        Swal.fire({
          title: 'Are you sure you want to delete?',
          text: "",
        
          showCancelButton: true,
          confirmButtonColor: '#b12828',
          cancelButtonColor: '#282ab1',
          confirmButtonText: 'Yes, Delete it'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              url: 'assets/php/process.php',
              method: 'post',
              data: {
                del_id: del_id
              },
              success: function(response) {
                Swal.fire({
                      title: 'Deleted',
                      type: 'success'
                    });
                console.log(response)
                location.reload()
              }
            });

          }
        })



      });


    })
  </script>
</body>

</html>