var Root = "http://"+document.location.hostname+"/";

//Start payment session
function startSession() {
    $.ajax({
        url: Root+"controllers/controllerId.php",
        type: 'POST',
        dataType: 'html',
        success: function(data) {
            console.log(data);
        }
    });
}

startSession();