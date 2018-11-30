// JavaScript File

window.onload = function(){
            
        let httpRequest;
        
        let button = document.getElementById("button").addEventListener("click", function(event){
            event.preventDefault();
            
            
            let title = document.getElementById("jobTitle").value;
            let jobInfo = document.getElementById("jobInfo").value; 
            let category = document.getElementById("category").value; 
            let company = document.getElementById("company").value; 
            let location = document.getElementById("location").value;
            let token = document.getElementById("token").getAttribute("value");
            
            let data = {title: title, jobInfo: jobInfo, category: category, company: company, location: location, token: token};
          
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
            
        })
        
};