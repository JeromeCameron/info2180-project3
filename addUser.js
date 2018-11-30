// JavaScript File

// JavaScript File

window.onload = function(){
            
        let httpRequest;
        
        let button = document.getElementById("button").addEventListener("click", function(event){
            event.preventDefault();
            
            
            let firstname = document.getElementById("firstname").value;
            let lastname = document.getElementById("lastname").value; 
            let password = document.getElementById("password").value; 
            let email = document.getElementById("email").value; 
            let telephone = document.getElementById("telephone").value;
            let token = document.getElementById("token").getAttribute("value");
            
            //Code to test all data for validity goes here
            
            
            let data = {firstname: firstname, lastname: lastname, password: password, email: email, telephone: telephone, token: token};
          
            prepData();
        
            function prepData(){
                httpRequest = new XMLHttpRequest();
                let encodedData = "";
                let encodedDataPairs = [];
                let name;
                
                for(name in data) {
                    encodedDataPairs.push(encodeURIComponent(name) + '=' + encodeURIComponent(data[name]));
                }
                
                encodedData = encodedDataPairs.join('&').replace(/%20/g, '+');
                
                httpRequest.onreadystatechange = sendData;
                httpRequest.open('POST', "/addUserProcess.php");
                httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                httpRequest.send(encodedData);
            }
            
            function sendData(){
                if (httpRequest.readyState === XMLHttpRequest.DONE){
                    if (httpRequest.status === 200){
                         document.getElementById('message').innerHTML = httpRequest.responseText;
                    } else {
                        alert('There was a problem with the request.');
                    }
                }
            }
            
        })
        
};