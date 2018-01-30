
require('./bootstrap');
window.Vue = require('vue');

//ファイル選択コンポーネント
const Drop = require('./components/drop');

new Vue({
    el:'.form',
    data:{
        //タイトル
        title:'',
        //ファイル
        files:''
    },
    methods:{
        //ファイル送信処理
        onSubmit:function(){
            console.log('test');

            //送信データはFormDataを使うよ！
            let data = new FormData;

            //titleを追加
            data.append('title', this.title);

            //filesは複数ファイルを選択できる想定なのでループで追加するよ！
            for(let i = 0; i < this.files.length; i++){
                data.append('files[]', this.files[i]);
            }

            //axiosでサーバーに送るよ！
            axios.post('/file',data)
            .then((response) => {
                console.log(response.data);
            })
            .catch((error) => {
                console.log(error);
            })
        },
        sendFile:function(files){
            this.files = files;
        }
        
    },
    components:{
        'drop':Drop
    }
})