const Errors = require('./Error')

const Time = require('./Time');

/**
 * フォームクラスだよ!
 */
module.exports = class Form{
   constructor(data) {
    //フォームのデータ 
    this.originalData = data;

    //dataの各要素をFormクラスのプロパティとして登録する
    for(let field in this.originalData){
        this[field] = this.originalData[field];
    }

    //エラー情報を管理するプロパティ
    this.errors = new Errors();
   }

   /**
    * Formのデータをサーバーに送信するよ！
    */
   submit(){
        //プロパティの値を再設定する
        for(let field in this.originalData){
            this.originalData[field] = this[field];
        }
        axios.post('/thread', this.originalData)
        //HTTPリクエストが成功したとき
        .then(response => this.onSuccess(response.data))
        //HTTPリクエエストが失敗した時
        .catch(error => this.onFail(error.response.data.errors));



   }

   push(){

        /**
         * だめなパターン
         */

        setTimeout(function(){
            console.log('洗剤を買いに行く');
        },3000);

        setTimeout(function(){
            console.log('洗濯機を回す');
        },1000);

        setTimeout(function(){
            console.log('洗濯ものを干す');
        },2000);


        let time = new Time();
        //非同期処理
        //time.general(this.afterGeneral);

        /*
        time.general(
            function () {
               setTimeout(function(){
                   console.log('after General');
                   setTimeout(function(){
                        console.log('after after General');
                   },1000)
               },1000) 
            }
        );
        */
        console.log('we wish  after hello  but it isnt');
   }
   afterGeneral(callback){
       console.log('after General');
       //callback();
   }
   afterAfterGeneral(){
       console.log('after after General');
   }

   /**
    * フォームデータの送信が成功した場合
    */
   onSuccess(response){
        //エラーの情報をクリア
        this.errors.reset();
   }

   /**
    * フォームデータの送信が失敗した場合
    */
   onFail(error){
        this.errors.record(error);
   }

}