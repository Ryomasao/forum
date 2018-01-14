module.exports = class Time{

   general(callback) {
    //これがファイルを読み込む非同期の関数だとする。
    setTimeout(function(){
        console.log('General');
        callback();
    },3000)
   }

}
