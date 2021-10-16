


    </div>
      <!-- Development -->
      <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
      <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>

      <!-- Production -->
      <script src="https://unpkg.com/@popperjs/core@2"></script>
      <script src="https://unpkg.com/tippy.js@6"></script>
      <script src="{{ asset("js/timeline1.js") }}"></script>
      
      <!-- Vendor JS Files -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
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
