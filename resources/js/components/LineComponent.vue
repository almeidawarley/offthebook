<template>
    <div v-bind:id="identifier">
        <div class="row">
            <div class="col m12">
                <span v-for="(letter, index) in letters" v-html="getLetter(index, true)"></span>
                <br>
                <span v-for="(letter, index) in letters" @click="openInput(index)">{{letter}}</span>
                <br>
                <div v-if="show">
                    <input id="chord" type="text" style="width:auto;" size="1" v-bind:value="getLetter(last_index, false)"/>
                    <button class="btn"  @click="addChord()"><i class="material-icons">add</i></button>
                    <button class="btn red"  @click="hideInput()"><i class="material-icons">remove</i></button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                chords: {},
                show: false,
                last_index: -1
            }
        },
        props: ['letters', 'identifier', 'options'],
        mounted: function() {
            console.log('Elemento montado!');
        },
        methods : {
            openInput : function(index){
                var input_field = document.getElementById('chord');
                this.show = true;
                this.last_index = index;
            },
            hideInput : function(){
                this.show = false;
            },
            addChord : function(){
                var input_field = document.getElementById('chord');
                this.chords[this.last_index] = input_field.value;
                input_field.value = "";
                console.log(this.chords);
                this.hideInput();
            },
            getLetter : function(index, raw){
                if(this.chords[index]){
                    return this.chords[index];
                }else{
                    if(raw){
                        return '&nbsp;';
                    }else{
                        return '';
                    }
                }
            }

        }
    }
</script>
