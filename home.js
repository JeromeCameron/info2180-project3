/* global $ */

$(document).ready(function(){
        
         $.getScript("/dashboard.js", function(){
                //call for script that handles new user from submission
            });
        
        let httpRequest;
                
        prepData();
      
        function prepData(){
            httpRequest = new XMLHttpRequest();
            httpRequest.open('GET', '/dashboard.html');
            httpRequest.onreadystatechange = sendData;
            httpRequest.send();
        }
        
        function sendData(){
            if (httpRequest.readyState === XMLHttpRequest.DONE){
                if (httpRequest.status === 200){
                     document.getElementById('home_result').innerHTML = httpRequest.responseText;
                } else {
                    alert('There was a problem with the request.');
                    console.log(httpRequest.readyState );
                    console.log(httpRequest.status);
                }
            }
        }
        
        $(document).on("click", '#job_button', function(event){
             event.preventDefault(); //prevent default action of button event
		      $.getScript("/addJob.js", function(){
                //call for script that handles new job from submission
            });
		});
       
       
        $(document).on("click", '#user_button', function(event){
            event.preventDefault(); //prevent default action of button event
		    $.getScript("/addUser.js", function(){
                //call for script that handles new user from submission
            });
		});
                
});