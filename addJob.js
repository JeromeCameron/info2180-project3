// JavaScript File hanldes client side validation and form inputs submission to the hireme database
/* global $ */

$(document).ready(function(){
     
            let title = document.getElementById("jobTitle");
            let jobInfo = document.getElementById("jobInfo"); 
            let category = document.getElementById("category"); 
            let company = document.getElementById("company"); 
            let location = document.getElementById("location");
            let token = document.getElementById("token").getAttribute("value");
            let name;
            let data = {title: title, jobInfo: jobInfo, category: category, company: company, location: location};
            
            //checks if valid data
            function testData(){
                let result = false;
                
                for(name in data) {
                    if(blankField(data[name])){
                        result = true;
                    }else{
                        result = false;
                    }
                 }
                
                 return result;
            }
            
            //Function uses AJAX to send form data to PHP file handling inputs to database
            if(testData()){
                
                data = {title: title.value, jobInfo: jobInfo.value, category: category.value, company: company.value, location: location.value, token: token};
                
                let httpRequest;
                
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
                    httpRequest.open('POST', "/addJobProcess.php");
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