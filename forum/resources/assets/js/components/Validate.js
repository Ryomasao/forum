module.exports = function(text){
    return new Promise(function(resolve, reject){
        console.log('start');
        let count = (text.match(new RegExp('おはんき','g')) || []).length

        //チェックがOKだったら
        if(count > 0){
            resolve();
        }else{
            reject('ファイルの内容がおかしいよ');
        }

    })
}