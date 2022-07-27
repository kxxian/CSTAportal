function tableData() {
    $.ajax({
        type: 'POST',
        url: 'functions/notes.php',
        data: {
            param: 1
        }
    }).done(function(rec) {
        $('#tblNotes').html(rec)
    })
}

function cleaner() {
    $('#noteId').val('')
    $('#note').val('')
}


function loadData(noteid) {
    Swal.fire({
  title: 'Are you sure?',
  width: 400,
  text: "Your file will be edited",
  icon: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, edit it!'
}).then((result) => {
  if (result.isConfirmed) {
      $('#modalNote').modal('show')
  }
    $.ajax({
        type: 'POST',
        url: 'functions/notes.php',
        data: {
            paramEdit: 1,
            NoteID: noteid
        }
    }).done(function(rec) {
        let rowEdit = $.parseJSON(rec)
        $('#noteId').val(rowEdit['note_Id'])
        $('#note').val(rowEdit['note_text'])
    })
})
}

function deleteData(noteid) {
    Swal.fire({
  title: 'Are you sure?',
  width: 400,
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
      $.ajax({
          type: 'POST',
          url: 'functions/notes.php',
          data: {
              paramDelete: 1,
              NoteID: noteid
          }
      }).done(function() {
          Swal.fire({
              icon: 'success',
              title: 'Success!',
              width: 400,
              text: 'File has been deleted!',
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

    $('#btnNote').click(function() {
        cleaner()
        $('#modalNote').modal('show')
    })

    // Autofocus
    $('#modalNote').on('shown.bs.modal', function() {
        $(this).find('[autofocus]').focus()
    })


    $('#btnSave_note').click(function () {
        let noteId = $('#noteId').val()   
        let note = $('#note').val()   
        let data = note + '^' + noteId

        if (note === '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                width: 400,
                text: 'Insufficient Data'
            })
        } else {
            $.ajax({
                type: 'POST',
                url: 'functions/notes.php',
                data: {
                    upsert: 1,
                    Data: data
                }
            }).done(function() {
                $('#modalNote').modal('toggle')
                if (noteId !== '') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        width: 400,
                        text: 'Your work has been updated!',
                        showConfirmButton: false,
                        timer: 1300
                    })
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        width: 400,
                        text: 'Your work has been saved!',
                        showConfirmButton: false,
                        timer: 1300
                    })
                }
                tableData()
            })
        }
    })
})

