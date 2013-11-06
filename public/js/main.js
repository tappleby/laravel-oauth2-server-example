(function ($, window) {

  $('.btn-login').click(function(e) {
    e.preventDefault();

    $.oauthpopup({
      path: $(this).attr('href'),
      callback: function(){
        $.get(OAuthDemo.url + '/user_info', function(data){
          $('#user_info').html(JSON.stringify(data));
        });
      }
    });
  });

})(jQuery, window);