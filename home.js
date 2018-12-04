/* global $ job_id*/

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
        
         //call for script that handles new job from submission
        $(document).on("click", '#job_button', function(event){
             event.preventDefault(); //prevent default action of button event
		      $.getScript("/addJob.js", function(){
            });
		});
       
//         //call for script that handles new user from submission
//         $(document).on("click", '#user_button', function(event){
//             event.preventDefault(); //prevent default action of button event
// 		    $.getScript("/addUser.js", function(){
//             });
// 		});
         
         //loads new job from when clicked from post job button
         $(document).on("click", '#post-job', function(event){
            event.preventDefault(); //prevent default action of button event
            $('#home_result').load("/addJob.php");
		});
		
		//loads dashboard page when clicked
		$(document).on("click", '#dashboard', function(event){
            event.preventDefault(); //prevent default action of button event
            $('#home_result').load("/dashboard.html");
		});
		
		//loads new user from when clicked
		$(document).on("click", '#add_user', function(event){
            event.preventDefault(); //prevent default action of button event
            $('#home_result').load("/addUser.php");
		});
		
		//loads new job from when clicked
		$(document).on("click", '#add_job', function(event){
            event.preventDefault(); //prevent default action of button event
            $('#home_result').load("/addJob.php");
		});
		
		//loads logout code when clicked
		$(document).on("click", '#logout', function(event){
            event.preventDefault(); //prevent default action of button event
            $('#home_result').load("/logout.php");
		});
		
			//loads logout code when clicked
		$(document).on("click", '.job', function(event){
            event.preventDefault(); //prevent default action of button event
            $('#home_result').load("/jobDetails.html");
            job_id = ($(this).attr('id'));
            $.getScript("/jobDetails.js", function(){
            });
		});
});