<template>
    <div class="drop" @dragleave.prevent @dragover.prevent @drop.prevent="onDrop">
        <div class="drop__default-container">
            <label> ファイルを選択
                <input class="drop__input" type="file" multiple="multiple" @change="onDrop">
            </label>
        </div>
    </div>
</template>

<script>
    export default {
        methods:{
            onDrop:function(event){
                let fileList = event.target.files ? 
                               event.target.files:
                               event.dataTransfer.files;

                let files = [];

                for(let i = 0; i < fileList.length; i++){
                    files.push(fileList[i]);
                }

                //イベントsend-fileを発火させて、files変数を渡す
                this.$emit('send-file', files);
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style lang="scss">
    .drop{
        width: 50%;
        border: 1px solid;
        border-style: dashed;
        border-radius: 3px;
        padding: 30px;

        &__default-container{
            display: flex;
            justify-content: center;
        }

        &__input{
            display: none;
        }    
    }
</style>
