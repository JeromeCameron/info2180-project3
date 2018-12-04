/* global $ */

window.onload = function(){
            
        let httpRequest;
                
        prepData();
      
        function prepData(){
            httpRequest = new XMLHttpRequest();
            httpRequest.open('GET', '/addUser.php');
            httpRequest.onreadystatechange = sendData;
            httpRequest.send();
        }
        
        function sendData(){
            if (httpRequest.readyState === XMLHttpRequest.DONE){
                if (httpRequest.status === 200){
                     document.getElementById('result').innerHTML = httpRequest.responseText;
                } else {
                    alert('There was a problem with the request.');
                    console.log(httpRequest.readyState );
                    console.log(httpRequest.status);
                }
            }
        }
                
};