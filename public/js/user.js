$(document).ready(function () {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
        }
    });
    
    $.ajax({
        type: "get",
        url: "/dashboard/user/totalPlayers",
        success: function(data){
            $("#totalPlayers").html(data);
        }
    });

    $.ajax({
        type: "get",
        url: "/dashboard/user/totalOfficials",
        success: function(data){
            $("#totalOfficials").html(data);
        }
    });

    $.ajax({
        type: "get",
        url: "/dashboard/user/totalMails",
        success: function(data){
            $("#totalMails").html(data);
        }
    });

    $.ajax({
        type: "get",
        url: "/dashboard/user/totalTrashedClub",
        success: function(data){
            if(data != 0){
                $("#totalTrashedClub").html(data);
            }
        }
    });

    $.ajax({
        type: "get",
        url: "/dashboard/user/listMail",
        success: function(data){
            if(data != 0){
                $("#mail-list").html(data);
            }
        }
    });
});