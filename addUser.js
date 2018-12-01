// JavaScript File

// JavaScript File
$(document).ready(function(){
            
        let httpRequest;
        let numExp = /(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}/;
        
        let button = document.getElementById("button").addEventListener("click", function(event){
            event.preventDefault();
            
            //Variable inputs from form
            let firstname = document.getElementById("firstname");
            let lastname = document.getElementById("lastname"); 
            let password = document.getElementById("password"); 
            let email = document.getElementById("email"); 
            let telephone = document.getElementById("telephone");
            let token = document.getElementById("token").getAttribute("value");
            let name;
            let data = {firstname: firstname, lastname: lastname, password: password, email: email, telephone: telephone};
            
            //Code to test all data for validity goes here
            
            
                for(name in data) {
                        blankField(data[name]);
                     }
                 
                function blankField(ele){
                    if (ele.value === ""){
                        ele.classList.add("invalid");
                        ele.insertAdjacentHTML('afterend', "<p class = 'message'>Field can't be blank</p>");
                    }else{
                        $("p").remove(".message");
                        //ele.classList.remove("invalid");
                    }
                }
                    
            // data = {firstname: firstname.value, lastname: lastname.value, password: password.value, email: email.value, telephone: telephone.value, token: token};
            // prepData();
        
            // function prepData(){
            //     httpRequest = new XMLHttpRequest();
            //     let encodedData = "";
            //     let encodedDataPairs = [];

                
            //     for(name in data) {
            //         encodedDataPairs.push(encodeURIComponent(name) + '=' + encodeURIComponent(data[name]));
            //     }
                
            //     encodedData = encodedDataPairs.join('&').replace(/%20/g, '+');
                
            //     httpRequest.onreadystatechange = sendData;
            //     httpRequest.open('POST', "/addUserProcess.php");
            //     httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            //     httpRequest.send(encodedData);
            // }
            
            // function sendData(){
            //     if (httpRequest.readyState === XMLHttpRequest.DONE){
            //         if (httpRequest.status === 200){
            //              document.getElementById('message').innerHTML = httpRequest.responseText;
            //         } else {
            //             alert('There was a problem with the request.');
            //         }
            //     }
            // }
            
        })
        
});