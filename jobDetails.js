// JavaScript File request and sends job details to jobDetails.html page
/* global $ job_id */

$(document).ready(function(){
            
        let httpRequest;
        
        let id = job_id;
        alert(id);
        //allows a user to apply for the particular job being displayed
        let applyJob = document.getElementById("apply-job").addEventListener("click", function(event){
            
            event.preventDefault();

            let encodedData = "";
            let encodedDataPairs = [];
            let data = {id: id};
            let name;
            
            for(name in data) {
                        encodedDataPairs.push(encodeURIComponent(name) + '=' + encodeURIComponent(data[name]));
                    }
            
            encodedData = encodedDataPairs.join('&').replace(/%20/g, '+');
                    
            httpRequest.onreadystatechange = sendData;
            httpRequest.open('POST', "/apply.php");
            httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            httpRequest.send(encodedData);
                
            function sendData(){
                if (httpRequest.readyState === XMLHttpRequest.DONE){
                    if (httpRequest.status === 200){
                            document.getElementById('message').innerHTML = httpRequest.responseText;
                    } else {
                        alert('There was a problem with the request.');
                    }
                }
            }
       });
        
        
        //_______________________________________________________________________________________________
        
        //sends request to server for job details
        makeRequest();
        
        function makeRequest(){
            httpRequest = new XMLHttpRequest();
            httpRequest.onreadystatechange = request;
            httpRequest.open('POST', "/jobDetails.php", true);
            httpRequest.send();
        }
        
        function request(){
            if (httpRequest.readyState === XMLHttpRequest.DONE){
                if (httpRequest.status === 200){
                    document.getElementById('result').innerHTML = httpRequest.responseText;
                    let text = httpRequest.responseText;
                    job_id = text.substr(text.length - 5,1);
                } else {
                    alert('There was a problem with the request.');
                }
            }
        }
});