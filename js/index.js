$(function() {
  var participate_btn = $("button[name='participate']");
  for(var i = 0; i < participate_btn.length; i++) {
    participate_btn[i].onclick = function() {
      var result = window.confirm("本当に参加しますか？");
      if (result) {
        var data = { request: this.value };
        $.ajax({
          type: "POST",
          url: "participate.php",
          data: data,

          /**
           * Ajax通信が成功した場合に呼び出される。
           */
          success: function(data, dataType)
          {
            var redirect_url = "http://localhost:8000/show.php?id=" + data;
            location.href = redirect_url;
          }
        });
      }
      return false;
    }
  }
});
