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
});