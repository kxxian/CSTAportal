function tableData() {
    $.ajax({
        type: 'POST',
        url: 'functions/assess_updHistory.php',
        data: {
            param: 1
        }
    }).done(function (rec) {
        $('#tblHistory').html(rec)
    })
}

function deleteRecord(delId) {
    Swal.fire({
        title: 'Are you sure?',
        width: 400,
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'DELETE'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: 'functions/assess_updHistory.php',
                data: {
                    delID: delId,
                    paramDelete: 1
                }
            }).done(function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    width: 400,
                    text: 'Your file has been deleted successfuly!',
                    showConfirmButton: false,
                    timer: 1300
                })
                tableData()
            })
        }
      })
}

$(document).ready(function () {
    tableData()
});