// JavaScript File
/* global $ */
$( document ).ready(function(){
    
        $("#post-job").click(function(){
             window.open("addJob.html","iframe_a");
        });
        
        let httpRequest;
        
        makeRequest();
        
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
})