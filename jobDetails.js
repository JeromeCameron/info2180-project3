// JavaScript File

window.onload = function(){
            
        let httpRequest;
        let applyJob = document.getElementById("apply-job").addEventListener("click", function(){
            
        })
        
        makeRequest()
        
        function makeRequest(){
            httpRequest = new XMLHttpRequest();
            httpRequest.onreadystatechange = request;
            httpRequest.open('POST', "/dashboard.php", true);
            httpRequest.send();
        }
        
        function request(){
            if (httpRequest.readyState === XMLHttpRequest.DONE){
                if (httpRequest.status === 200){
                    document.getElementById('openJobs').innerHTML = httpRequest.responseText;
                } else {
                    alert('There was a problem with the request.');
                }
            }
        }
};