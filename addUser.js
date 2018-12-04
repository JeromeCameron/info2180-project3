// JavaScript File to validate and submit form data captured
/* global $ */

$(document).ready(function(){
    
         $(document).on("click", '#user_button', function(event){
             
            event.preventDefault();   
            let httpRequest;
            let numExp = /(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}/; //password regular expression
            let tele = /^\d{3}-\d{3}-\d{4}$/; //telephone number regular expression
                
            //Variable inputs from form
            let firstname = document.getElementById("firstname");
            let lastname = document.getElementById("lastname"); 
            let password = document.getElementById("password"); 
            let email = document.getElementById("email"); 
            let telephone = document.getElementById("telephone");
            let token = document.getElementById("token").getAttribute("value");
            
            let name;
            let data = {firstname: firstname, lastname: lastname, password: password, email: email, telephone: telephone};
            
            //Code to test data for validity.
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
                 
                 if(telephone.value === "" || (telephone.value !== "" && !tele.test(telephone.value))){
                    telephone.classList.add("invalid");
                    telephone.insertAdjacentHTML('afterend', "<p class = 'message'>Telephone number format must be for eg 876-555-7896</p>");
                    result = false;
                 }
                
                 return result;
            }
            
             //Function uses AJAX to send form data to PHP file handling inputs to database    
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
            
             //function checks if any field in the form is balnk and notifies the user by highlighting the field or fields
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