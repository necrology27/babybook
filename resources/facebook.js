(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/hu_HU/sdk.js#xfbml=1&version=v2.10";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
 }(document, 'script', 'facebook-jssdk'));

 	window.fbAsyncInit = function() {
	    FB.init({
	    appId      : '1082827931852967',
	    cookie     : true,
	    secret	   : '514e9e758718035e7664636ef56de7b5',               
	    xfbml      : true,  
	    version    : 'v2.10'
	    });
	FB.getLoginStatus(function(response) {
	});
};
function login() {
    FB.login(function(response) {
    	testAPI();
    });            
}

function logout() {
    FB.logout(function(response) {
    });
}

function testAPI() {
    FB.api('/me?fields=id,name,first_name,last_name,picture,email,permissions', function(response) {

       var name = response.name;
       var id= response.id;
       var email = response.email;
    $.ajax({
            method: 'POST',
            url: base_url + 'login/login_with_facebook',
            dataType: 'text',
            data: {
              'name': name,
              'id': id,
              'email':email
            },
            success: function(data) {
             if(data == 'ok')
                 window.location.href = base_url + "home";
          },
          error: function(xhr, status, error) {
              alert(error);
          }
          });
    });
}