
/**
 * Laravelが用意してくれているセットアップ
 */
require('./bootstrap');
const Form = require('./components/Form');
const ReadFile = require('./components/ReadFile');
const Xhr = require('./components/Xhr');

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

            /// GET /sample1 した後の処理を書く
            const callbackAfterRequest = function(){
                var xhr= new XMLHttpRequest();
                xhr.open("GET","/other");
                xhr.send(); 

                //リクエストを受信したときのイベント
                xhr.onload = function(){
                    if(xhr.readyState === 4 && xhr.status === 200) {
                        console.log(xhr.responseText);
                      }
                };
            }


            //ReadFile.jsの中でやってほしいことを書く
            const callback = function(text){
                //ファイルの中の「おはんき」の出現回数を数える
                let count = (text.match(new RegExp('おはんき','g')) || []).length

                //チェックがOKだったら
                if(count > 0){
                    //サーバーにリクエストを飛ばす
                    //リクエストが成功した後の処理を書く
                    Xhr(callbackAfterRequest);
                }
            }

            //定義した関数を渡す
            let text =  ReadFile(file, callback);

            console.log(text);
        },
        onDrop2:function(event){
            

        }

    },
});

