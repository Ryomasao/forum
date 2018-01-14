module.exports = function(url){
    return new Promise(function(resolve, reject){
        var xhr= new XMLHttpRequest();
        xhr.open("GET", url);
        xhr.send(); 

        //リクエストを受信したときのイベント
        xhr.onload = function(){
            if(xhr.readyState === 4 && xhr.status === 200) {
                resolve(xhr.responseText);
            }else{
                reject('リクエストに失敗しているよ');
            }
        };
    })
}