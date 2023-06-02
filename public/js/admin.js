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