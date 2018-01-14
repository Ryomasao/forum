/**
 * エラー情報を管理するクラスだよ！
 */
module.exports = class Errors{
   constructor() {
    //エラー情報を管理するプロパティ
    this.errors = {}
   }

   /**
    * @param {*} errors :axiosのerror.response.data、つまりエラー時のレスポンスのbodyを設定するんだよ
    */
   record(errors){
        this.errors = errors
   }

   /**
    * レスポンスデータのbody部分のエラーメッセージを返すよ
    *
    * @param {*} name :string コントロールの名前
    * @returns {string}
    */
   get(field){
        if(this.errors[field]){
            return this.errors[field][0];
        }
   }

   /**
    * エラークラスにfieldにセットされたエラーがあるか調べるよ
    * @param {*} field 
    * @returns {boolean}
    */
   has(field){
      return  this.errors.hasOwnProperty(field)
   }

   /**
    * filedで指定されたプロパティを削除するよ　
    * @param {string} field 
    */
   clear(field){
    delete this.errors[field];
   }

   /**
    * エラー情報の要素を全部消すよ
    */
   reset(){
       this.errors = {}
   }

}
