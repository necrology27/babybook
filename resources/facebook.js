function faceFunc() {
    
	var faceWindow = window.open("", "", "width=200,height=100");
	faceWindow.document.write("<div id='fb-root'></div>");
	faceWindow.document.write("<div class='fb-login-button'  data-max-rows='1' data-button-type='continue_with' data-show-faces='false' data-auto-logout-link='false' data-use-continue-as='false'></div>");
	faceWindow.document.write("<label id=status></label>");

	(function(d, s, id) {
	    var js, fjs = d.getElementsByTagName(s)[0];
	    if (d.getElementById(id)) return;
	    js = d.createElement(s); js.id = id;
	    js.src = "//connect.facebook.net/hu_HU/sdk.js#xfbml=1&version=v2.10";
	    fjs.parentNode.insertBefore(js, fjs);
	}(faceWindow.opener.document, 'script', 'facebook-jssdk'));
	
    function statusChangeCallback(response) {
        console.log('statusChangeCallback');
        console.log(response);
        if (response.status === 'connected') {
              testAPI();
        } else {
        	faceWindow.document.getElementById('status').innerHTML = 'Please log ' +
                'into this app.';
        }
    }
	    
    function checkLoginState() {
	    FB.getLoginStatus(function(response) {
	      statusChangeCallback(response);
	    });
    }
	    
    window.fbAsyncInit = function() {
	    FB.init({
	    appId      : '1082827931852967',
	    cookie     : true,
	                        
	    xfbml      : true,  
	    version    : 'v2.10'
	    });
	    FB.getLoginStatus(function(response) {
	    	console.log('Be van jelentkezve');
	        statusChangeCallback(response);
	        
	    });
    
    };
	
    (function(d, s, id) {
	        var js, fjs = d.getElementsByTagName(s)[0];
	        if (d.getElementById(id)) return;
	        
	        js = d.createElement(s); js.id = id;
	        js.src = "//connect.facebook.net/en_US/sdk.js";
	        fjs.parentNode.insertBefore(js, fjs);
     }(faceWindow.opener.document, 'script', 'facebook-jssdk'));
	
        function testAPI() {
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me', function(response) {
              console.log('Successful login for: ' + response.name);
              faceWindow.document.getElementById('status').innerHTML =
                'Thanks for logging in, ' + response.name + '!';
           	var name = response.name;
           	var id= response.id;
           	
            $.ajax({
	      		  method: 'POST',
	      		  url: base_url + 'login/login_with_facebook',
	                dataType: 'text',
	      		  data: {
	      			'name': name,
	      			'id': id
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
}