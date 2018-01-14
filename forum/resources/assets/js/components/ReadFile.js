module.exports = function(file, callback){
    let reader = new FileReader();

    //読み込み終わったあとのイベント
    reader.onload = function(){
        text = reader.result

        //callbackを使う
        callback(text)
    }
    //読み込み開始
    reader.readAsText(file)
}