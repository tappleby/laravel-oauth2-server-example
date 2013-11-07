(function ($, window) {

  $('.btn-login').click(function(e) {
    e.preventDefault();

    $.oauthpopup({
      path: $(this).attr('href'),
      callback: function(err, data){
        data = JSON.parse(data);
        $('.alert').remove();

        var prettyJson = JSON.stringify(data, undefined, 2);
        $('<div class="alert alert-success"><strong>Oauth Response:</strong><pre>' + prettyJson + '</pre></div>').insertBefore('.page-header');

//        console.log(JSON.parse(data));
      }
    });
  });

})(jQuery, window);