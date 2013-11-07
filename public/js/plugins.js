/*!
 * jQuery Browser Plugin v0.0.3
 * https://github.com/gabceb/jquery-browser-plugin
 *
 * Original jquery-browser code Copyright 2005, 2013 jQuery Foundation, Inc. and other contributors
 * http://jquery.org/license
 *
 * Modifications Copyright 2013 Gabriel Cebrian
 * https://github.com/gabceb
 *
 * Released under the MIT license
 *
 * Date: 2013-07-29T17:23:27-07:00
 */
(function(e,t,n){"use strict";var r,i;e.uaMatch=function(e){e=e.toLowerCase();var t=/(opr)[\/]([\w.]+)/.exec(e)||/(chrome)[ \/]([\w.]+)/.exec(e)||/(webkit)[ \/]([\w.]+)/.exec(e)||/(opera)(?:.*version|)[ \/]([\w.]+)/.exec(e)||/(msie) ([\w.]+)/.exec(e)||e.indexOf("trident")>=0&&/(rv)(?::| )([\w.]+)/.exec(e)||e.indexOf("compatible")<0&&/(mozilla)(?:.*? rv:([\w.]+)|)/.exec(e)||[];var n=/(ipad)/.exec(e)||/(iphone)/.exec(e)||/(android)/.exec(e)||/(win)/.exec(e)||/(mac)/.exec(e)||/(linux)/.exec(e)||[];return{browser:t[1]||"",version:t[2]||"0",platform:n[0]||""}};r=e.uaMatch(t.navigator.userAgent);i={};if(r.browser){i[r.browser]=true;i.version=r.version}if(r.platform){i[r.platform]=true}if(i.chrome||i.opr){i.webkit=true}else if(i.webkit){i.safari=true}if(i.rv){i.msie=true}if(i.opr){i.opera=true}e.browser=i})(jQuery,window);

/*
 * jQuery postMessage - v0.5 - 9/11/2009
 * http://benalman.com/projects/jquery-postmessage-plugin/
 *
 * Copyright (c) 2009 "Cowboy" Ben Alman
 * Dual licensed under the MIT and GPL licenses.
 * http://benalman.com/about/license/
 */
(function($){var g,d,j=1,a,b=this,f=!1,h="postMessage",e="addEventListener",c,i=b[h]&&($.browser.opera===undefined||!$.browser.opera);$[h]=function(k,l,m){if(!l){return}k=typeof k==="string"?k:$.param(k);m=m||parent;if(i){m[h](k,l.replace(/([^:]+:\/\/[^\/]+).*/,"$1"))}else{if(l){m.location=l.replace(/#.*$/,"")+"#"+(+new Date)+(j++)+"&"+k}}};$.receiveMessage=c=function(l,m,k){if(i){if(l){a&&c();a=function(n){if((typeof m==="string"&&n.origin!==m)||($.isFunction(m)&&m(n.origin)===f)){return f}l(n)}}if(b[e]){b[l?e:"removeEventListener"]("message",a,f)}else{b[l?"attachEvent":"detachEvent"]("onmessage",a)}}else{g&&clearInterval(g);g=null;if(l){k=typeof m==="number"?m:typeof k==="number"?k:100;g=setInterval(function(){var o=document.location.hash,n=/^#?\d+&/;if(o!==d&&n.test(o)){d=o;l({data:o.replace(n,"")})}},k)}}}})(jQuery);


/*!
 * jQuery OAuth via popup window plugin
 *
 * @author  Nobu Funaki @nobuf
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 */
(function($){
  //  inspired by DISQUS
  $.oauthpopup = function(options)
  {
    if (!options || !options.path) {
      throw new Error("options.path must not be empty");
    }

    var left = (screen.width/2)-(800/2);
    var top = (screen.height/2)-(400/2);

    options = $.extend({
      windowName: 'ConnectWithOAuth' // should not include space for IE
      , windowOptions: 'location=0,status=0,width=600,height=275,top='+top+',left='+left
      , callback: function(){ window.location.reload(); }
    }, options);

    var callback = function(data) {
      $.receiveMessage(); // Remove callback
      options.callback(null, data);
    };


    setTimeout(function() {
      callback(new Error('Authorization timed out'));
    }, 600 * 1000);

    var oauthWindow  = window.open(options.path, options.windowName, options.windowOptions);

    $.receiveMessage(function(e) {
      if (e.source !== oauthWindow)
        return;

      callback(e.data);
    });

    if (oauthWindow) {
      oauthWindow.focus();
    }
  };

  //bind to element and pop oauth when clicked
  $.fn.oauthpopup = function(options) {
    $this = $(this);
    $this.click($.oauthpopup.bind(this, options));
  };
})(jQuery);

