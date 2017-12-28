
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));


let drop = Vue.extend({
    template:`
            <div class="drop">
                <input class="drop__input" id="file" type="file" name="file" v-on:drop.prevent="dropFile"  v-on:dragover.prevent v-on:change="dropFile">
                <label class="drop__button" for="file" >選択</label> 
            </div>
    `,
    methods:{
        dropFile:function(event){
            let fileList = event.dataTransfer.files;
            console.log("drop");
            console.log(fileList[0]);
        }
    }
});


/**
 * フォームクラスだよ！
 */
class Form{
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

   /**
    * フォームデータの送信が成功した場合
    */
   onSuccess(response){
        console.log(response);
   }

   /**
    * フォームデータの送信が失敗した場合
    */
   onFail(error){
        this.errors.record(error);
   }

}




/**
 * エラー情報を管理するクラスだよ！
 */
class Errors{
   constructor() {
    //エラー情報を管理するプロパティ
    console.log("im created")
    this.errors = {}
   }

   /**
    * @param {*} errors :axiosのerror.response.data、つまりエラー時のレスポンスのbodyが入るんだよ
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
    * 
    * @param {*} field 
    * @returns {boolean}
    */
   has(field){
      return  this.errors.hasOwnProperty(field)

      /*
      console.log(this.errors.errors.hasOwnProperty('title'));

      if(Object.keys(this.errors).length === 0){
          console.log("nothing");
          return false;
      }else{
          console.log("exists");
          return true;
      }

      */
   }

   /**
    * filedで指定されたプロパティを削除する 
    * @param {string} field 
    */
   clear(field){
    delete this.errors[field];
   }

}


const app = new Vue({
    el: '.simple-form',
    data:{
        //test
        target:'',
        form: new Form({
            title:'',
            body:'',
            file:'',
        }),
    },
    methods:{
        //Formのsubmitイベントが発生したとき
        onSubmit:function(){
            this.form.submit();
        },
        //titleの値を変えてみる(あとで消す)
        get:function(){
            console.log(this.target);
            console.log(this.form.file);
            let data = new FormData({
                file:this.form.file
            });
            axios.get(this.target);
        },
        //titleの値を変えてみる(あとで消す)
        post:function(){
            axios.put(this.target, 'hello');
        },
        xhr:function(){
            var xhr = new XMLHttpRequest();
            fd = new FormData();
            xhr.open('PUT', this.target, true)
            xhr.send(fd);
        },
        
    },
    components:{
        drop:drop
    }
});

