function updateStatus(id){
    let check = document.getElementById(id)
    let status = check.getAttribute('value')
    $.ajax({
      url: "{{ url('/update/detail_process/') }}"+"/"+id,
      method: 'POST',
      data: {
        _token: "{{ csrf_token() }}",
        status: status
        },
      success: function(res) {

      },
      error: function(err) {
          console.error(err)
      }
    })
    console.log(check)
    if( status == 0){
        check.setAttribute('value',1)
        document.getElementById("btn"+id).classList.add("btn-success")
        document.getElementById("btn"+id).classList.remove("btn-danger")
        document.getElementById("btn"+id).textContent = "Complete"
        document.getElementById("style"+id).classList.add("--is-pending")
        document.getElementById("style"+id).classList.remove("--is-completed")
    }
    else {
        check.setAttribute('value',0)
        document.getElementById("btn"+id).classList.remove("btn-success")
        document.getElementById("btn"+id).classList.add("btn-danger")
        document.getElementById("btn"+id).textContent = "Cancel"
        document.getElementById("style"+id).classList.remove("--is-pending")
        document.getElementById("style"+id).classList.add("--is-completed")
    }
}
document.getElementsByClassName("dropdown-item")[2].classList.add("active-menu")