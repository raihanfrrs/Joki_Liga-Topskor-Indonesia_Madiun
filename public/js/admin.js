$(document).ready(function () {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
        }
    });

    $.ajax({
        type: "get",
        url: "/dashboard/admin/totalClubs",
        success: function(data){
            $("#totalClubs").html(data);
        }
    });
    
    $.ajax({
        type: "get",
        url: "/dashboard/admin/totalPlayers",
        success: function(data){
            $("#totalPlayers").html(data);
        }
    });

    $.ajax({
        type: "get",
        url: "/dashboard/admin/totalAges",
        success: function(data){
            $("#totalAges").html(data);
        }
    });

    $.ajax({
        type: "get",
        url: "/dashboard/admin/totalZones",
        success: function(data){
            $("#totalZones").html(data);
        }
    });

    $.ajax({
        type: "get",
        url: "/dashboard/admin/totalTrashed",
        success: function(data){
            if(data != 0){
                $("#totalTrashed").html(data);
            }
        }
    });

    const defaultSelectedOption = $('#club').find('option:selected');
    const clubId = defaultSelectedOption.val();
    const slugPlayer = $('#age-group-data').data('id');

    $.ajax({
        type: "get",
        url: "/player/age-group-data",
        data: {
            "club": clubId,
            "slug": slugPlayer
        },
        success: function(data){
            console.log(data);
            $("#age-group-data").html(data);
        }
    });

    // CUSTOM FUNCTION

    $('#club').on('change', function() {
        var selectedOption = $(this).find('option:selected');
        var clubId = selectedOption.val();

        $.ajax({
            type: "get",
            url: "/player/age-group-data",
            data: {
                "club": clubId,
                "slug": slugPlayer
            },
            success: function(data){
                $("#age-group-data").html(data);
            }
        });
    });
});

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

$(document).on('change', '#statusPlayer', function () {
    let selectedOption = $(this).find('option:selected');
    let status = selectedOption.val();
    let player = $(this).data('key');

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
        }
    });

    $.ajax({
        type: "get",
        url: "/player/status/update",
        data: {
            "player": player,
            "status": status
        },
        success: function(data){
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Status Updated!',
                showConfirmButton: false,
                timer: 1500
            })
            location.reload();
        }
    });
});

$(document).on('change', '#statusOfficial', function () {
    let selectedOption = $(this).find('option:selected');
    let status = selectedOption.val();
    let official = $(this).data('key');

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
        }
    });

    $.ajax({
        type: "get",
        url: "/official/status/update",
        data: {
            "official": official,
            "status": status
        },
        success: function(data){
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Status Updated!',
                showConfirmButton: false,
                timer: 1500
            })
            location.reload();
        }
    });
});