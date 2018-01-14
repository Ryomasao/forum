module.exports = function(file){
    return new Promise(function(resolve, reject){
        let reader = new FileReader();

        //読み込み終わったあとのイベント
        reader.onload = function(){
            let text = reader.result

            console.log('readEnd');
            resolve(text);
        }

        //読み込み開始
        console.log('readFile');
        reader.readAsText(file)

        })
}