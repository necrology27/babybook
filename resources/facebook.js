function faceFunc() {
    
	//var faceWindow = window.open("", "", "width=200,height=100");
	//faceWindow.document.write("<div id='fb-root'></div>");
	//faceWindow.document.write("<div class='fb-login-button'  data-max-rows='1' data-button-type='continue_with' data-show-faces='false' data-auto-logout-link='false' data-use-continue-as='false'></div>");
	//faceWindow.document.write("<label id=status></label>");

	(function(d, s, id) {
		 console.log("1");
	    var js, fjs = d.getElementsByTagName(s)[0];
	    if (d.getElementById(id)) return;
	    js = d.createElement(s); js.id = id;
	    js.src = "//connect.facebook.net/hu_HU/sdk.js#xfbml=1&version=v2.10";
	    fjs.parentNode.insertBefore(js, fjs);
	    console.log("2");
	}(document, 'script', 'facebook-jssdk'));
	
    function statusChangeCallback(response) {
    	console.log("3");
        console.log('statusChangeCallback');
        console.log(response);
        if (response.status === 'connected') {
              testAPI();
        } else {
        	document.getElementById('status').innerHTML = 'Please log ' +
                'into this app.';
        }
        console.log("4");
    }
	    
    function checkLoginState() {
    	console.log("5");
	    FB.getLoginStatus(function(response) {
	      statusChangeCallback(response);
	    });
	    console.log("6");
    }
	    
    window.fbAsyncInit = function() {
    	console.log("7");
	    FB.init({
	    appId      : '1082827931852967',
	    cookie     : true,
	    secret	   :	'514e9e758718035e7664636ef56de7b5',               
	    xfbml      : true,  
	    version    : 'v2.10'
	    });
	    FB.getLoginStatus(function(response) {
	    	console.log('Be van jelentkezve');
	        statusChangeCallback(response);
	        
	    });
	    console.log("8");
    
    };
	
    (function(d, s, id) {
    	console.log("9");
	        var js, fjs = d.getElementsByTagName(s)[0];
	        if (d.getElementById(id)) return;
	        
	        js = d.createElement(s); js.id = id;
	        js.src = "//connect.facebook.net/en_US/sdk.js";
	        fjs.parentNode.insertBefore(js, fjs);
	        console.log("10");
     }(document, 'script', 'facebook-jssdk'));
	
        function testAPI() {
        	console.log("11");
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me?fields=id,name,first_name,last_name,picture,email,permissions', function(response) {
            	//alert(JSON.stringify(response));
              console.log('Successful login for: ' + response.name);
              document.getElementById('status').innerHTML =
                'Thanks for logging in, ' + response.name + '!';
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
            console.log("12");
            //FB.logout();
        }
}