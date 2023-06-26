$(document).on('click', '#restore', function() {
    let data = $(this).data('id');
    let type = $(this).data('key');

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, restore it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
                }
            });

            $.ajax({
                type: "get",
                url: "/bin/"+type+"/restore",
                data: {
                    data: data
                },
                success: function(data){
                    $("#row-bin").load(location.href + " #row-bin");
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Data Restored!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            });
        }
      })
});

$(document).on('click', '#delete', function() {
    let data = $(this).data('id');
    let type = $(this).data('key');

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
                }
            });

            $.ajax({
                type: "get",
                url: "/bin/"+type+"/destroy",
                data: {
                    data: data
                },
                success: function(data){
                    $("#row-bin").load(location.href + " #row-bin");
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Data Deleted!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            });
        }
      })
});