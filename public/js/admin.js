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
        url: "/dashboard/admin/totalOfficials",
        success: function(data){
            $("#totalOfficials").html(data);
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
        url: "/dashboard/admin/totalTrashed",
        success: function(data){
            if(data != 0){
                $("#totalTrashed").html(data);
            }
        }
    });
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

$(document).on('change', '#statusMail', function () {
    let selectedOption = $(this).find('option:selected');
    let status = selectedOption.val();
    let mail = $(this).data('key');

    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
        }
    });

    $.ajax({
        type: "get",
        url: "/mail/status/update",
        data: {
            "mail": mail,
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