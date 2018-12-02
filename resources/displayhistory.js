$(document).ready(function() {
  everything();
  console.log('#someButton was clicked');
});
function everything(){
  $.ajax({
      type: "GET",
      url: "resources/data.json",
      dataType: "json",
      success: function(responseData, status){
        var output = '';
        $.each(responseData, function(i, item) {
          output += "</br>";
          output += "<div id='box'>" + "__>>>   " + item.state + "  ---  " + item.city + "  ---  " + item.pic + "  ---  " + item.timestamp + "</div>";
          output += "</br>";
        });
        $(".HistoryOutput").html(output);
       }, error: function(msg) {
        alert("There was a problem: " + msg.status + " " + msg.statusText);
      }
   });
}