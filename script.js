// Built by @traf
// https://tr.af

// Replace access token with your own
// Generate here: https://instagram.pixelunion.net

$(function(){
  $.get('https://api.instagram.com/v1/users/self/?access_token=27019167.1677ed0.6eae5e38f814456bb38168b55110b81e',
        function(data) {
    $("#button-count").html((kFormatter(data.data.counts.followed_by)));
  }
       )
  function kFormatter(num) {
    return Math.abs(num) > 999 ? Math.sign(num)*((Math.abs(num)/1000).toFixed(1)) + 'k' : Math.sign(num)*Math.abs(num)
  }

});