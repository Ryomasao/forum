
/**
 * Laravelが用意してくれているセットアップ
 */
require('./bootstrap');
const Form = require('./components/Form');
const ReadFile = require('./components/ReadFile');
const Xhr = require('./components/Xhr');
const Validate = require('./components/Validate');

window.Vue = require('vue');

const app = new Vue({
    el: '.simple-form',
    data:{
        form: new Form({
            title:'',
            body:'',
            file:'',
        }),
    },
    methods:{
        //Formのsubmitイベントが発生したとき
        onSubmit:function(){
            //this.form.submit();
            this.form.push();
        },
        //ファイルを選択またはドロップ
        onDrop:function(event){
            //ファイルを取得
            let file = event.target.files[0];

            //ファイル読み込み
            ReadFile(file)
            .then((text) =>{
                //ファイルチェック
                return Validate(text);
            })
            .then(() =>{
                //サーバーリクエスト
                return axios.get('/sample');
            })
            .then((text) =>{
                //サーバーリクエスト
                console.log(text);
                return axios.get('/other');
            })
            .then((text) =>{
                console.log(text);
            })
            .catch((error) =>{
                console.log(error);
            });

        },

    },
});

