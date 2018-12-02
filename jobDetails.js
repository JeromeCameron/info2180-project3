// JavaScript File
window.onload = function(){
            
        let httpRequest;
        
        let applyJob = document.getElementById("apply-job").addEventListener("click", function(event){
           
            let job_id;
            let encodedData = "";
            let encodedDataPairs = [];
            let data = {job_id: job_id};
            let name;
            
            let frame = document.getElementById("frame");
            console.log(frame);
            
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
                } else {
                    alert('There was a problem with the request.');
                }
            }
        }
};