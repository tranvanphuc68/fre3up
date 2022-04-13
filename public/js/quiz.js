function checkCorrect(answer){
    $(answer).addClass("alert alert-success")
    $(".alert-success").siblings().removeClass("alert alert-success");
    $(answer).addClass("alert alert-success")

    var hidden = $(answer).attr("id")
    var b = $(answer).siblings().last().val(hidden)
  }

  document.getElementsByClassName("dropdown-item")[1].classList.add("active-menu")