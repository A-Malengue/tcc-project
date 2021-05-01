$(document).ready(function(){
  $(".like").click(function(){
    var id  = this.id;
    $.ajax({
      url: 'posts.php',
      type: 'POST',
      data: {id:id},
      datatype: 'JSON',

      success:function(data){
        var likes = data['likes'];
        var text = data['likes'];

        $("#Likes_"+id).text(likes);
        $("#+id").html(text);

      }
    });
  });
});
