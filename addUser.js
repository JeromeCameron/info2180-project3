// JavaScript File

// JavaScript File
$(document).ready(function(){
            
        let httpRequest;
        let numExp = /(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}/; //password regular expression
        
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
        
            function testData(){
                let result = false;
                for(name in data) {
                    if(blankField(data[name])){
                        result = true;
                    }else{
                        result = false;
                    }
                 }
                 if(password.value === "" || (password.value !== "" && !numExp.test(password.value))){
                    password.classList.add("invalid");
                    password.insertAdjacentHTML('afterend', "<p class = 'message'>Password must contain one number, one letter, one capital letter and be at least 8 characters long</p>");
                    result = false;
                 }
                
                 return result;
            }
                
            if(testData()){
                
                data = {firstname: firstname.value, lastname: lastname.value, password: password.value, email: email.value, telephone: telephone.value, token: token};
                
                prepData();
            
                function prepData(){
                    httpRequest = new XMLHttpRequest();
                    let encodedData = "";
                    let encodedDataPairs = [];
    
                    
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
            }        
            
            function blankField(ele){
                    if (ele.value === ""){
                        ele.classList.add("invalid");
                        ele.insertAdjacentHTML('afterend', "<p class = 'message'>Field can't be blank</p>");
                        return false;
                    }else{
                        $("p").remove(".message");
                        ele.classList.remove("invalid");
                        return true;
                    }
                }
            
        });
        
});