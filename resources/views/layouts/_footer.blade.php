


    </div>
      {{-- <script src="{{ asset("js/timeline1.js") }}"></script> --}}

      <!-- Vendor JS Files -->
      <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
      <script src="https://kit.fontawesome.com/73fec26af2.js" crossorigin="anonymous"></script>
      <script src="{{ asset("js/sidebar.js") }}"></script>
      <script>
        //this is for checkAns when create quiz
        function checkCorrect(answer){
          $(answer).addClass("alert alert-success")
          $(".alert-success").siblings().removeClass("alert alert-success");
          $(answer).addClass("alert alert-success")

          var hidden = $(answer).attr("id")
          var b = $(answer).siblings().last().val(hidden)

          var choice = $(answer).children().last().val()
          var c = $(answer).siblings().last().prev().children().val(choice)
        }
    </script>
    </body>
</html>
