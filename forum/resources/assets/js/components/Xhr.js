module.exports = function(callback){
     var xhr= new XMLHttpRequest();
     xhr.open("GET","/sample");
     xhr.send(); 

     //リクエストを受信したときのイベント
     xhr.onload = function(){
         if(xhr.readyState === 4 && xhr.status === 200) {
             console.log(xhr.responseText);
             callback();
           }
     };
}